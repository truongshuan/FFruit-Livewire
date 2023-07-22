<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EditPost extends Component
{
    use WithFileUploads;

    public $title, $slug, $content, $thumbnail, $new_thumbnail, $post_id, $topic_id;

    /**
     * @return [type]
     */
    protected function rules()
    {
        return [
            'title' => [
                'required',
                'min:6',
                Rule::unique('posts', 'title')->ignore($this->post_id),
            ],
            'content' => 'required',
        ];
    }

    protected $listeners = [
        'desc' => 'setContent',
    ];

    /**
     * @param int $id
     *
     * @return [type]
     */
    public function mount(int $id)
    {
        $post = Post::where('id', $id)->first();

        if ($post) {
            $this->title = $post->title;
            $this->slug = $post->slug;
            $this->content = $post->content;
            $this->thumbnail = $post->thumbnail;
            $this->topic_id = $post->topic_id;
            $this->post_id = $post->id;
        } else {
            redirect()->to('dashboard/posts');
        }
    }

    /**
     * @param mixed $value
     *
     * @return [type]
     */
    public function setContent($value)
    {
        $this->content = $value;

        $this->validateOnly('content', $this->rules());
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules());
    }

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
        $slugExists = Post::where('id', $this->post_id)->first();

        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if (Post::where('slug', $this->slug)->exists()) {
                    $this->addError('slug', 'Slug đã tồn tại');
                    return;
                }
            }
        }
        $validatedData['slug'] = $this->slug;

        if ($this->new_thumbnail === null) {
            $validatedData['thumbnail'] = $this->thumbnail;
        } else {
            Storage::disk('posts')->delete($this->thumbnail);
            // Upload new file
            $filename = $validatedData['slug'] . '.' . $this->new_thumbnail->getClientOriginalExtension();
            $folder = now()->format('d-m-Y');
            if (!Storage::disk('posts')->exists($folder)) {
                Storage::disk('posts')->makeDirectory($folder);
            }
            $validatedData['thumbnail'] = $this->new_thumbnail->storeAs($folder, $filename, 'posts');
        }

        if (Post::find($this->post_id)->update($validatedData)) {
            $this->dispatchBrowserEvent('edited');
        }
    }
    /**
     * @return [type]
     */
    public function render()
    {

        return view('livewire.admin.posts.edit-post', ['topcics' => Topic::all()])->layout('livewire.admin.layouts.base');
    }
}
