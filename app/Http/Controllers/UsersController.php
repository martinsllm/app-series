<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersFormRequest;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UsersFormRequest $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        Auth::login($user);
        return redirect()->route('series.index');
    }
}
