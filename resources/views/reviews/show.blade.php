<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Review Details</h1>
                    <div class="mb-4">
                        <p class="mb-2"><strong class="font-bold">Customer ID:</strong> {{ $review->customer_id }}</p>
                        <p class="mb-2"><strong class="font-bold">Customer Name:</strong> {{ $review->customer->name }}</p>
                        <p class="mb-2"><strong class="font-bold">Hall Name:</strong> {{ $review->hall->name }}</p>
                        <p class="mb-2"><strong class="font-bold">Title:</strong> {{ $review->title }}</p>
                        <p class="mb-2"><strong class="font-bold">Body:</strong> {{ $review->body }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('reviews.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>