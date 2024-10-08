<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'division',
        'description',
        'slug',
        'created_by',
        'image',
    ];

    // many to one relationship
    public function users()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'topic_id');
    }
}
