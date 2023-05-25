<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CDN Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pembelian Tiket Konser BTX</title>
</head>
<body class="">
    <div class="h-screen bg-indigo-300 flex flex-col justify-center items-center">
        <div class="text-3xl font-bold text-white pb-4 drop-shadow-xl">Pembelian Tiket Konser BTX</div>
        <form method="POST" action="{{ route('payment.process') }}" class="w-full max-w-xs bg-white flex flex-col py-5 px-8 rounded-lg shadow-xl">
        @csrf
          <label class="text-gray-700 font-bold py-2" for="payment_code">Payment Code</label>
          <input class="text-gray-700 shadow border rounded border-gray-300 focus:outline-none focus:shadow-outline py-1 px-3 mb-3" name="payment_code" type="text" placeholder="Payment Code">
          <label class="text-gray-700 font-bold py-2" for="amount">Amount</label>
          <input class="text-gray-700 shadow border rounded border-gray-300 focus:outline-none focus:shadow-outline py-1 px-3 mb-3" name="amount" type="number" placeholder="Amount">
          <label class="text-gray-700 font-bold py-2" for="name">Name</label>
          <input class="text-gray-700 shadow border rounded border-gray-300 focus:outline-none focus:shadow-outline py-1 px-3 mb-3" name="name" type="text" placeholder="Name">
          <div class="flex justify-center items-center my-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
                Process Payment
            </button>
          </div>
          
        </form>
      </div>
</body>
</html>


