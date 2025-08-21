<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Contact') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Name</label>
                        <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Phone</label>
                        <input type="text" name="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
