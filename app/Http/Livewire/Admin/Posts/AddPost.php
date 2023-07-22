<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AddPost extends Component
{
    use WithFileUploads;

    public $title, $slug, $thumbnail, $content, $topic_id;

    protected $rules = [
        'title' => 'required|min:15|max:255|unique:posts,title',
        'topic_id' => 'required',
        'content' => 'required',
        'thumbnail' => 'required|image|mimes:jpg,png,bmp,gif,svg,webp,jpeg|max:2048',
    ];
    protected $listeners = [
        'desc' => 'setContent',
    ];
    /**
     * @param mixed $value
     *
     * @return [type]
     */
    public function setContent($value)
    {
        $this->content = $value;

        $this->validateOnly('content', $this->rules);
    }
    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
    /**
     * @return [type]
     */
    public function generateSlug()
    {
        if ($this->title) {
            $this->slug = SlugService::createSlug(Topic::class, 'slug', $this->title);
        }
    }
    /**
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate();
        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
        }
        $slugExists = Post::where('slug', $this->slug)->exists();
        if ($slugExists) {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }
        $validatedData['slug'] = $this->slug;

        // Upload image
        if ($this->thumbnail) {
            $filename = $validatedData['slug'] . '.' . $this->thumbnail->getClientOriginalExtension();
            $folder = now()->format('d-m-Y');
            if (!Storage::disk('posts')->exists($folder)) {
                Storage::disk('posts')->makeDirectory($folder);
            }
            $validatedData['thumbnail'] = $this->thumbnail->storeAs($folder, $filename, 'posts');
        }

        Post::create($validatedData);
        $this->dispatchBrowserEvent('added');
        $this->resetInput();
    }
    /**
     * @return [type]
     */
    public function resetInput()
    {
        $validatedData = null;
    }

    /**
     * @return [type]
     */
    public function render()
    {
        return view('livewire.admin.posts.add-post', ['topcics' => Topic::all()])->layout('livewire.admin.layouts.base');
    }
}
