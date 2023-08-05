<?php

namespace App\Http\Livewire\Client;

use App\Http\Traits\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    use Cart;

    /**
     * Summary of sortBy
     * @var string
     */
    public string $sortBy = '';
    /**
     * Summary of queryByCategory
     * @var string
     */
    public string $queryByCategory = '';
    /**
     * Summary of searchTerm
     * @var string
     */
    public string $searchTerm = '';

    /**
     * Summary of sortOptions
     * @var array
     */
    public array $sortOptions = [
        'az' => ['column' => 'name', 'order' => 'asc'],
        'za' => ['column' => 'name', 'order' => 'desc'],
        'price_desc' => ['column' => 'price', 'order' => 'desc'],
        'price_asc' => ['column' => 'price', 'order' => 'asc'],
        'newest' => ['column' => 'created_at', 'order' => 'desc'],
        'oldest' => ['column' => 'created_at', 'order' => 'asc'],
    ];
    /**
     * Summary of paginationTheme
     * @var string
     */
    protected string $paginationTheme = 'bootstrap';

    /**
     * Add to cart
     * @param Product $product
     * @return void
     */
    public function addItem(Product $product): void
    {
        $this->addToCart($product);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])
            ->addSuccess('Thêm vào giỏ hàng thành công!');
        $this->emit('refreshCartList');
    }

    /**
     * @return void
     */
    public function updatingQueryByCategory(): void
    {
        $this->resetPage();
    }

    /**
     * @return void
     */
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    /**
     * Summary of clearSortBy
     * @return void
     */
    public function clearSortBy(): void
    {
        if ($this->sortBy === '' && $this->queryByCategory === '') {
            return;
        }
        $this->sortBy = '';
        $this->queryByCategory = '';
    }

    /**
     * Summary of getSortedProducts
     * @return mixed
     */
    public function getSortedProducts(): mixed
    {
        if (!in_array($this->sortBy, array_keys($this->sortOptions))) {
            return
                Product::when($this->queryByCategory, function ($query) {
                    $query->where('category_id', $this->queryByCategory);
                })
                ->when($this->searchTerm, function ($query) {
                    return $query->search(trim($this->searchTerm));
                })
                ->with('category:id,title,slug')
                ->paginate(6);
        }
        $sortOption = $this->sortOptions[$this->sortBy];
        return Product::when($this->queryByCategory, function ($query) {
            $query->where('category_id', $this->queryByCategory);
        })
            ->when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->orderBy($sortOption['column'], $sortOption['order'])
            ->with('category:id,title,slug')
            ->paginate(6);
    }

    /**
     * Summary of render
     * @return Factory|View
     */
    public function render(): View|Factory
    {
        sleep(1);
        $categories = Category::all(['id', 'title', 'slug']);
        $products = $this->getSortedProducts();
        return view('livewire.client.products', compact('categories', 'products'));
    }
}
