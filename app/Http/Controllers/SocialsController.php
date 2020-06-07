<?php

namespace App\Http\Controllers;

use SocialAuth;

use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function auth($provider)
    {
        // this function is going to direct a user trying to login the application to github to be authenticated then redirect them back
        // using the social auth method
        return SocialAuth::authorize($provider);    // so if a user clicks on github, it's going to authorise github or if he clicks on facebook, it's going to authorise facebook
    }


    public function auth_callback($provider)
    {
        // regiater a new user or login if already authenticated and registered
        SocialAuth::login($provider, function($user, $details){    // login user from provider, accompanied with the details of the user from the provider, github or facebook or ay other provider that authenticate the user
            // dd($details);
            $user->avatar = $details->avatar;
            $user->email = $details->email;
            $user->name = $details->full_name;
            $user->save();  // save to the application database
        });

        return redirect('/home');
    }
}
