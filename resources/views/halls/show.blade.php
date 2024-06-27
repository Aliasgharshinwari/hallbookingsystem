<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hall Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Hall Details</h1>
                    <div class="mb-4">
                        <p class="mb-2"><strong class="font-bold">Name:</strong> {{ $hall->name }}</p>
                        <p class="mb-2"><strong class="font-bold">Location:</strong> {{ $hall->location }}</p>
                        <p class="mb-2"><strong class="font-bold">Owner Name:</strong> {{ $hall->hall_owner->name ?? 'N/A' }}</p>
                        <p class="mb-2"><strong class="font-bold">Booking Price:</strong> {{ $hall->booking_price }}</p>
                        <p class="mb-2"><strong class="font-bold">Capacity:</strong> {{ $hall->capacity }}</p>
                        <p class="mb-2"><strong class="font-bold">Is Available:</strong> {{ $hall->is_available ? 'Yes' : 'No' }}</p>
                        <p class="mb-2"><strong class="font-bold">Hall Type:</strong> {{ $hall->hall_type }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('halls.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                        <a href="{{ route('halls.edit', $hall->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete Hall
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
