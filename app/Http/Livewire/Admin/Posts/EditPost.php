<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Helpers\S3;
use App\Http\Requests\PostRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;
    use SlugTrait;

    public $title, $slug, $content, $thumbnail, $new_thumbnail, $post_id, $topic_id;


    /**
     * @return [type]
     */
    protected function rules()
    {
        return (new PostRequest('edit'))->rules($this->post_id);
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

        $this->validateOnly('content', $this->rules(), (new PostRequest('edit'))->messages());
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new PostRequest('edit'))->messages());
    }

    /**
     * AutofillSlug
     * @return void
     */
    public function autofillSlug()
    {
        $this->slug = $this->generateSlug($this->title);
    }

    /**
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate($this->rules(), (new PostRequest('edit'))->messages());
        $slugExists = Post::where('id', $this->post_id)->first();

        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if ($this->checkSlug($this->slug, Post::class) === 'error') {
                    $this->addError('slug', 'Slug đã tồn tại');
                }
            }
        }
        $validatedData['slug'] = $this->slug;

        if ($this->new_thumbnail === null) {
            $validatedData['thumbnail'] = $this->thumbnail;
        } else {
            Storage::disk('s3')->delete($this->thumbnail);
            // Upload new file
            $validatedData['thumbnail'] = S3::upload($this->new_thumbnail, $validatedData['slug'], 'posts');
        }

        $validatedData['topic_id'] = $this->topic_id;
        if (Post::find($this->post_id)->update($validatedData)) {
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-right',
                ])
                ->addSuccess('Chỉnh sửa thành công!');
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
