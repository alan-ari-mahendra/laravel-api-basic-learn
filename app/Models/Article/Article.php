<?php

namespace App\Models\Article;

use App\Models\User;
use App\Models\Article\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','body','subject_id'];


    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
