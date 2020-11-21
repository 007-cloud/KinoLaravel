<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        return view('payments.show', [
            'not' => tap(auth()->user()->unreadNotifications)->markAsRead()
        ]);
    }
}
