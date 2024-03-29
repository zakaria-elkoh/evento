<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['statu'];

    public $table = "event_user";
    
    public function event() {
        return $this->belongsTo(Event::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}
