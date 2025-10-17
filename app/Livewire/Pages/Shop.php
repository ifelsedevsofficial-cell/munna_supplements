<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Filament\Support\Traits\HasCart;
use App\Models\SubCategory;

class Shop extends Component
{
    use HasCart;
    public $query = '';
    public $category_id = null;

    public function mount()
    {
        $this->initializeCart();
    }

    public function render()
    {
        $products = Product::query()->with('subcategory', 'subcategory.category');

        // Filter by category only
        if ($catId = request('category_id')) {
            $products->whereHas('subcategory', function ($q) use ($catId) {
                $q->where('category_id', $catId);
            });
        }

        // Filter by subcategory only
        if ($subCatId = request('sub_category_id')) {
            $products->where('sub_category_id', $subCatId);
        }

        if (request('query')) {
            $query = request('query');

            $products->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhereHas('subCategory', function ($q2) use ($query) {
                        $q2->where('name', 'like', "%{$query}%");
                    });
            });

        }

        $products = $products->paginate(9)->withQueryString();

        $categories = Category::all();

        $subCategories = SubCategory::all();


        return view('livewire.pages.shop', [
            'products' => $products,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }
}
