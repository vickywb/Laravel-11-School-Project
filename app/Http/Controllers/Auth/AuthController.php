<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
         return view('admin.auth.login');
    }
 
    public function doLogin(LoginRequest $request)
    {
        $request->authenticate();
 
        $request->session()->regenerate();
 
        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    public function changePassword(Request $request, User $user)
    {
        return view('admin.auth.changepassword', [
            'user' => $user
        ]);
    }

    public function doChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth()->user();
        
        //Check, the new password can't be the same as before
        if (strcmp($request->current_password, $request->new_password) == 0) {
            return redirect()->back()->withErrors([
                'errors' => "Password can't be same as before!."
            ]);
        }

        //Check is current password same with the user password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors([
                'errors' => 'Password did not match.'
            ]);
        }

        try {
            DB::beginTransaction();

            $user = $user->fill([
                'password' => Hash::make($request->new_password)
            ]);

            $user = $this->userRepository->store($user);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.dashboard')->with([
            'success' => 'Password has successfully changed.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
 }