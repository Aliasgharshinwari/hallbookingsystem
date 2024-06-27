<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <div class="mt-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Available Halls') }}</h3>

                    @if($availableHalls->isEmpty())
                        <p>{{ __('No halls available.') }}</p>
                    @else
                        <ul>
                            @foreach($availableHalls as $hall)
                                <li class="mb-2">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-lg font-bold">{{ $hall->name }}</p>
                                            <p>{{ $hall->location }}</p>
                                            <p>{{ $hall->hall_type }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('halls.show', $hall->id) }}" class="text-blue-500 hover:underline">
                                                {{ __('View Details') }}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
