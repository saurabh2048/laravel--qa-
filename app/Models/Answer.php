<?php

namespace App\Models;

use Parsedown;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getBodyHtmlAttribute()
    {
        return Parsedown::instance()->line($this->body);
    }
    // public static function boot()
    // {
    //     parent::boot();
    //     Question::created(function($answer){
    //         $answer->question->increment('answers_count');
    //         $answer->question->save();
    //     });        
    // }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    
}
