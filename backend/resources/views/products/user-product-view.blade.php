<x-slot name="header">
</x-slot>
<div>
    <div class="container my-12 mx-auto px-4 md:px-12 lg:col-span-1">
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="@if ($product->images->first()['path'] != null )
                {{ asset('storage/images/' . $product->images->first()['path'])}}"
                     @else
                     https://picsum.photos/id/{{$product->id}}/1200/1200"
                @endif>
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
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">In stock:</p>{{$product->stock}}
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Total sold:</p>{{$product->sold}}
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Warranty:</p>@if($product->warranty_duration != null)
                        {{$product->warranty_duration}} months @else no warranty @endif()
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Condition:</p>@if($product->quality_type == 1) New @else Used @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

