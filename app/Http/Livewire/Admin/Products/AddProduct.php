<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Helpers\S3;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    use SlugTrait;

    public $name, $slug, $price, $sale_price = 0, $description, $path_image, $category_id;

    protected function rules()
    {
        return (new ProductRequest('add'))->rules();
    }

    protected $listeners = [
        'desc' => 'setDesc',
    ];
    /**
     * Set value into description
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->description = $value;

        $this->validateOnly('description', $this->rules(), (new ProductRequest('add'))->messages());
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new ProductRequest('add'))->messages());
    }

    /**
     * AutofillSlug
     * @return void
     */
    public function autofillSlug()
    {
        $this->slug = $this->generateSlug($this->name);
    }

    /**
     * Save data and upload file image
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate($this->rules(), (new ProductRequest('add'))->messages());

        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->name);
        } else {
            $this->slug = $this->generateSlug($this->slug);
        }
        if ($this->checkSlug($this->slug, Product::class) === 'error') {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }

        $validatedData['slug'] = $this->slug;
        // Upload image
        if ($this->path_image) {
            $validatedData['path_image'] =  S3::upload($this->path_image, $validatedData['slug'], 'products');
        }

        Product::create($validatedData);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Thêm thành công!');
        $this->reset();
    }

    /**
     * Render view and lists categories
     * @return [type]
     */
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.products.add-product', compact('categories'))->layout('livewire.admin.layouts.base');
    }
}
