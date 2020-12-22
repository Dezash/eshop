<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Application - {{ $application->applicant->name }}
    </h2>
</x-slot>
<div class="py-12">
    @if($isOpen)
    @include('applications.modal')
    @endif

    <div class="container my-12 mx-auto px-4 md:px-12 lg:col-span-1">
        <div class="md:flex md:items-center">
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">

                <hr class="my-3">
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Name: </p>{{$application->applicant->name}}
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Email: </p>{{$application->applicant->email}}
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Status: </p>{{$application->status === 1 ? "Approved" : ($application->status === 0 ? "Rejected" : "Pending")}}
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex items-center mt-1">
                        <p class="font-bold text-blue-700 pr-2">Text: </p>{{$application->text}}
                    </div>
                </div>
 
                <div class="flex items-center mt-6">
                    <button wire:click="approve" class="disabled:opacity-50 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Approve</button>
                    <button wire:click="reject" class="disabled:opacity-50 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                </div>
            </div>
        </div>
    </div>
</div>
