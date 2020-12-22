  
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Merchant application
    </h2>
</x-slot>
<div class="py-12">
    <div class="mb-12 p-6 bg-white border rounded-md shadow-xl">
        <form wire:submit.prevent="submit">
            @error('text') <span class="text-red-500">{{ $message }}</span> @enderror
            <br>
            <p class="mb-1">Text:</p>
            <div class="mb-3">
                <textarea wire:model="text" class="shadow appearance-none border rounded py-1 px-3 text-grey-darker w-full h-64"></textarea>
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Apply</button>
        </form>
    </div>
</div>