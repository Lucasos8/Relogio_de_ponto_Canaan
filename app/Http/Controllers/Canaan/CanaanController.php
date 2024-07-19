<?php

namespace App\Http\Controllers\Canaan;

use App\Http\Controllers\Controller;
use App\Models\Autorizacao_user;
use App\Models\Nivel_acesso;
use App\Models\User;
use Illuminate\Http\Request;

class CanaanController extends Controller
{
    public function index(){
    return view('pages.canaan.index');
    }

    public function listaFuncionarios(){
        return view('pages.canaan.listaFuncionarios');
    }

    public function acessaHoras(){
        return view('pages.canaan.acessaHoras');
    }  
    
    public function createNivelAcesso(){
        return view('pages.canaan.createNivelAcesso');
    }

    public function cadastroFuncionario(){
        $niveis_acessos=Nivel_acesso::all();
        return view('pages.canaan.cadastroFuncionario',["niveis_acessos"=>$niveis_acessos]);
        }    

    public function registraHoras(){
        return view('pages.canaan.registraHoras');
    }

    public function createNivelUser(Request $request) {
            $nivelAcesso = new Nivel_acesso();
            $nivelAcesso->nivel_user = $request->nivel_user;
       
       if($nivelAcesso->save()){
                
        return redirect('/createNivelAcesso')->with('success', 'Usuário cadastrado com sucesso!');
    }else{
        return redirect('/createNivelAcesso')->withErrors('Ocorreu um erro ao salvar o Usuário!');
     }
    }
    
     
    
public function saveFuncionario(Request $request) {
            if(isset($request->id)){
            $users = User::where('id', '=', $request->id)->update([
            "nome"=>$request->nome_user,
            "cpf"=>$request->cpf_user,
            "nascimento"=>$request->nascimento_user,
            "senha"=>$request->senha_user,
            "cargo"=>$request->cargo_user
        ]);
        $autorizacaoUser = Autorizacao_user::where('id','=', $request->id)->update([
        "nivel_acesso_id"=>$request->nivel_acesso_id
        ]);
        

            return redirect('/listaFuncionarios')->with('success', 'Usuário editado com sucesso!');
        }else{
            $users = new User();
            $users->nome = $request->nome_user;
            $users->cpf = $request->cpf_user;
            $users->nascimento = $request->nascimento_user;
            $users->senha = $request->senha_user;
            $users->cargo = $request->cargo_user;
            $users->save();
            $nivel = Nivel_acesso::where('id', '=', $request->nivel_acesso_id)->first();            
            $autorizacaoUser = new Autorizacao_user();
            $autorizacaoUser -> user_id = $users->id;
            $autorizacaoUser -> nivel_id = $nivel->id;
            $autorizacaoUser->save();
    }

        if($users->save()){
                
                return redirect('/listaFuncionarios')->with('success', 'Usuário cadastrado com sucesso!');
            }else{
                return redirect('/cadastroFuncionario')->withErrors('Ocorreu um erro ao salvar o Usuário!');
            }
        }
}