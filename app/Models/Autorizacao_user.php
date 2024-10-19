<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacao_user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'autorizacao_users';
    protected $primaryKey='id';
    protected $fillable = ['id', 'user_id', 'nivel_acesso_id'];

}
