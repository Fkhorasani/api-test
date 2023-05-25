<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CDN Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Status Pembayaran</title>
</head>
<body>
    <div class="">
        <div class="h-screen bg-indigo-300 flex flex-col justify-center items-center">
            @if($message === 'Payment Success' )
                <div class="text-3xl font-bold text-white pb-4 drop-shadow-xl">Selamat Pembayaran Anda Berhasil dengan <i>Payment Code</i> {{ $kode }}</div>
                <div class="text-2xl font-bold text-white pb-4 drop-shadow-lg">Silahkan Mengecek Email Anda untuk Mendapatkan Kode Tiket Anda</div>
            @else
                <div class="text-3xl font-bold text-red-600 pb-4 drop-shadow-xl">Pembayaran Anda Gagal, Silahkan Cek Kembali Data Anda</div>                
                <div class="text-2xl font-bold text-red-600 pb-4 drop-shadow-lg">Silahkan Mengecek Email Anda untuk Mendapatkan Kode Tiket Anda</div>
            @endif
        </div>
    </div>
</body>
</html>