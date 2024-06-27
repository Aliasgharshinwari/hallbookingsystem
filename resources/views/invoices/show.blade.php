<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Invoice Details</h1>
                    <div class="mb-4">
                        <p class="mb-2"><strong class="font-bold">Booking ID:</strong> {{$invoice->booking->id  }}</p> 
                        <p class="mb-2"><strong class="font-bold">Payment Paid:</strong> {{ $invoice->payment_paid }}</p>
                        <p class="mb-2"><strong class="font-bold">Date Paid:</strong> {{ $invoice->date_paid }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('invoices.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>