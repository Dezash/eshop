<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Merchant applications
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <x-jet-input type="text" class="block mt-1" placeholder="Search" wire:model="searchTerm" />
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">#</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr>
                        <td class="border px-4 py-2">{{ $application->id }}</td>
                        <td class="border px-4 py-2">{{ $application->applicant->name }}</td>
                        <td class="border px-4 py-2">{{ $application->applicant->email }}</td>
                        <td class="border px-4 py-2">
                        <a href="/application/{{ $application->id }}" class="disabled:opacity-50 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $applications->links() }}
        </div>
    </div>
</div>