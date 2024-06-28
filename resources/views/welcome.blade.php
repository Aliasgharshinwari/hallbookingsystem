<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="container mx-auto p-8">
    @if (Route::has('login'))
        <nav class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold text-white-500">Hall Booking System</h1>
            <div class="flex space-x-4">
                @auth
                <a href="{{ url('/dashboard') }}"
                     class="text-white-500 hover:text-white-400"
                >
                    Dashboard
                </a>
                @else
                <a
                href="{{ route('login') }}"
                class="text-white-500 hover:text-white-400"
                 >
                     Log in
                 
                 @if (Route::has('register'))
                     <a
                         href="{{ route('register') }}"
                         class="text-white-500 hover:text-white-400"
                     >
                         Register
                     </a>
                 @endif
                @endauth
            </div>
        </nav>
        @endif

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold mb-6 text-center text-white-500">Welcome to the Hall Booking System</h2>
            <p class="mb-6 text-center text-lg">Our Hall Booking System provides a seamless way to book halls for various events and occasions. Explore the features below to understand how our system can help you manage your bookings efficiently.</p>
            
            <div class="mb-6">
                <h3 class="text-3xl font-semibold mb-2 text-white-400">Easy Booking</h3>
                <p>Book halls easily with our user-friendly interface. Select the date, time, and hall to make a reservation in just a few clicks.</p>
            </div>

            <div class="mb-6">
                <h3 class="text-3xl font-semibold mb-2 text-white-400">Hall Availability</h3>
                <p>Check the availability of halls with our integrated calendar. Avoid double bookings and find the perfect slot for your event.</p>
            </div>
        </div>
    </div>
</body>
</html>
