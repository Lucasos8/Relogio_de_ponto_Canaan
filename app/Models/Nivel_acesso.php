<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_acesso extends Model
{
    public $timestamps = false;
    protected $table = 'nivel_acesso';
    protected $primaryKey='id';
    protected $fillable = ['id', 'nivel_user'];

}
