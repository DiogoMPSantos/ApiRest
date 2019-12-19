<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    //

    use Notifiable;

    protected $fillable = [
        'name', 'description','project_id','user_id','status_id','deadline'
    ];

    public function status(){
      return  $this->belongsTo(Status::class);
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
