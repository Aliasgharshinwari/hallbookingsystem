<!-- resources/views/bookings/create.blade.php -->

<x-app-layout>
<div class="container">
    <form id="booking-form">
        @csrf
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Book</button>
    </form>

    <div id="timer" style="display: none;">
        <h2>Booking Timer</h2>
        <p id="time-remaining"></p>
    </div>
</div>

<script>
    document.getElementById('booking-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('{{ route('bookings.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.booking) {
                startTimer(new Date(data.booking.end_time));
                document.getElementById('booking-form').style.display = 'none';
                document.getElementById('timer').style.display = 'block';
            }
        })
        .catch(error => console.error('Error:', error));
    });

    function startTimer(endTime) {
        const timerInterval = setInterval(() => {
            const now = new Date().getTime();
            const distance = new Date(endTime).getTime() - now;

            if (distance < 0) {
                clearInterval(timerInterval);
                document.getElementById('time-remaining').innerHTML = "EXPIRED";
                return;
            }

            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('time-remaining').innerHTML = hours + "h "
                + minutes + "m " + seconds + "s ";
        }, 1000);
    }
</script>
</x-app-layout>