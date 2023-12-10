<?php

namespace App\Models;

class miedzlegnica extends DynamicModel
{
    protected $fillable = [
        'name',
        'positive',
        'negative',
        'url_logo',
    ];
}
