<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAdminRequest;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        // Logic to display a list of admins
        $userCount = User::count();
        $orderCount = Order::count();
        $reviewCount = Review::count();
        return view('admin.dashboard' , compact('userCount', 'orderCount', 'reviewCount'));
    }

    /**
     * display the list of admins.
     */
    public function login()
    {        // Logic to display a list of admins
       return view('admin.login');
    }

    /**
     * log in the admin.
     */
    public function auth(AuthAdminRequest $request) : RedirectResponse
    {

        if (auth()->guard('admin')->attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }else {
            // If authentication fails, redirect back with an error message
            return Redirect::back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            ]) ->withInput();
        }
    }

    /**
     * Log out the admin.
     */

    public function logout(Request $request) : RedirectResponse
    {
        // Logic to log out the admin
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
}

}