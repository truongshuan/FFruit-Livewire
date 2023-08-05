<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Exports\CategoryExport;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Categories extends Component
{
    use WithPagination;

    public int $category_id = 0;
    public int $perPage = 5;
    public  $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $searchTerm = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';

    protected string $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'detroy'];
    protected $queryString = ['searchTerm' => ['except' => '']];

    /**
     * Function into swap sortdirection
     * @return string
     */
    public function swapSortDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    /**
     * Function sort data
     * @param mixed $columnName
     *
     * @return void
     */
    public function sortBy(mixed $columnName): void
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }

    /**
     * Selected rows data
     * @param $value
     *
     * @return void [type]
     */
    public function updatedselectedPageRow($value): void
    {
        if ($value) {
            $this->selectedRow = $this->getCategory()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * @return void [type]
     */
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    /**
     * Function export data file excel
     * @return Response|BinaryFileResponse [type]
     */
    public function export(): Response|BinaryFileResponse
    {
        return (new CategoryExport($this->selectedRow))->download('Categories.xlsx');
    }

    /**
     * Get categories
     * @return LengthAwarePaginator [data]
     */
    public function getCategory(): LengthAwarePaginator
    {
        return
            Category::query()
            ->when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * Function show popup confirm delete data
     * @param int $id
     *
     * @return void [type]
     */
    public function deleteConfirm(int $id): void
    {
        $this->category_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * detroy data
     * @param none
     * @return void
     */
    public function detroy(): void
    {
        if ($this->category_id == 0) {
            return;
        }
        $category = Category::findOrFail($this->category_id);
        $category->delete();
        $this->category_id = 0;

        $this->dispatchBrowserEvent('deleted');
    }

    /**
     * @return mixed [type]
     */
    public function render(): mixed
    {
        $categories = $this->getCategory();

        return view('livewire.admin.categories.categories', ['categories' => $categories])->layout('livewire.admin.layouts.base');
    }
}
