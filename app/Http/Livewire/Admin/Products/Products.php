<?php

namespace App\Http\Livewire\Admin\Products;

use App\Exports\ProductExport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public int $product_id = 0;
    public int $perPage = 5;
    public $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $searchTerm = '';
    public string $queryByCategory = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';


    protected string $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirmed' => 'detroy'];
    protected $queryString = ['searchTerm' => ['except' => '']];

    /**
     * @return void [type]
     */
    public function cleanUpOldTempImages(): void
    {
        $tempImages = Storage::files('livewire-tmp');

        foreach ($tempImages as $file) {
            Storage::delete($file);
        }
    }

    /**
     * @return string
     */
    public function swapSortDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    /**
     * @param mixed $columnName
     *
     * @return void
     */
    public function sortBy($columnName): void
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function updatedselectedPageRow($value): void
    {
        if ($value) {
            $this->selectedRow = $this->getProduct()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * @return void
     */
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }
    /**
     * @return void
     */
    public function updatingQueryByCategory(): void
    {
        $this->resetPage();
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function export(): \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return (new ProductExport($this->selectedRow))->download('Products.xlsx');
    }

    /**
     * @return [type]
     */
    public function getProduct()
    {
        return Product::when($this->searchTerm, function ($query) {
            return $query->search(trim($this->searchTerm));
        })
            ->with('category:id,title')
            ->when($this->queryByCategory, function ($query) {
                $query->where('category_id', $this->queryByCategory);
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function deleteConfirm(int $id): void
    {
        $this->product_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * @return void
     */
    public function detroy(): void
    {
        if ($this->product_id == 0) {
            return;
        }
        $product = Product::findOrFail($this->product_id);
        if ($product->path_image) {
            Storage::disk('products')->delete($product->path_image);
        }

        $product->delete();
        $this->product_id = 0;
        $this->dispatchBrowserEvent('deleted');
    }

    /**
     * @return [type]
     */
    public function render()
    {
        $products = $this->getProduct();
        return view('livewire.admin.products.products', ['products' => $products, 'categories' => Category::all()])->layout('livewire.admin.layouts.base');
    }
}
