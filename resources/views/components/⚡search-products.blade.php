<?php

use Livewire\Component;
use App\Models\Product;

new class extends Component
{
    public string $search = '';
};
?>

<div>
    <input 
        type="text" 
        wire:model.live="search" 
        placeholder="Search products..."
        class="border p-2 rounded w-full mt-4"
    />

    <ul class="mt-4">
        @foreach(App\Models\Product::where('name', 'like', '%' . $search . '%')->get() as $product)
            <li class="p-2 border-b">
                {{ $product->name }} - ${{ $product->price }}
            </li>
        @endforeach
    </ul>
</div>