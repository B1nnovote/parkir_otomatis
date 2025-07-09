<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// ✅ Tambahkan ini

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect berdasarkan isAdmin
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin == 1) {
            return redirect('/backend'); 
        } elseif ($user->isAdmin == 0){
            return redirect('/frontend'); 
        } else{
                return abort(403);
        }
    }

    /**
     * Default redirect (tidak akan terpakai karena kita override)
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
