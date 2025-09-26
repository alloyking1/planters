<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsletterController extends Controller
{   
    protected $mailerlite;
    protected $base_url;

    public function __construct()
    {
        $this->mailerlite = env('MAILERLITE_API_KEY');
        $this->base_url = env('MAILERLITE_BASE_URL');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // write the email to a file - this is a temporary solution
        $file = fopen('newsletter_subscribers.txt', 'a');
        fwrite($file, $request->email . "\n");
        fclose($file);

        return redirect()->back()->with('success', 'You have been subscribed to the newsletter');
        
        // $headers = [
        //     'Authorization' => 'Bearer ' . env('MAILERLITE_API_KEY'),
        //     'Content-Type' => 'application/json',
        // ];

        // $response = Http::withHeaders($headers)->post($this->base_url, [
        //     'email' => $request->email,
        // ]);

        // dd($response->json());

        // return response()->json($response->json());
    }
}
