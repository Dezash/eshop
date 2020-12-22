<x-slot name="header">
    Checkout
</x-slot>

<main class="my-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-center">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                        <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
                            <p>{{ $error }}</p>
                        </div>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($completed == 0)
                <form wire:submit.prevent="submit">
                    <div>
                        <h4 class="text-sm text-gray-500 font-medium">Delivery method</h4>
                        <div class="mt-7">
                            <label>
                                <select class="form-select text-gray-700 mt-1 block w-full" wire:model.defer="method">
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
                                <select class="form-select text-gray-700 mt-1 block w-full" wire:model.defer="speed">
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
                                <input type="text" class="form-input mt-1 block w-full text-gray-700" wire:model.defer="address" placeholder="Address">
                            </label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm text-gray-500 font-medium">Card</h4>
                        <input class="form-input mt-1 block w-full text-gray-700" wire:model.defer="card" id="cus_name" type="text" placeholder="Card Number" aria-label="Name">
                        <input class="form-input mt-1 text-gray-700" id="cus_name"  wire:model.defer="expiration" type="text" placeholder="MM/YY" aria-label="Name">
                        <input class="form-input mt-1 text-gray-700" id="cus_name" wire:model.defer="cvc"  type="text" placeholder="CVC" aria-label="Name">
                    </div>
                    <div class="flex items-center justify-between mt-8">

                        <button type="submit" class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Payment</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>

                    </div>
                </form>
                @else
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