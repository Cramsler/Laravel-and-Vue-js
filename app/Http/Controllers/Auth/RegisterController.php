<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(UserCreateRequest $request)
    {
        $user = $this->service->create($request);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/');
    }
}
