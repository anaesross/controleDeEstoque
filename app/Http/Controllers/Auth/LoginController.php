<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; //para fazer login com google

use App\User;
use Auth;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect(); //informar o nome do local que quer conectar - função pronta, pack do socialite
    }

    public function receiveDataGoogle(){
        $userGoogle = Socialite::driver('google')->user(); //aqui ele puxa todas as informações do usuário, igual o Auth() ou session()
       /*  dd($user); */
        $userDb = $this->findOrCreateUser($userGoogle); // pega os dados do usuario no google e atribui uma variavel para visualizar no nosso banco de dados

        Auth::login($userDb, true);//se os dados estiverem corretos ele autentica o usuario

        return redirect($this->redirectTo); //redireciona para home
    }

    public function findOrCreateUser($userGoogle){
       $user = User::where('email',$userGoogle->email)->first(); //where funcao do laravel, busca primeiro o campo que vc quer e depois o que ele recebe
        //first() = retorna o primeiro email localizado no banco;
        if($user){
            return $user; //caso ele esteja ja cadastrado no banco retorna os dados do usuário
        } //senão ele verifica a conexão com dados do google, cadastra os dados q vem do google
        $newUser = new User(); //primeiro valor eh o que esta no nosso banco , segundo valor eh o que está dentro do dados do google
        $newUser->name = $userGoogle->name;
        $newUser->email = $userGoogle->email;
        $newUser->img_profile = $userGoogle->avatar;
        $newUser->provider_id = $userGoogle->id;
        $newUser->active = 1; //deixa o usuario como ativo já.

        $newUser->save(); //salva usuario no banco

        return $newUser; //retorna o usuario

    }
}
