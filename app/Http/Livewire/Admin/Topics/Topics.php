<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\TopicsExport;

class Topics extends Component
{
    use WithPagination;

    public $topic_id = 0;
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
     * @return [type]
     */
    public function updatedselectedPageRow($value)
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
    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    /**
     * Export data file excel
     * @return [type]
     */
    public function export()
    {
        return (new TopicsExport($this->selectedRow))->download('Topics.xlsx');
    }

    /**
     * Get topics
     * @return [type]
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
     * @return [type]
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
