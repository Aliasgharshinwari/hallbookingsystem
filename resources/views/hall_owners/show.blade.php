<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Hall Owner Details</h1>
                    <div class="mb-4">
                        <p class="mb-2"><strong class="font-bold">Name:</strong> {{ $hall_owner->name }}</p>
                        <p class="mb-2"><strong class="font-bold">Phone No:</strong> {{ $hall_owner->phone_No }}</p>
                        <p class="mb-2"><strong class="font-bold">Address:</strong> {{ $hall_owner->address }}</p>
                        <p class="mb-2"><strong class="font-bold">Hall Owned:</strong> {{ $hall_owner->hall->name }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('hall_owners.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                        <a href="{{ route('hall_owners.edit', $hall_owner->id ?? 0) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit Hall Owner
                        </a>
                        <form action="{{ route('hall_owners.destroy', $hall_owner->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete Hall Owner
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>