<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;

class Admin extends Authenticatable implements ShouldQueue
{
    use Notifiable;

    protected $guard = 'admin';

    protected $guarded = [];
   
}
