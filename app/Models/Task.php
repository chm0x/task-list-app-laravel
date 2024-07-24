<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description'];
    
    # It is the opposite of "fillable". 
    protected $guarded = ['password', 'secret'];

    // public function getRouteKeyName(){
    //     return 'slug';
    // }    
}
