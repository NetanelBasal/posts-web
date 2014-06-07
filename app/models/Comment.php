<?php

class Comment extends Eloquent {
    protected $fillable = array('body');

    public function posts() {
        return $this->belongsTo('Post');
    }
}