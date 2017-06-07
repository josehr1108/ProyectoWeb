<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $dbUser = User::where('email', $user->email)->first();
        if($dbUser){
            Auth::login($dbUser);
        }else{
            $new_user=User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => null,
                'userType' => 'Usuario',
            ]);
            Auth::login($new_user);
        }
        return redirect('/home');
    }
}