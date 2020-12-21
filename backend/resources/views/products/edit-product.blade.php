<x-slot name="header">
    Edit product
</x-slot>
<div>
    <div class="w-full mt-12">
        <div class="container mx-auto w-full">
            @if (session()->has('message'))
                <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                            <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-12 p-6 bg-white border rounded-md shadow-xl">
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <p class="mb-1">Category:</p>
                    <div class="mb-3">
                        <select wire:model="category" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mb-1">Name:</p>
                    <div class="mb-3">
                        <input type="text" wire:model="name" class="shadow appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Description:</p>
                    <div class="mb-3">
                        <input type="text" wire:model="description" class="shadow w-1/3 appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Price:</p>
                    <div class="mb-3">
                        <input type="text" wire:model="price" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Stock:</p>
                    <div class="mb-3">
                        <input type="number" wire:model="stock" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Sold:</p>
                    <div class="mb-3">
                        <input type="number" wire:model="sold" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Condition:</p>
                    <div class="mb-3">
                        <select wire:model="quality_type" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                            <option value="1">New</option>
                            <option value="0" selected>Used</option>
                        </select>
                    </div>
                    <p class="mb-1">Warranty duration: (optional)</p>
                    <div class="mb-3">
                        <input type="number" wire:model="warranty_duration" class="shadow w-1/6 appearance-none border rounded py-1 px-3 text-grey-darker">
                    </div>
                    <p class="mb-1">Current picture:</p>
                    <div class="mb-3">
                        <img class="h-1/2 w-1/2" src="@if ($product->images->first()['path'] != null )
                        {{ asset('storage/images/' . $product->images->first()['path'])}}"
                             @else
                             https://picsum.photos/id/{{$product->id}}/1200/1200"
                        @endif>
                    </div>
                    <p class="mb-1">Upload a picture:</p>
                    <div class="mb-3">
                        <input type="file" wire:model="image" class="">
                        <div>
                            @error('image') <span class="text-sm text-red-500 italic">{{ $message }}</span>@enderror
                        </div>
                        <div wire:loading wire:target="image" class="text-sm text-gray-500 italic">Uploading...</div>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit product</button>
                </form>
            </div>
        </div>
    </div>
</div>
