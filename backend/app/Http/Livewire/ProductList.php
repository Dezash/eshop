<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductList extends Component
{
    public $category_id;
    public $categories;
    public $searchTerm;

    use WithPagination;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $products = Product::where('name','like', $searchTerm);

        if ($this->category_id != null)
            $products = $products->where('category_id', $this->category_id);

        return view('products.product-list', [
            'products' => $products->paginate(10),
            'categories' => $this->categories,
            'currentCategory' => $this->category_id
        ]);
    }

    public function filter_category($category = null)
    {
        if ($category == null)
        {
            $this->category_id = $category;
            //$this->$filtered_products = Product::all();
        }
        else
        {
            $this->category_id = $category;
            //$this->$filtered_products = Product::where('category_id', $category);
        }
    }

    public function mount()
    {
        //$this->products = Product::all();
        $this->categories = Category::all();
    }

}
