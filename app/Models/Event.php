<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'price', 'location', 'duration', 'total_places', 'category_id', 'user_id'];
    
    public function user() {
        $this->belongsTo(User::class);
    }
    
    public function category() {
        $this->belongsTo(Category::class);
    }
}