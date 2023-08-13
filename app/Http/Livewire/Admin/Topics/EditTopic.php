<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Http\Requests\TopicRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Topic;
use Livewire\Component;

class EditTopic extends Component
{
    use SlugTrait;


    public $title, $slug, $content, $topic_id;

    /**
     * Initialization data
     *
     * @return [type]
     */
    protected function rules()
    {
        return (new TopicRequest('edit'))->rules($this->topic_id);
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

        $this->validateOnly('content', $this->rules(), (new TopicRequest('edit'))->messages());
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new TopicRequest('edit'))->messages());
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
     * Function update data topic
     * @param mixed
     * @return [type]
     */
    public function submit()
    {
        $validateData = $this->validate($this->rules(), (new TopicRequest('edit'))->messages());

        $slugExists = Topic::where('id', $this->topic_id)->first();
        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if ($this->checkSlug($this->slug, Topic::class) === 'error')
                    $this->addError('slug', 'Slug đã tồn tại');
            }
        }

        $validateData['slug'] = $this->slug;
        Topic::find($this->topic_id)->update($validateData);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Sửa thành công!');
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
