<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Hall Owners</h1>
                    <div class="mb-6">
                        <a href="{{ route('hall_owners.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Hall Owner
                        </a>
                    </div>
                    <ul class="space-y-4">
                        @foreach ($hall_owners as $hall_owner)
                            <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                                <div>
                                    <a href="{{ route('hall_owners.show', $hall_owner->id) }}" class="text-lg font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                        {{ $hall_owner->name }}
                                    </a>
<!--                                    
                                    <p class="text-lg font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                         about {{ $hall_owner->hall->name }}
                                     </p> -->
                                </div>
                          
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
