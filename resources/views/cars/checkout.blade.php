@extends('components.layout')
@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="px-5">
        <div class="row justify-items-center my-3 pb-2">
            <h2 class="border-bottom col-md-4 ">Checkout</h2>
            <h2 class=" col-md-6 "></h2>
        </div>
    </div>
    <div class="m-4 p-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header font-weight-bold">Checkout Details</div>
                    <div class="card-body">
                        <input type="hidden" id="priceCash" value="{{$car->price_cash}}">
                        <input type="hidden" id="priceCredit" value="{{$car->price_installment}}">
                        <div class="mb-3">
                            <label for="item" class="form-label">Item</label>
                            <input type="text" class="form-control" name="item" id="item"
                                value="{{ $car->carModel->carBrand->brand }} {{ $car->carModel->model }} {{ $car->year }} | {{ $car->color }} {{ $car->transmission }}"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount" value="Rp. XXX.XXX.XXX"
                                disabled>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="radio" name="payment" id="cash" value="basic"
                                    checked>
                                <label class="form-check-label" for="cash">
                                    Cash
                                </label>
                            </div>
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="radio" name="payment" id="credit"
                                    value="premium">
                                <label class="form-check-label" for="credit">
                                    Credit
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form class="py-2" method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <input type="text" class="form-control" name="hiddenAmount" id="hiddenAmount" hidden>
                            <input type="text" class="form-control" name="transactionType" id="transactionType" hidden>
                            <input type="text" class="form-control" name="carId" id="carId" value="{{$car->id}}" hidden>
                            <div class="mb-3">
                                <label for="name" class="form-label">Recipient Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Full Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5" style="resize: none" required></textarea>
                            </div>
                            <button class="btn btn-success w-100" onclick="submitForm('cancel')">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get radio buttons and amount input element
            var cashRadio = document.getElementById('cash');
            var creditRadio = document.getElementById('credit');
            var amountInput = document.getElementById('amount');
            var hiddenAmountInput = document.getElementById('hiddenAmount');
            var transactionTypeInput = document.getElementById('transactionType');

            // Define the values for each payment type
            // var cashAmount = "Rp. 100.000.000"; // Update this as needed
            // var creditAmount = "Rp. 200.000.000"; // Update this as needed
            var cashAmount = document.getElementById('priceCash').value; // Update this as needed
            var creditAmount = document.getElementById('priceCredit').value; // Update this as needed

            // Function to update the amount based on the selected payment type
            function updateAmount() {
                if (cashRadio.checked) {
                    amountInput.value = cashAmount;
                    hiddenAmountInput.value = cashAmount;
                    transactionTypeInput.value = 'Cash';
                } else if (creditRadio.checked) {
                    amountInput.value = creditAmount;
                    hiddenAmountInput.value = creditAmount;
                    transactionTypeInput.value = 'Credit';
                }
            }

            // Event listeners for changes on radio buttons
            cashRadio.addEventListener('change', updateAmount);
            creditRadio.addEventListener('change', updateAmount);

            // Initial update in case the page is reloaded and a selection is retained
            updateAmount();
        });
    </script>
@endsection
