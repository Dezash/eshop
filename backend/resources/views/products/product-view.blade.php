<x-guest- <x-slot name="header">
    </x-slot>
    <div>
        <div class="container my-12 mx-auto px-4 md:px-12 lg:col-span-1">
            <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{$product->images->first()['path'] ?? "https://www.trroofingsheets.co.uk/wp-content/uploads/2016/05/default-no-image-1.png"}}">
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-gray-700 uppercase text-lg">{{$product->name}}</h3>
                    <span class="text-red-600 mt-3">{{$product->price}}€</span>
                    <hr class="my-3">
                    <div class="mt-2">
                        <div class="flex items-center mt-1">
                            {{$product->description}}
                        </div>
                    </div>
                    {{--<div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Count:</label>
                            <div class="flex items-center mt-1">
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </button>
                                <span class="text-gray-700 text-lg mx-2">20</span>
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </button>
                            </div>
                        </div>--}}
                    <div class="flex items-center mt-6">
                        <button wire:click="addToCart({{ $product->id }})" class="px-8 py-2 bg-blue-700 text-white uppercase rounded hover:bg-blue-600 focus:outline-none">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>