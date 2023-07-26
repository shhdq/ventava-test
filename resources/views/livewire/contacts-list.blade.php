<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-5">
    <div class="flex items-center justify-between pb-5">
        <h2 class="font-semibold text-2xl text-gray-800">Contacts</h2>
        @livewire('contact-form')
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
            <thead>
                <tr class="text-left">
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Name</th>
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Email</th>
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Phone</th>
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($contacts->isEmpty())
                <tr>
                    <td colspan="4" class="border-dashed border-t border-gray-200 px-3 py-4 text-center">
                        No contacts found.
                    </td>
                </tr>
                @else
                @foreach ($contacts as $contact)
                <tr>
                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $contact->name }}</td>
                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $contact->email }}</td>
                    <td class="border-dashed border-t border-gray-200 px-3 py-2">{{ $contact->phone }}</td>
                    <td class="border-dashed border-t border-gray-200 px-3 py-2">
                        <button 
                            wire:click="$emit('editContact', {{ $contact->id }})" 
                            class="text-blue-500 hover:text-blue-700 underline cursor-pointer">
                            Edit
                        </button>
                        <button 
                            wire:click="delete({{ $contact->id }})" 
                            class="text-red-500 hover:text-red-700 underline cursor-pointer ml-3">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
