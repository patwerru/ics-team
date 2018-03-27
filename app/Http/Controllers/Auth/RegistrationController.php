<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use Mail;
use Session;
use Sentinel;
use Activation;
use App\Http\Requests;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Centaur\Mail\CentaurWelcomeEmail;

class RegistrationController extends Controller
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
        $this->middleware('sentinel.guest');
        $this->authManager = $authManager;
    }

    /**
     * Show the registration form
     * @return View
     */
    public function getRegister()
    {
        return view('Centaur::auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return Redirect|Response
     * @internal param array $data
     */
    protected function postRegister(Request $request)
    {
        // Validate the form data
        $result = $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'id_number' => 'required',
            'user_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // Assemble registration credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone_number' => $request->get('phone'),
            'id_number' => $request->get('id_number'),
            'user_type' => $request->get('user_type'),
        ];

        // Attempt the registration
        $result = $this->authManager->register($credentials);
        if ($result->isFailure()) {
            return $result->dispatch();
        }

        $userId = User::where('email',trim($request->get('email')))->first();
        $role = Sentinel::findRoleBySlug('guest');
        $user = Sentinel::findById($userId);
        $role->users()->attach($user);
//        $role = Role::where('name','guest')->first();
//        $user = User::where('email',trim($request->get('email')));
//        $user->attach($role);

        // Send the activation email
        $code = $result->activation->getCode();
        $email = trim($request->get('email'));
        Mail::to($email)->queue(new CentaurWelcomeEmail($email, $code, 'Your account has been created!'));

        // Ask the user to check their email for the activation link
        $result->setMessage('Registration complete.  Please check your email for activation instructions.');

        // There is no need to send the payload data to the end user
        $result->clearPayload();

        // Return the appropriate response
        Session()->flash('success',"Registration complete.  Please check $email for activation instructions.");
        return redirect('info');
    }


    /**
     * Activate a user if they have provided the correct code
     * @param Request $request
     * @param  string $code
     * @return Redirect|Response
     */
    public function getActivate(Request $request, $code)
    {
        // Attempt the registration
        $result = $this->authManager->activate($code);

        if ($result->isFailure()) {
            // Normally an exception would trigger a redirect()->back() However,
            // because they get here via direct link, back() will take them
            // to "/";  I would prefer they be sent to the login page.
            $result->setRedirectUrl(route('auth.login.form'));
            return $result->dispatch();
        }

        // Ask the user to check their email for the activation link
        $result->setMessage('Registration complete.  You may now log in.');

        // There is no need to send the payload data to the end user
        $result->clearPayload();

        // Return the appropriate response
        Session()->flash('success',"Registration complete.  You may now log in.");
        return redirect('login');
    }

    /**
     * Show the Resend Activation form
     * @return View
     */
    public function getResend()
    {
        return view('Centaur::auth.resend');
    }

    /**
     * Handle a resend activation request
     * @param Request $request
     * @return Redirect|Response
     */
    public function postResend(Request $request)
    {
        // Validate the form data
        $result = $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);

        // Fetch the user in question
        $user = Sentinel::findUserByCredentials(['email' => $request->get('email')]);

        // Only send them an email if they have a valid, inactive account
        if (!Activation::completed($user)) {
            // Generate a new code
            $activation = Activation::create($user);

            // Send the email
            $code = $activation->getCode();
            $email = $user->email;
            Mail::to($email)->queue(new CentaurWelcomeEmail($email, $code, 'Account Activation Instructions'));
        }

        $message = 'New instructions will be sent to that email address if it is associated with a inactive account.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 200);
        }

        Session::flash('success', $message);
        return redirect('info');
    }
}
