<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Requests\CategoryRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    use SlugTrait;

    public $title, $desc, $status, $slug;
    protected $listeners = [
        'desc' => 'setDesc',
    ];

    protected function rules()
    {
        return (new CategoryRequest('add'))->rules();
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
        $this->validateOnly('desc', $this->rules(), (new CategoryRequest('add'))->messages());
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new CategoryRequest('add'))->messages());
    }

    /**
     * Function save data
     * @return [type]
     */
    public function store()
    {
        $validatedData = $this->validate((new CategoryRequest('add'))->rules(), (new CategoryRequest('add'))->messages());

        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->title);
        } else {
            $this->slug = $this->generateSlug($this->slug);
        }
        if ($this->checkSlug($this->slug, Category::class) === 'error') {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }

        $validatedData['slug'] = $this->slug;
        Category::create($validatedData);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Thêm thành công!');
        $this->reset();
    }
}
