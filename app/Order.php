<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exchange()
    {
        return $this->belongsTo(Exchange::class, 'id','exchange_id');
    }

    
}
