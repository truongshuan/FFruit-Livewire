<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EditTopic extends Component
{
    public $title, $slug, $content, $topic_id;
    /**
     * Initialization data
     *
     * @return [type]
     */
    protected function rules()
    {
        return [
            'title' => [
                'required',
                'min:6',
                Rule::unique('topics', 'title')->ignore($this->topic_id),
            ],
            'content' => 'required',
        ];
    }

    protected $listeners = [
        'desc' => 'setContent'
    ];

    /**
     * Summary of mount
     * @param int $id
     * @return void
     */
    public function mount(int $id)
    {
        $topic = Topic::where('id', $id)->first();
        // Render data form database
        if ($topic) {
            $this->title = $topic->title;
            $this->slug = $topic->slug;
            $this->content = $topic->content;
            $this->topic_id = $topic->id;
        } else {
            redirect()->to('topics');
        }
    }

    /**
     * Set value to property content into tinymce ver 6
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

    /**
     * Function generate slug into title
     * @param mixed
     * @return [type]
     */
    public function generateSlug()
    {
        if ($this->title) {
            $this->slug = SlugService::createSlug(Topic::class, 'slug', $this->title);
        }
    }

    /**
     * Function update data topic
     * @param mixed
     * @return [type]
     */
    public function submit()
    {
        $validateData = $this->validate();
        $slugExists = Topic::where('id', $this->topic_id)->first();
        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if (Topic::where('slug', $this->slug)->exists()) {
                    $this->addError('slug', 'Slug đã tồn tại');
                    return;
                }
            } else {
            }
        }
        $validateData['slug'] = $this->slug;
        Topic::find($this->topic_id)->update($validateData);
        $this->dispatchBrowserEvent('edited');
    }

    /**
     * Render component livewire
     * @return [type]
     */
    public function render()
    {
        return view('livewire.admin.topics.edit-topic')
            ->layout('livewire.admin.layouts.base');
    }
}
