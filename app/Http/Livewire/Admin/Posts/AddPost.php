<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Requests\PostRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    use WithFileUploads;
    use SlugTrait;

    public $title, $slug, $thumbnail, $content, $topic_id;


    protected function rules(): array
    {
        return (new PostRequest('add'))->rules();
    }

    protected $listeners = [
        'desc' => 'setContent',
    ];

    /**
     * @param mixed $value
     *
     * @return void [type]
     * @throws ValidationException
     */
    public function setContent($value): void
    {
        $this->content = $value;

        $this->validateOnly('content', $this->rules(), (new PostRequest('add'))->messages());
    }

    /**
     * @param mixed $fields
     *
     * @return void [type]
     * @throws ValidationException
     */
    public function updated(mixed $fields): void
    {
        $this->validateOnly($fields, $this->rules(), (new PostRequest('add'))->messages());
    }


    /**
     * AutofillSlug
     * @return void
     */
    public function autofillSlug(): void
    {
        $this->slug = $this->generateSlug($this->title);
    }


    /**
     * @return void [type]
     */
    public function submit(): void
    {
        $validatedData = $this->validate($this->rules(), (new PostRequest('add'))->messages());
        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
        }
        if ($this->checkSlug($this->slug, Post::class) === 'error') {
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
        $this->reset();
    }

    /**
     * @return mixed [type]
     */
    public function render(): mixed
    {
        return view('livewire.admin.posts.add-post', ['topcics' => Topic::all()])->layout('livewire.admin.layouts.base');
    }
}
