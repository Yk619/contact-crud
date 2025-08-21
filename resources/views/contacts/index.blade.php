<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Import XML --}}
                <form action="{{ route('contacts.importXml') }}" method="POST" enctype="multipart/form-data" class="mb-6 flex items-center space-x-4">
                    @csrf
                    <input type="file" name="xml_file" class="border border-gray-300 rounded-md p-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded-lg hover:bg-blue-700">
                        Import XML
                    </button>
                </form>

                <a href="{{ route('contacts.create') }}" class="px-4 py-2 bg-green-600 text-black rounded-lg hover:bg-green-700">
                    + Add Contact
                </a>

                {{-- Table --}}
                <div class="mt-6 overflow-x-auto">
                    <table class="min-w-full border border-gray-200 shadow rounded-lg">
                        <thead class="bg-blue-600 text-black">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Phone</th>
                                <th class="px-6 py-3 text-right text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-400">
                            @foreach($contacts as $c)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $c->name }}</td>
                                    <td class="px-6 py-4">{{ $c->phone }}</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="{{ route('contacts.edit', $c) }}" class="px-3 py-1 bg-yellow-500 text-black rounded-md hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('contacts.destroy', $c) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
