<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    /**
     * Redirect to login
     * @param mixed $provider
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Callback function login with social
     * @param mixed $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function callback($provider)
    {
        try {
            $socialMem = Socialite::driver($provider)->user();
            $existingUser = User::where('email', $socialMem->getEmail())->first();
            if ($existingUser) {
                if ($existingUser->provider === null) {
                    return redirect('/login')->withErrors(['email' => 'Email đã được đăng ký']);
                } else if ($existingUser->provider !== $provider) {
                    return redirect('/login')->withErrors(['email' => 'Email này đã được đăng ký mất rồi']);
                }
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialMem->id,
            ])->first();
            if (!$user) {
                $password = $provider;
                $user = User::create([
                    'name' => $socialMem->getName(),
                    'email' => $socialMem->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialMem->getId(),
                    'provider_token' => $socialMem->token,
                    'password' => $password
                ]);
                $user->sendEmailVerificationNotification();
                $user->update([
                    'password' => Hash::make($password)
                ]);
            }
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
