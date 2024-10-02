<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function submitWillComeWedding(Request $request)
    {
        $name      = $request->get('name');
        $will_come = (int) $request->get('will_come');
        $message   = $request->get('message');
        Contact::create([
            'name'    => $name,
            'status'  => $will_come,
            'message' => $message,
        ]);

        return redirect()->back();
    }
}
