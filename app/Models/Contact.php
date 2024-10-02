<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Contact extends Model
{
    use AsSource, Filterable;

    protected $table = 'contact';
    protected $fillable = [
        'message',
        'name',
        'email',
        'phone',
        'status',
    ];

}
