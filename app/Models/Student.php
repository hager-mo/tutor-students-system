<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens; 

class Student extends Model
{
    use HasApiTokens, HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'age', 'IDno', 'user_id'];
    use SoftDeletes;

    public function User(){
        return $this->belongsTo(User::class);
    }
}
