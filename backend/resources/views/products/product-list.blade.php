
    <x-slot name="header">
    </x-slot>
    <div>
        <x-jet-input type="text" class="container flex justify-center my-12 mx-auto px-4 md:px-12" placeholder="Search" wire:model="searchTerm" />
        <div class="grid lg:grid-cols-4">
            <div class="container my-12 mx-auto px-4 md:px-12 lg:col-span-1">
                <div class="bg-white shadow w-full my-2 ">
                    <ul class="list-reset">
                        <li class="hover:bg-blue-100 " wire:click="filter_category({{null}})" >
                            <a class="block p-4 text-grey-darker font-bold border-purple hover:bg-grey-lighter border-r-4">Visi</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="hover:bg-blue-100 @if($currentCategory == $category->id) bg-blue-200 @endif" wire:click="filter_category({{$category->id}})" >
                                <a class="block p-4 text-grey-darker font-bold border-purple hover:bg-grey-lighter border-r-4">{{$category->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="lg:col-span-3 container my-12 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @foreach($products as $product)
                    <!-- Column -->
                        <div class="my-1 px-1 w-auto md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">
                                <a href="{{route('product_view', $product->id)}}">
                                    <img alt="Placeholder" class="block h-full w-full" src="{{$product->image->first()['path'] ?? "https://www.trroofingsheets.co.uk/wp-content/uploads/2016/05/default-no-image-1.png"}}">
                                </a>

                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline hover:underline text-black" href="{{route('product_view', $product->id)}}">
                                            {{$product->name}}
                                        </a>
                                    </h1>
                                    <h1 class="text-red-600 text-lg font-bold">
                                        {{$product->price}}€
                                    </h1>
                                </header>
                                <div class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    Pardavėjas: {{$product->user->name}}
                                </div>
                                <footer class="flex justify-end leading-none p-2 md:p-4">
                                    <a href="{{route('product_view', $product->id)}}"class="focus:outline-none uppercase font-bold text-blue-700 hover:text-blue-500 mr-4">
                                        Peržiūrėti
                                    </a>
                                    <button class="focus:outline-none uppercase font-bold text-blue-700 hover:text-blue-500 mr-4">
                                        Į krepšelį
                                    </button>
                                </footer>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
            {{ $products->links() }}
    </div>
