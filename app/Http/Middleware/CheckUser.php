<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //objeto closure = valida a solicitação do usuário(nome/senha)
    {
        $user = Auth::user(); //retorna as informações do usuário logado = se nao existir usuario = false senao = true

        if($user){ //se existir o usuario ele loga
            return $next($request); // se os dados do usuário estiverem corretos ele passa a validação.
        }else{                       //pela classe Auth o laravel pega os dados do usuário = como se fosse a session
            return redirect('/login'); //rota pradão do Auth::routes();
        }
    }
}
