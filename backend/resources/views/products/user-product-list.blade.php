
<x-slot name="header">
</x-slot>
<div>
    <x-jet-input type="text" class="container flex justify-center mt-8 mb-6 mx-auto px-4 md:px-12" placeholder="Search" wire:model="searchTerm" />
    <div class="md:px-32">
        <a href="{{route('create_product_view')}}"class="px-8 py-2 bg-blue-700 text-white uppercase rounded hover:bg-blue-600 focus:outline-none">Add</a>
    </div>
    <div class="md:px-32 py-8 w-full">
        <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Stock</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sold</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</td>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($products as $product)
                    <tr>
                        <td class="text-left py-3 px-4 w-1/5">{{$product->name}}</td>
                        <td class="text-left py-3 px-4">
                            @if(strlen($product->description) > 30) {{substr($product->description, 0, 30)}}...@else {{$product->description}}@endif
                        </td>
                        <td class="text-left py-3 px-4">{{$product->price}}€</td>
                        <td class="text-left py-3 px-4">{{$product->stock}}</td>
                        <td class="text-left py-3 px-4">{{$product->sold}}</td>
                        <td class="text-left py-3 px-4 w-1/6">
                            <a href="{{route('user_product_view', $product->id)}}" class="focus:outline-none uppercase font-bold text-blue-700 hover:text-blue-500 mr-4">
                                Show
                            </a>
                            <a href="{{route('edit_product_view', $product->id)}}" class="focus:outline-none uppercase font-bold text-blue-700 hover:text-blue-500 mr-4">
                                Edit
                            </a>
                            <button wire:click="delete({{$product}})" class="focus:outline-none uppercase font-bold text-red-700 ml-1 hover:text-red-500 mr-4">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--
<div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                @foreach($products as $product)
                    <tr class="bg-blue-500 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Price</th>
                        <th class="p-3 text-left">Stock</th>
                        <th class="p-3 text-left">Sold</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">
                @foreach($products as $product)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">{{$product->name}}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                            @if(strlen($product->description) > 30) {{substr($product->description, 0, 30)}}...@else {{$product->description}}@endif
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">{{$product->price}}€</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">{{$product->stock}}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">{{$product->sold}}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">Delete</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>

<style>
    html,
    body {
        height: 100%;
    }

    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }

    td:not(:last-child) {
        border-bottom: 0;
    }

    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
</style>
--}}
