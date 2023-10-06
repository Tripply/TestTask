<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $users = User::all()->where('role', 2);

        return view('users', compact('users'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function update(Request $request): void
    {
        $user = User::find($request->id);
        $user->update([
            'email' => $request->email,
        ]);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request): void
    {
        User::destroy($request->id);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function create(Request $request): void
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
