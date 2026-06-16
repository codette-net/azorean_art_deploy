<?php

namespace App\Http\Controllers;

use App\Mail\ReservationRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function showEnglish()
    {
        return view('reservation.english');
    }

    public function showPortuguese()
    {
        return view('reservation.portuguese');
    }

    public function store(Request $request)
    {

        Log::info('before validation');
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'nullable|string',
            'address'    => 'nullable|string',
            'city'       => 'nullable|string',
            'postal_code'=> 'nullable|string',
            'country'    => 'nullable|string',
            'message'    => 'nullable|string'

     ]);

     Log::info('before mail sending');

     Mail::to(config('mail.from.address'))->send(new ReservationRequestMail($validated));
     
     return redirect('/');
//     later:  route->with succcess
    }
}
