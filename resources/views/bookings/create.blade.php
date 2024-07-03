<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Place a Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- <h1 class="text-2xl font-semibold mb-6">Create Booking</h1> -->
                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hall:</label>
                            <select name="hall_id" id="hall_id" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($halls as $hall)
                                    @if ($hall->is_available)
                                        <option value="{{ $hall->id }}" data-price="{{ $hall->booking_price }}">{{ $hall->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price:</label>
                            <p id="hall_price" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Booking Start Time:</label>
                            <input type="datetime-local" name="booking_start_time" id="booking_start_time" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Booking End Time:</label>
                            <input type="datetime-local" name="booking_end_time" id="booking_end_time" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the current date and time in the format required for the input[type="datetime-local"]
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

            // Set the min attribute for the booking start time input
            const bookingStartTimeInput = document.getElementById('booking_start_time');
            const bookingEndTimeInput = document.getElementById('booking_end_time');
            bookingStartTimeInput.setAttribute('min', currentDateTime);
            bookingEndTimeInput.setAttribute('min', currentDateTime);

            // Update hall price based on selected hall
            const hallSelect = document.getElementById('hall_id');
            const hallPrice = document.getElementById('hall_price');

            function updateHallPrice() {
                const selectedOption = hallSelect.options[hallSelect.selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                hallPrice.textContent = price ? `$${price}` : 'N/A';
            }

            hallSelect.addEventListener('change', updateHallPrice);
            updateHallPrice(); // Initial call to set the price on page load
        });
    </script>
</x-app-layout>
