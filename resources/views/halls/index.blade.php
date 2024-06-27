<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Halls</h1>
                    <div class="mb-6">
                        <a href="{{ route('halls.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Hall
                        </a>
                    </div>
                    <ul class="space-y-4">
                        @foreach ($halls as $hall)
                            <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                                <div>
                                    <a href="{{ route('halls.show', $hall->id) }}" class="text-lg font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                        {{ $hall->name }}
                                    </a>
                                </div>
                                <div class="space-x-4">
                                    <a href="{{ route('halls.edit', $hall->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
