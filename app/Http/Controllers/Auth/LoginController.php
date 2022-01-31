<?php
use App\Traits\ApiResponser;
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function log(Request $request){
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:4'
        ]);
        if (!Auth::attempt($attr)) {
            return $this->error('Mot de passe ou email invalides', 401);
        }
        return response()->json(
            [
                'message' => 'Vous êtes connecté avec succès',
                'status' => 200,
                'user' => Auth::user(),
                'token' => $request->user()->createToken('API Token')->plainTextToken
            ],
            200 ,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8',
            ],
            JSON_UNESCAPED_UNICODE
        );
    }



    public function logot(Request $request)
    {
        // dd(auth()->user());
        auth()->user()->currentAccessToken()->delete();
        return response()->json(
            [
                'message' => 'Vous êtes déconnecté avec succès',
                'status' => 200,
            ],
            200 ,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8',
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

}
