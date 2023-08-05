<?php

namespace App\Http\Livewire\Client;

use App\Models\Post;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public string $sortBy = '';
    public string $queryByCategory = '';
    public string $searchTerm = '';
    public array $sortOptions = [
        'newest' => ['column' => 'created_at', 'order' => 'desc'],
        'oldest' => ['column' => 'created_at', 'order' => 'asc'],
    ];
    protected string $paginationTheme = 'bootstrap';

    /**
     * @return void
     */
    public function updatingQueryByCategory(): void
    {
        $this->resetPage();
    }

    /**
     * @return void
     */
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    public function clearSortBy(): void
    {
        if ($this->sortBy === '' && $this->queryByCategory === '') {
            return;
        }
        $this->sortBy = '';
        $this->queryByCategory = '';
    }

    public function getSortedPosts()
    {
        if (!in_array($this->sortBy, array_keys($this->sortOptions))) {
            return
                Post::when($this->queryByCategory, function ($query) {
                    $query->where('topic_id', $this->queryByCategory);
                })
                ->when($this->searchTerm, function ($query) {
                    return $query->search(trim($this->searchTerm));
                })
                ->with('topic:id,title,slug')
                ->paginate(6);
        }
        $sortOption = $this->sortOptions[$this->sortBy];
        return Post::when($this->queryByCategory, function ($query) {
            $query->where('topic_id', $this->queryByCategory);
        })
            ->when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->orderBy($sortOption['column'], $sortOption['order'])
            ->with('topic:id,title,slug')
            ->paginate(6);
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        sleep(1);
        $topics = Topic::all(['id', 'title', 'slug']);
        $posts = $this->getSortedPosts();

        return view('livewire.client.posts', compact('posts', 'topics'));
    }
}
