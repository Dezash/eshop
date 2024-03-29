<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cart
    </h2>
</x-slot>
@php($total = 0)


<div class="py-1">
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Product</th>
                            <th class="lg:text-right text-left pl-5 lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-right md:table-cell">Unit price</th>
                            <th class="text-right">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <img src="{{$products->firstWhere('id', $item->product_id)->images->first()['path'] ?? "https://www.trroofingsheets.co.uk/wp-content/uploads/2016/05/default-no-image-1.png"}}" class=" w-20 rounded" alt="Thumbnail">
                            </td>
                            <td>
                                <p class="mb-2 md:ml-4"> {{$products->firstWhere('id', $item->product_id)->name}}</p>

                                <button wire:click="delete({{ $item }})" class="text-gray-700 md:ml-4">
                                    <small>(Remove item)</small>
                                </button>
                            </td>
                            <td class="justify-center md:justify-end md:flex mt-6">
                                <div class="w-20 h-10">
                                    <div class="relative flex flex-row w-full h-8">
                                        <div class="flex items-center text-sm font-bold" wire:click="increaseQnt({{ $item }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z" />
                                            </svg>
                                        </div>
                                        <input type="text" disabled value="{{$item->quantity}}" style="width:50px" class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                        <div class="flex items-center text-sm font-bold" wire:click="lowerQnt({{ $item }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-minus-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM6 7.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z" />
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <span class="text-sm lg:text-base font-medium">
                                    {{$products->firstWhere('id', $item->product_id)->price}}€
                                </span>
                            </td>
                            <td class="text-right">
                                <span class="text-sm lg:text-base font-medium">
                                    {{$products->firstWhere('id', $item->product_id)->price * $item->quantity}}€
                                    @php($total += $products->firstWhere('id', $item->product_id)->price * $item->quantity)
                                </span>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $cart->links() }}
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2" style="display:flex; justify-content:center">
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase" style="text-align:center;">Order Details</h1>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    Total
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    {{ $total }}€
                                </div>
                            </div>

                            @if($cart->count() == 0)
                            <a>
                                @else
                                <a wire:click="createOrder()">
                                    @endif
                                    <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" /></svg>
                                        <span class="ml-2 mt-5px">Procceed to checkout</span>
                                    </button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>