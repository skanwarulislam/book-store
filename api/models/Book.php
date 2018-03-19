<?php

class Book extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['isbn', 'title', 'addedon'];
    protected $table= 'Books';
    public $timestamps = false;
    public function labels(){
        return $this->belongsToMany('Label');
    }
}

