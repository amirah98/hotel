<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the social provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from social provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('/auth/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        auth()->login($authUser, true);

        return redirect()->to('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $socialLiteUser
     * @param $key
     * @return User
     */
    private function findOrCreateUser($socialLiteUser, $key)
    {
        $available_avatars = ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png','man.png', 'man-1.png', 'man-2.png', 'man-3.png'];
        $first_name = "";
        $last_name = "";
        if(!isset($socialLiteUser->name)){
            $first_name = $socialLiteUser->first_name;
            $last_name = $socialLiteUser->last_name;
        } else{
            $first_name = $socialLiteUser->name;
        }

        $user = User::updateOrCreate([
            'email' => $socialLiteUser->email,
        ], [
            $key . '_id' => $socialLiteUser->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'avatar' => $available_avatars[array_rand($available_avatars)]
        ]);


        return $user;
    }

}