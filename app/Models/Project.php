<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function getAbstract($max = 50) {
        return substr($this->description, 0, $max) . '...';
    }

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
    ];

    public function getImageThumb() {
        if (strpos($this->thumbnail, 'http') === 0) {
            return $this->thumbnail;
        } else {
            return asset('storage/' . $this->thumbnail);
        }
    }
}
