<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Exchange extends Model implements Searchable
{
    //
    protected $fillable = [
        'currency', 'user_id', 'exchange_rate',
    ];
    public $with = ['user','orders'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSearchResult(): SearchResult
    {
       $url = route('exchange.show', $this->id);
    
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->currency,
           $url
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
