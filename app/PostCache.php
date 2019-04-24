<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use App\Events\PostCreated;

class PostCache extends Model
{
    protected $guarded = [];
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
}
