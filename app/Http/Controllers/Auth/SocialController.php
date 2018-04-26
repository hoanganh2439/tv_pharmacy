<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();
        $email = $user->email;
        $fullname = $user->name;
        $request->session()->put('email', $email);
         $request->session()->put('fullname', $fullname);
        //dd($user);
        return redirect('customer/showall/show');
    }
}
