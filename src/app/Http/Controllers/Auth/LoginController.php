<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラは、ユーザー認証のためのログイン機能を提供します。
    | ログイン後のリダイレクト先や認証失敗時の処理などをここで管理します。
    |
    */

    use AuthenticatesUsers;

    /**
     * ログイン後のリダイレクト先。
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ログインフォームの表示。
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理を行います。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // ログイン試行
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'))) {
            // 成功した場合
            return redirect()->intended($this->redirectTo);
        }

        // 失敗した場合
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'メールアドレスまたはパスワードが間違っています。',
            ]);
    }

    /**
     * ログアウト処理を行います。
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // セッションを無効化する
        $request->session()->invalidate();

        // CSRFトークンを再生成する
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
