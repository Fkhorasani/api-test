<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function process(Request $request)
    {

        $validatedData = $request->validate([
            'payment_code' => 'required|string',
            'amount' => 'required|numeric',
            'name' => 'required|string',
        ]);

        // Make sure the amount is in numeric value
        $validatedData['amount'] = (float) $validatedData['amount'];

        // Send the request to the validation URL without verifying the certificate
        $response = Http::withoutVerifying()->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://do27w.mocklab.io/pay/validate', $validatedData);

        // Process the response
        if ($response->successful()) {
            $responseData = $response->json();

            // Access the data in the response
            $message = $responseData['message'];
            
            // Perform further actions based on the response
            if ($message === 'Payment Success') {
                
                $emailData = "Pembayaran berhasil, ini adalah kode tiket Anda: TKT-BTX-001-VIP";

                // Send success email to the user
                Mail::raw($emailData, function ($message) use ($request) {
                    $message->to('testreceiver@gmail.com');
                    $message->subject('Pembayaran Tiket BTX Berhasil');
                });
                // return response()->json(['message' => 'Pembayaran berhasil, ini adalah kode tiket Anda: TKT-BTX-001-VIP']);
                return view('message',[
                    'kode' => $validatedData['payment_code'],
                    'message' => $message
                ]);
            } else {
                return view('message',[
                    'message' => $message
                ]);
            }
        } else {
            // The request to the validation URL was not successful
                
                return view('message',[
                    'message' => 'Validasi URL Gagal'
                ]);
        }
    }
    public function message(){
        return view('message');
    }
}
