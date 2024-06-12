<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuickEmail;



class EmailController extends Controller
{
    public function sendQuickEmail(Request $request)
    {
        $validated = $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'subject' => $validated['subject'],
            'message' => $validated['message']
        ];

        Mail::to($validated['recipient'])->send(new \App\Mail\QuickEmail($details));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
