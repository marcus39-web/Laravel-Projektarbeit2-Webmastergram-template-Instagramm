<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Die Attribute, die massenweise zuweisbar sind.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'image',
        'content',
        'title',
    ];

    /**
     * Gibt den Benutzer zurück, dem der Post gehört.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
}