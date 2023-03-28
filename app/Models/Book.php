<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function tables() {
        return $this->hasOne(Table::class);
    }

    public function users() {
        return $this->hasOne(User::class);
    }

    public function bottles() {
        return $this->belongsToMany(Bottle::class)->withTimestamps()->withPivot('amount');
    }
}
