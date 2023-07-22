<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AddCategory extends Component
{

    public $title, $desc, $status, $slug;

    protected $rules = [
        'title' => 'required|min:6|unique:categories,title',
        'desc'  => 'required',
        'status' => 'required'
    ];
    public function generateSlug()
    {
        if ($this->title) {
            $this->slug = Str::slug($this->title);
        }
    }

    protected $messages = [
        'title.required' => 'Tiêu đề không được để trống.',
        'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
        'title.unique' => 'Tiêu đề đã tồn tại.',
        'desc.required' => 'Mô tả không được để trống.',
        'status.required' => 'Trạng thái không được để trống.',
    ];

    protected $listeners = [
        'desc' => 'setDesc',
    ];

    /**
     * @return [type]
     */
    public function render()
    {

        return view('livewire.admin.categories.add-category')
            ->layout('livewire.admin.layouts.base');
    }

    /**
     * Set value into content
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->desc = $value;

        $this->validateOnly('desc', $this->rules, $this->messages);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules, $this->messages);
    }
    /**
     * Function save data
     * @return [type]
     */
    public function store()
    {
        $validatedData = $this->validate();

        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
        }
        $slugExists = Category::where('slug', $this->slug)->exists();
        if ($slugExists) {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }

        $validatedData['slug'] = $this->slug;
        $category = new Category($validatedData);
        $category->save();

        $this->dispatchBrowserEvent('added');
        $this->reset(['title', 'desc', 'status', 'slug']);
    }
}
