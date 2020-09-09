<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WooAuthenticationService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Service to Authenticate
     *
     * @var App\Services\WooAuthenticationService
     */
    protected $wooAuthenticationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WooAuthenticationService $wooAuthenticationService)
    {
        $this->middleware('guest')->except('logout');

        $this->wooAuthenticationService = $wooAuthenticationService;
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $authorizationUrl = $this->wooAuthenticationService->resolveAuthorizationUrl();

        return view('auth.login')
            ->with(['authorizationUrl' => $authorizationUrl]);
    }

    /**
     * Resolve the user authorization
     *
     * @return \Illuminate\Http\Response
     */
    public function authorization(Request $request)
    {
        if ($request->has('code')) {
            $tokenData = $this->wooAuthenticationService->getCodeToken($request->code);

            dd($tokenData);

            return;
        }

        return redirect()
            ->route('login')
            ->withErrors(['You canecelled the authorization process']);
    }

}
