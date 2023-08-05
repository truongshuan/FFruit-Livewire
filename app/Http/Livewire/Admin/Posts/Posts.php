<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Exports\PostExport;
use App\Models\Topic;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Posts extends Component
{
    use WithPagination;

    public int $post_id = 0;
    public int $perPage = 5;
    public $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $searchTerm = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';
    public string $queryByTopic = '';

    protected string $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'detroy'];

    protected $queryString = ['searchTerm' => ['except' => '']];

    public function swapSortDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function sortBy($columnName): void
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function updatedselectedPageRow($value): void
    {
        if ($value) {
            $this->selectedRow = $this->getPosts()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }
    public function updatingQueryByTopic(): void
    {
        $this->resetPage();
    }

    public function export(): \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return (new PostExport($this->selectedRow))->download('Posts.xlsx');
    }

    public function getPosts()
    {
        return Post::when($this->searchTerm, function ($query) {
            return $query->search(trim($this->searchTerm));
        })
            ->with('topic:id,title')
            ->when($this->queryByTopic, function ($query) {
                $query->where('topic_id', $this->queryByTopic);
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function deleteConfirm(int $id): void
    {
        $this->post_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * @return void
     */
    public function detroy(): void
    {
        if ($this->post_id == 0) {
            return;
        }
        $post = Post::findOrFail($this->post_id);
        if ($post->thumbnail) {
            Storage::disk('posts')->delete($post->thumbnail);
        }
        $post->delete();
        $this->post_id = 0;

        $this->dispatchBrowserEvent('deleted');
    }

    public function render()
    {
        return view('livewire.admin.posts.posts', ['posts' => $this->getPosts(), 'topics' => Topic::all()])->layout('livewire.admin.layouts.base');
    }
}
