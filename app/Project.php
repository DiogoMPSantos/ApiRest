<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    //

    use Notifiable;

    protected $table  = "projects";

    protected $fillable = [
        'name'
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
