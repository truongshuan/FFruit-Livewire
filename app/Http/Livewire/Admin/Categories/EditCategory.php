<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Requests\CategoryRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    use SlugTrait;

    public $title, $slug, $desc, $category_id;
    protected $listeners = [
        'desc' => 'setDesc',
    ];

    protected function rules()
    {
        return (new CategoryRequest('edit'))->rules($this->category_id);
    }

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
     * AutofillSlug
     * @return void
     */
    public function autofillSlug()
    {
        $this->slug = $this->generateSlug($this->title);
    }

    /**
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->desc = $value;

        $this->validateOnly('desc', $this->rules(), (new CategoryRequest('add'))->messages());
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new CategoryRequest('add'))->messages());
    }
    /**
     * Save data
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate($this->rules(), (new CategoryRequest('add'))->messages());
        $slugExists = Category::where('id', $this->category_id)->first();
        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if ($this->checkSlug($this->slug, Category::class) === 'error')
                    $this->addError('slug', 'Slug đã tồn tại');
            }
        }
        $validatedData['slug'] = $this->slug;
        Category::find($this->category_id)->update($validatedData);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Sửa thành công!');
    }

    public function render()
    {
        return view('livewire.admin.categories.edit-category')
            ->layout('livewire.admin.layouts.base');
    }
}
