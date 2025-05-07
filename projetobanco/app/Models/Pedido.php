<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function itens(){
        return $this->hasMany(ItensPedido::class);
    }

}
