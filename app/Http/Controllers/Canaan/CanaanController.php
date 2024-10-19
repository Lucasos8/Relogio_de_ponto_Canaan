<?php

namespace App\Http\Controllers\Canaan;

use App\Http\Controllers\Controller;
use App\Models\Autorizacao_user;
use App\Models\Livro_de_ponto;
use App\Models\Nivel_acesso;
use App\Models\User;
use Faker\Test\Provider\UserAgentTest;
use Illuminate\Http\Request;

class CanaanController extends Controller{
    public function index(){
    return view('pages.canaan.index');
    }

    public function listaFuncionarios(){
        $users = user::all();
        return view('pages.canaan.listaFuncionarios', ['users'=>$users]);
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

    public function registraHoras($idUser){
        date_default_timezone_set("America/Sao_Paulo");
        $regPontoDataAtual = Livro_de_ponto::where("user_id", "=", $idUser)->where("data", "=", date("d-m-y"))->first();        
        return view('pages.canaan.registraHoras', ["idUser"=>$idUser, "regPontoDataAtual" => $regPontoDataAtual]);
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
            $nivel = Nivel_acesso::where('id', '=', $request->nivel_acesso_select)->first();
            $autorizacaoUser = new Autorizacao_user();
            $autorizacaoUser -> user_id = $users->id;
            $autorizacaoUser -> nivel_acesso_id = $nivel->id;
            $autorizacaoUser->save();
    }

        if($users->save()){
                
                return redirect('/listaFuncionarios')->with('success', 'Usuário cadastrado com sucesso!');
            }else{
                return redirect('/cadastroFuncionario')->withErrors('Ocorreu um erro ao salvar o Usuário!');
            }
        }

        public function edit(Request $request){   
            $id = $request->id;
            $user = User::where('id', '=', $id)->first();
            $niveis_acessos=Nivel_acesso::all();

            return view('pages.canaan.cadastroFuncionario', ['user' => $user, "niveis_acessos"=>$niveis_acessos]);
    
        }

        public function guardarHoras(Request $request) {                 
            if(isset($request->idUser) && isset($request->data) ){
                $entrada = "";
                $saida_intervalo = "";
                $retorno_intervalo = "";
                $saida = "";
                if($request->entrada != null){
                    $entrada = $request->entrada;
                }
                if($request->saida_intervalo != null){
                    $saida_intervalo = $request->saida_intervalo;
                }
                if($request->retorno_intervalo != null){
                    $retorno_intervalo = $request->retorno_intervalo;
                }
                if($request->saida != null){
                    $saida = $request->saida;
                }
                $livro_de_ponto = Livro_de_ponto::where('user_id', '=', $request->idUser)
                                                ->where('data', '=', $request->data)
                                                ->update([
                "entrada"=>$entrada,
                "saida_intervalo"=>$saida_intervalo,
                "retorno_intervalo"=>$retorno_intervalo,
                "saida"=>$saida
            ]);
         
                return redirect('/listaFuncionarios')->with('success', 'Hora adicionda com sucesso!');
            }else{
                $livro_de_ponto = new livro_de_ponto();
                $livro_de_ponto->user_id = $request->idUser;
                $livro_de_ponto->data = $request->data;
                $livro_de_ponto->entrada = $request->entrada;
                $livro_de_ponto->saida_intervalo = $request->saida_intervalo;
                $livro_de_ponto->retorno_intervalo = $request->retorno_intervalo;
                $livro_de_ponto->saida = $request->saida;
                $livro_de_ponto->total_horas = 0;
                $livro_de_ponto->horas_minimas = 0;
                $livro_de_ponto->horas_extras = 0;
                $livro_de_ponto->horas_devendo = 0;
                $livro_de_ponto->save();
               
    
            if($livro_de_ponto->save()){
                    
                    return redirect('/listaFuncionarios')->with('success', 'Horas adicionda com sucesso!');
                }else{
                    return redirect('/registraHoras')->withErrors('Ocorreu um erro ao adicionda as horas!');
                }
            }

        }
        

public function sistemaLogin (Request $request){
    $user = User::where('cpf', '=', $request->cpf)->where('senha', '=', $request->senha)->get();
    if(isset($user)){
        return redirect('/listaFuncionarios');

    }


}





//<input type="hidden" name="idUser" id="idUser" value="{{$idUser}}">




        	//utilizar somente em caso de correções.//
       // public function delete(Request $request){
       //     $id = $request->id;
       //     User::destroy($id);
       //     Autorizacao_user::destroy($id);
       //     Nivel_acesso::destroy($id); conferir esse.
       //       return redirect('/listaFuncionarios')->with('success', 'Usuário Deletado com sucesso!');
       //}

}