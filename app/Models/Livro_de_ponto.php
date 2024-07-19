<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro_de_ponto extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable = ['id', 'user_id', 'data', 'entrada', 'saida_intervalo', 'retorno_intervalo', 'saida', 'total_horas', 'horas_minimas', 'horas_extras','horas_devendo'];

}
