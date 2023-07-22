<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Exports\CategoryExport;
use Illuminate\Routing\UrlGenerator;

class Categories extends Component
{
    use WithPagination;

    public $category_id = 0;
    public $perPage = 5;
    public $selectedRow = [];
    public $selectedPageRow = false;
    public $searchTerm = '';
    public $sortColumnName =  'id';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';
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
    public function sortBy($columnName): void
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
     * @param mixed $value
     *
     * @return [type]
     */
    public function updatedselectedPageRow($value)
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
     * @return [type]
     */
    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    /**
     * Function export data file excel
     * @param none
     * @return [type]
     */
    public function export()
    {
        return (new CategoryExport($this->selectedRow))->download('Categories.xlsx');
    }

    /**
     * Get categories
     * @param mixed
     * @return [data]
     */
    public function getCategory()
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
     * @return [type]
     */
    public function deleteConfirm(int $id)
    {
        $this->category_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * detroy data
     * @param none
     * @return void
     */
    public function detroy()
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
     * @return [type]
     */
    public function render()
    {
        $categories = $this->getCategory();

        return view('livewire.admin.categories.categories', ['categories' => $categories])->layout('livewire.admin.layouts.base');
    }
}
