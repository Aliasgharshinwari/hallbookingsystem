<x-app-layout>
    <h1 class="text-2xl font-semibold mb-4">My Bookings</h1>
        @foreach ($mybookings as $mybooking)
            @if(Auth::user()->id === $mybooking->customer_id)
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <!-- <h1 class="text-2xl font-semibold mb-4">Booking Details</h1> -->
                                <div class="mb-4">
                                    <p class="mb-2"><strong class="font-bold">Hall:</strong> {{ $mybooking->hall->name ?? 'N/A'}}</p>
                                    <p class="mb-2"><strong class="font-bold">Customer:</strong> {{ $mybooking->customer->name ?? 'N/A'}}</p>
                                    <p class="mb-2"><strong class="font-bold">Booking Price:</strong> ${{ $mybooking->hall->booking_price }}</p>
                                    <p class="mb-2"><strong class="font-bold">Booking Start Time:</strong> {{ $mybooking->booking_start_time }}</p>
                                    <p class="mb-2"><strong class="font-bold">Booking End Time:</strong> {{ $mybooking->booking_end_time }}</p>
                                    <p class="mb-2"><strong class="font-bold">Time Remaining:</strong> <span id="time-remaining">Calculating...</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const startTime = new Date('{{ $mybooking->booking_start_time }}');
            const endTime = new Date('{{ $mybooking->booking_end_time }}');
            const timeRemainingElement = document.getElementById('time-remaining');

            function updateTimeRemaining() {
                const now = new Date();
                if (now < startTime) {
                    timeRemainingElement.textContent = `Booking Not Yet Started`;
                    return;  
                }
                
                const timeDifference = endTime - now;
                
                if (timeDifference <= 0) {
                    timeRemainingElement.textContent = 'Booking has ended';
                    return;
                }

                const seconds = Math.floor((timeDifference / 1000) % 60);
                const minutes = Math.floor((timeDifference / (1000 * 60)) % 60);
                const hours = Math.floor((timeDifference / (1000 * 60 * 60)) % 24);
                const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

                timeRemainingElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }

            setInterval(updateTimeRemaining, 1000);
            updateTimeRemaining();
        });
    </script>
</x-app-layout>
