<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name, $slug, $price, $sale_price = 0, $description, $path_image, $category_id;

    protected $rules = [
        'name' => 'required|min:6|unique:products',
        'price'  => 'required|numeric|min:0|not_in:0',
        'sale_price' => 'required|numeric|min:0',
        'description' => 'required',
        'path_image' => 'required|image|mimes:jpg,png,bmp,gif,svg,webp,jpeg|max:2048',
        'category_id' => 'required',
    ];

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

        $this->validateOnly('description', $this->rules);
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
     * Generate slug by the title
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
     * Save data and upload file image
     * @return [type]
     */
    public function submit()
    {
        $validatedData = $this->validate();

        if (!$this->slug) {
            $this->generateSlug();
        } else {
            $this->slug = Str::slug($this->slug);
        }
        $slugExists = Product::where('slug', $this->slug)->exists();
        if ($slugExists) {
            $this->addError('slug', 'Slug đã tồn tại');
            return;
        }
        $validatedData['slug'] = $this->slug;

        // Upload image
        if ($this->path_image) {
            $filename = $validatedData['slug'] . '.' . $this->path_image->getClientOriginalExtension();
            $folder = now()->format('d-m-Y');
            if (!Storage::disk('products')->exists($folder)) {
                Storage::disk('products')->makeDirectory($folder);
            }
            $validatedData['path_image'] = $this->path_image->storeAs($folder, $filename, 'products');
        }

        Product::create($validatedData);
        $this->dispatchBrowserEvent('added');
        $this->resetInput();
    }
    /**
     * Reset input after submit form
     * @return [type]
     */
    public function resetInput()
    {
        $validatedData = null;
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
