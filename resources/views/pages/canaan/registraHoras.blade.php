@extends('layouts.default')
@section('content')

<h2>Lista de Funcionarios</h2>    
    <div class="container-CF">
        <form class="form-CF" action="/gravarHoras" method="POST">
            @csrf
            <!-- 
                Operador ternario
                isset($idUser)?$idUser:null
            if (existe a variavel $idUser// isset($idUser)){
                ? => $idUser
            }eslse{
               : => null/""
            }
            
            -->
            <input type="hidden" name="idUser" id="idUser" value="{{isset($idUser)?$idUser:null}}">
            <div>        
                 
                <select name="data" id="data" > 
                    <?php

                        date_default_timezone_set("America/Sao_Paulo");

                        $dataAtual = date("d-m-y");
                    
                        // Definindo o intervalo de datas
                        $inicio = strtotime("01-01-2024");
                        $fim = strtotime("31-12-2100");
                    
                        // Loop para gerar as opções de datas
                        for ($i = $inicio; $i <= $fim; $i = strtotime("+1 day", $i)) {
                            $data = date("d-m-y", $i);
                            if ($data == $dataAtual) {
                                echo "<option value=\"$data\" selected>$data</option>";
                            } else {
                                echo "<option value=\"$data\">$data</option>";
                            }
                        }
                    ?>
                </select>
            <input type="hidden" name="data" id="data" value="{{$dataAtual}}">

            </div>
            <!--Entrada-->
            <div>
                <label class="form-label-CF for=">Entrada</label>
                
                <input type="text" placeholder="Entrada." name="entrada"  maxlength="5" oninput="formatarHora(this)" value="{{isset($regPontoDataAtual->entrada)?$regPontoDataAtual->entrada:''}}"> 
            </div>
            <!--Saída intervalo-->
            <div>
                <label class="form-label-CF for=">Saída intervalo</label>
                
                <input type="text" placeholder="Saída intervalo." name="saida_intervalo"  maxlength="5" oninput="formatarHora(this)" value="{{isset($regPontoDataAtual->saida_intervalo)?$regPontoDataAtual->saida_intervalo:''}}"> 
            </div>
            <!--Retorno intervalo-->
            <div>
                <label class="form-label-CF for=">Retorno intervalo</label>
                
                <input type="text" placeholder="Retorno intervalo." name="retorno_intervalo"  maxlength="5" oninput="formatarHora(this)" value="{{isset($regPontoDataAtual->retorno_intervalo)?$regPontoDataAtual->retorno_intervalo:''}}"> 
            </div>
            <div>
                <!--Saída-->
                <label class="form-label-CF for=">Sáida</label>
                
                <input type="text" placeholder="Saida." name="saida"  maxlength="5" oninput="formatarHora(this)" value="{{isset($regPontoDataAtual->saida)?$regPontoDataAtual->saida:''}}"> 
            </div>
        
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        </form>


    



<script>
    function formatarHora(input) {
        let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (valor.length > 2) {
            valor = valor.slice(0, 2) + ':' + valor.slice(2, 4);
        }
        input.value = valor;
    }
</script>











@endsection