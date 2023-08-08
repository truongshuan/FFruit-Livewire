<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Http\Requests\TopicRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Topic;
use Livewire\Component;

class AddTopic extends Component
{

    use SlugTrait;

    public $title, $slug, $content, $status;

    protected function rules()
    {
        return (new TopicRequest('add'))->rules();
    }

    protected $listeners = [
        'desc' => 'setDesc',
    ];

    /**
     * @return [type]
     */
    public function render()
    {
        return view('livewire.admin.topics.add-topic')
            ->layout('livewire.admin.layouts.base');
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
     * Set value for content
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->content = $value;

        $this->validateOnly('content', $this->rules(), (new TopicRequest('add'))->messages());
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new TopicRequest('add'))->messages());
    }

    /**
     * Save data
     * @return [type]
     */
    public function submit()
    {
        $validateData = $this->validate($this->rules(), (new TopicRequest('add'))->messages());

        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
        }
        if ($this->checkSlug($this->slug, Topic::class) === 'error') {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }

        $validatedData['slug'] = $this->slug;
        if (Topic::create($validateData)) {
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-right',
                ])
                ->addSuccess('Thêm thành công!');
            $this->reset();
        }
    }
}
