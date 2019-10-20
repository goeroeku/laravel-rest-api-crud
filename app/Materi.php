<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class Materi extends Model
{
    use UuidTrait;
    protected $fillable = [
        'thumbnail', 'title', 'content',
    ];
}
