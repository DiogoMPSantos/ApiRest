<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Status extends Model
{
    //
    use Notifiable;
    public $table = 'status'; 

    protected $fillable = [
        'name', 'description'
    ];

    public function activities(){

        return $this->hasOne(Activity::class);
    }
}
