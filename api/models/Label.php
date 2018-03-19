<?php
/**
 * Created by IntelliJ IDEA.
 * User: sai
 * Date: 18.03.18
 * Time: 14:43
 */

use Illuminate\Database\Eloquent\Model;
class Label extends Model{
    protected $fillable = ['name'];
    protected $table= 'Labels';
    public $timestamps = false;
    public function books(){
        return $this->belongsToMany('Book');
    }

}