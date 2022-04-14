<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WrongAgeController extends Controller
{
    public function index($status, $email, $birth_date): \Inertia\Response
    {
        if ($email === null) {
            return redirect()->route('register');
        }

        return Inertia::render('Auth/WrongAge', [
            'status' => $status,
            'email' => $email,
            'birth_date' => $birth_date
        ]);
    }
}
