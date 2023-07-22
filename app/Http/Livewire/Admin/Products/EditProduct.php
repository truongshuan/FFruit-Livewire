<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EditProduct extends Component
{
    use WithFileUploads;

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
        return [
            'name' => [
                'required', 'min:6', Rule::unique('products', 'name')->ignore($this->product_id),
            ],
            'price' => [
                'required', 'numeric', 'min:0', 'not_in:0'
            ],
            'sale_price' => [
                'required', 'numeric', 'min:0'
            ],
            'description' => 'required',
            'category_id' => 'required',
        ];
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

        $this->validateOnly('description', $this->rules());
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
     * @return [type]
     */
    public function generateSlug()
    {
        if ($this->name) {
            $this->slug =
                SlugService::createSlug(Product::class, 'slug', $this->name);
        }
    }

    /**
     *  Update data
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate();

        // Check slug exists
        $slugExists = Product::where('id', $this->product_id)->first();
        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
            if ($this->slug !== $slugExists->slug) {
                if (Product::where('slug', $this->slug)->exists()) {
                    $this->addError('slug', 'Slug already exists');
                    return;
                }
            }
        }
        $validatedData['slug'] = $this->slug;

        // Check Image
        if ($this->new_image === null) {
            $validatedData['path_image'] = $this->path_image;
        } else {
            Storage::disk('products')->delete($this->path_image);
            // Upload new file
            $filename = $validatedData['slug'] . '.' . $this->new_image->getClientOriginalExtension();
            $folder = now()->format('d-m-Y');
            if (!Storage::disk('products')->exists($folder)) {
                Storage::disk('products')->makeDirectory($folder);
            }
            $validatedData['path_image'] = $this->new_image->storeAs($folder, $filename, 'products');
        }

        // Update data
        Product::find($this->product_id)->update($validatedData);
        $this->dispatchBrowserEvent('edited');
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
