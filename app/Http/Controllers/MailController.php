<?php

namespace App\Http\Controllers;

use App\Mail\ArtworkContactMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request) {

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone'      => 'nullable|string',
            'address'    => 'nullable|string',
            'city'       => 'nullable|string',
            'postal_code'=> 'nullable|string',
            'country'    => 'nullable|string',
            'message'    => 'nullable|string',
            'g-captcha-response.required' => 'required|captcha'
        ]);

        $this->validateRecaptcha($request);

        Log::info('contact mail validated');

        Mail::to(config('mail.from.address'))->send(new ContactMail($validated));

        Log::info('contact mail sent');

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function artworkSend(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone'      => 'nullable|string',
            'address'    => 'nullable|string',
            'city'       => 'nullable|string',
            'postal_code'=> 'nullable|string',
            'country'    => 'nullable|string',
            'artwork_id'     => 'required|string',
            'contact_method' => 'nullable|string',
            'message'    => 'nullable|string'
        ]);

        $this->validateRecaptcha($request);

        Log::info('artwork mail validated');

        Mail::to(config('mail.from.address'))->send(new ArtworkContactMail($validated));

        Log::info('artwork mail sent');

        return redirect()->back()->with('success', 'Thank you for your interest! We will get back to you as soon as possible.');

    }

    private function validateRecaptcha(Request $request): void
    {
        $request->validate([
            'g-recaptcha-response' => ['required'],
        ], [
            'g-recaptcha-response.required' => 'Please confirm that you are not a robot.',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (! $response->json('success')) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'g-recaptcha-response' => 'Captcha verification failed. Please try again.',
            ]);
        }
    }
}
