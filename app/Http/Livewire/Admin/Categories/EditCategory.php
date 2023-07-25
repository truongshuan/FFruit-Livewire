<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EditCategory extends Component
{
    public $title, $slug, $desc, $category_id;
    protected $listeners = [
        'desc' => 'setDesc',
    ];
    /**
     * Initialization data
     * @return [type]
     */
    protected function rules()
    {
        return [
            'title' => [
                'required',
                'min:6',
                Rule::unique('categories', 'title')->ignore($this->category_id),
            ],
            'desc' => 'required',
        ];
    }

    protected $messages = [
        'title.required' => 'Tiêu đề không được để trống.',
        'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
        'title.unique' => 'Tiêu đề đã tồn tại.',
        'desc.required' => 'Mô tả không được để trống.',
    ];

    /**
     * @param int $id
     *
     * @return [type]
     */
    public function mount(int $id)
    {
        $category = Category::find($id);
        if ($category) {
            $this->title = $category->title;
            $this->desc = $category->desc;
            $this->slug = $category->slug;
            $this->category_id = $category->id;
        } else {
            redirect()->to('dashboard/categories');
        }
    }

    /**
     * Generate slug by title
     * @return [string]
     */
    public function generateSlug()
    {
        if ($this->title) {
            $this->slug = Str::slug($this->title);
        }
    }
    /**
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->desc = $value;

        $this->validateOnly('desc', $this->rules(), $this->messages);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), $this->messages);
    }
    /**
     * Save data
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate();

        $slugExists = Category::where('id', $this->category_id)->first();
        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if (Category::where('slug', $this->slug)->exists()) {
                    $this->addError('slug', 'Slug đã tồn tại');
                    return;
                }
            }
        }
        $validatedData['slug'] = $this->slug;

        Category::find($this->category_id)->update($validatedData);
        $this->dispatchBrowserEvent('edited');
    }

    /**
     * @return [type]
     */
    public function render()
    {
        return view('livewire.admin.categories.edit-category')
            ->layout('livewire.admin.layouts.base');
    }
}
