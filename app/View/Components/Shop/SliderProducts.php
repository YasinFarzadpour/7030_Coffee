<?php

namespace App\View\Components\Shop;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderProducts extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public array|\Illuminate\Database\Eloquent\Collection $products;
    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct($type)
    {
        if ($type=='top_seller') {
            $this->title = 'TOP SELLER PRODUCTS';
            $this->products = Product::query()->where('is_published',1)->orderByDesc('sell_count')->take(6)->get();
        }elseif($type=='newest'){
            $this->title = 'NEW PRODUCTS';
            $this->products = Product::query()->where('is_published',1)->orderByDesc('created_at')->take(6)->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.slider-products');
    }
}
