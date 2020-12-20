<x-slot name="header">
    Checkout
</x-slot>
<main class="my-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-center">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                @if($completed == 0)
                <form>
                    <div>
                        <h4 class="text-sm text-gray-500 font-medium">Delivery method</h4>
                        <div class="mt-7">
                            <label>
                                <select class="form-select text-gray-700 mt-1 block w-full" wire:model="method">
                                    <option value=1>UPS Delivery 10€</option>
                                    <option value=2>FedEx Delivery 15€</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Delivery speed</h4>
                        <div class="mt-7">
                            <label>
                                <select class="form-select text-gray-700 mt-1 block w-full" wire:model="speed">
                                    <option value="exp">Express 5€</option>
                                    <option value="norm">Normal 0€</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Delivery address</h4>
                        <div class="mt-7">
                            <label>
                                <input type="text" class="form-input mt-1 block w-full text-gray-700" wire:model="address" placeholder="Address">
                            </label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Card</h4>
                        <input class="form-input mt-1 block w-full text-gray-700" id="cus_name" type="text" placeholder="Card Number MM/YY CVC" aria-label="Name">
                    </div>
                    <div class="flex items-center justify-between mt-8">

                        <button wire:click="submit()" class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Payment</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>

                    </div>
                </form>
                @endif
                @if($completed > 0)
                <div>
                    <div class="mt-7" style="color:green; font-size:35px; text-align:center;">
                        Order completed!
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>