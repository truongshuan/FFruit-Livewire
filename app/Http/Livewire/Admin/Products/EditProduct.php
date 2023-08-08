<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Helpers\S3;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\SlugTrait;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
    use SlugTrait;

    public $name, $slug, $price, $sale_price, $category_id, $description, $path_image, $new_image, $product_id;

    protected $listeners = [
        'desc' => 'setDesc',
    ];

    /**
     *
     * @return [type]
     */
    protected function rules()
    {
        return (new ProductRequest('edit'))->rules($this->product_id);
    }

    /**
     * Initialization data
     * @param int $id
     *
     * @return [type]
     */
    public function mount(int $id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $this->name = $product->name;
            $this->slug = $product->slug;
            $this->price = $product->price;
            $this->sale_price = $product->sale_price;
            $this->category_id = $product->category_id;
            $this->description = $product->description;
            $this->path_image = $product->path_image;
            $this->product_id = $product->id;
        } else {
            redirect()->to("dashboard/products");
        }
    }

    /**
     * @param mixed $value
     *
     * @return [type]
     */
    public function setDesc($value)
    {
        $this->description = $value;

        $this->validateOnly('description', $this->rules(), (new ProductRequest('edit'))->messages());
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
     * AutofillSlug
     * @return void
     */
    public function autofillSlug()
    {
        $this->slug = $this->generateSlug($this->name);
    }


    /**
     *  Update data
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate($this->rules(), (new ProductRequest('edit'))->messages());

        // Check slug exists
        $slugExists = Product::where('id', $this->product_id)->first();
        if (!$this->slug) {
            $this->slug = $this->generateSlug($this->name);
        } else {
            $this->slug = $this->generateSlug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if ($this->checkSlug($this->slug, Product::class) === 'error') {
                    $this->addError('slug', 'Slug đã tồn tại');
                    return;
                }
            }
        }
        $validatedData['slug'] = $this->slug;

        // Check Image
        if ($this->new_image === null) {
            $validatedData['path_image'] = $this->path_image;
        } else {
            S3::delete($this->path_image);
            // Upload new file
            $validatedData['path_image'] = S3::upload($this->new_image, $validatedData['slug'], 'products');
        }

        // Update data
        Product::find($this->product_id)->update($validatedData);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Sửa thành công!');
    }

    /**
     * @return [type]
     */
    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.products.edit-product', compact('categories'))->layout('livewire.admin.layouts.base');
    }
}
