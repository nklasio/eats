<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $with = array('ingredients', 'steps');

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity', 'quantity_type');
    }

    public function steps(){
        return $this->hasMany(Step::class);
    }
}
