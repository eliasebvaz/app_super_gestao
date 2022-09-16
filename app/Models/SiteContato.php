<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContato extends Model
{
    use HasFactory;
    protected $table = 'site_contatos';
    protected $fillable = ['nome', 'telefone', 'email', 'mensagem', 'motivo_contatos_id'];
}
