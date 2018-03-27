<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\Role_user;
use Sentinel;
use App\User;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Centaur\Dispatches\BaseDispatch;

class SessionController extends Controller
{
    /** @var Centaur\AuthManager */
    protected $authManager;

    /**
     * Create a new authentication controller instance.
     *
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->middleware('sentinel.guest', ['except' => 'getLogout']);
        $this->authManager = $authManager;
    }

    /**
     * Show the Login Form
     * @return View
     */
    public function getLogin()
    {
        if (Sentinel::check()){
            Session()->flash('error','You are already logged in..');
            return redirect()->back();
        }

        return view('Centaur::auth.login');
    }

    /**
     * Handle a Login Request
     * @param Request $request
     * @return Redirect|Response
     */
    public function postLogin(Request $request)
    {
        // Validate the Form Data
        $result = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Assemble Login Credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
        ];
        $remember = (bool)$request->get('remember', false);

        // Attempt the Login
         $try = $this->authManager->authenticate($credentials, $remember);

         if (!$try->isFailure()){
             $redirect_user = Sentinel::getUser()->roles()->first()->slug;
             return redirect($redirect_user);
         }else{
             Session()->flash('error','Wrong username or password');
         }
             return redirect()->back();



    }

    /**
     * Handle a Logout Request
     * @param Request $request
     * @return Redirect|Response
     */
    public function getLogout(Request $request)
    {
        // Terminate the user's current session.  Passing true as the
        // second parameter kills all of the user's active sessions.
        $result = $this->authManager->logout(null, null);

        // Return the appropriate response
        return redirect('login');
    }
}
