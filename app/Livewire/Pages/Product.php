<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product as MProduct;
use App\Filament\Support\Traits\HasCart;

class Product extends Component
{
    use HasCart;

    public $id;

    public $name;

    public function mount($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->initializeCart();
    }

    public function render()
    {
        // Fetch product by ID only
        $product = MProduct::with('subCategory.category')->find($this->id);

        if (!$product) {
            abort(404);
        }

        // Check if slug matches product name slug
        if ($this->name !== Str::slug($product->name)) {
            // Redirect to the correct URL if slug doesn't match
            $this->redirect(route('product', [
                'id' => $product->id,
                'name' => Str::slug($product->name),
            ]));
        }

        $relatedProducts = MProduct::whereHas('subCategory', function ($q) use ($product) {
            $q->where('category_id', $product->subCategory->category_id);
        })
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(6)
            ->get();

        return view('livewire.pages.product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
