<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Topic;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\TopicsExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Topics extends Component
{
    use WithPagination;

    public int $topic_id = 0;
    public int $perPage = 5;
    public $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $searchTerm = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';

    protected string $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'detroy'];

    protected $queryString = ['searchTerm' => ['except' => '']];


    /**
     * swapSortDirection
     * @return string
     */
    public function swapSortDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    /**
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
     * @return void [type]
     */
    public function updatedselectedPageRow($value): void
    {
        if ($value) {
            $this->selectedRow = $this->getTopic()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * @return [type]
     */
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    /**
     * Export data file excel
     * @return Response|BinaryFileResponse [type]
     */
    public function export(): Response|BinaryFileResponse
    {
        return (new TopicsExport($this->selectedRow))->download('Topics.xlsx');
    }

    /**
     * Get topics
     * @return mixed [type]
     */
    public function getTopic()
    {
        return
            Topic::when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * Show the popup comfirm delete
     * @param int $id
     *
     * @return void [type]
     */
    public function deleteConfirm(int $id)
    {
        $this->topic_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * @return void
     */
    public function detroy(): void
    {
        if ($this->topic_id == 0) {
            return;
        }
        $topic = Topic::findOrFail($this->topic_id);
        $topic->delete();
        $this->topic_id = 0;

        $this->dispatchBrowserEvent('deleted');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {

        return view('livewire.admin.topics.topics', ['topics' => $this->getTopic()])
            ->layout('livewire.admin.layouts.base');
    }
}
