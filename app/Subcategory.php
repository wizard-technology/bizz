<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function admin()
    {
        return $this->belongsTo(User::class, 'st_admin');
    }
}
