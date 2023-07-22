<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AddTopic extends Component
{
    public $title, $slug, $content, $status;

    protected $rules = [
        'title' => 'required|min:6|unique:topics',
        'content' => 'required',
        'status' => 'required',
    ];
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
     * Generate Slug by the title
     * @return [type]
     */
    public function generateSlug()
    {
        if ($this->title) {
            $this->slug = SlugService::createSlug(Topic::class, 'slug', $this->title);
        }
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
     * Save data
     * @return [type]
     */
    public function submit()
    {
        $validateData = $this->validate();

        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
        }
        $slugExists = Topic::where('slug', $this->slug)->exists();

        if ($slugExists) {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }
        $validatedData['slug'] = $this->slug;
        if (Topic::create($validateData)) {
            $this->dispatchBrowserEvent('added');
        } else {
            return;
        }
        $this->resetInput();
    }

    /**
     * Reset input after save data
     * @return [type]
     */
    public function resetInput()
    {
        $this->title = null;
        $this->status = null;
        $this->slug = null;
    }
}
