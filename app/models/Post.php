<?php

class Post extends Eloquent {
    protected $fillable = array('title', 'body', 'user_id', 'category_id');


    public function users() {
        return $this->belongsTo('User');
    }

    public function comments() {
        return $this->hasMany('Comment');
    }


    public static function validRules() {
        $rules = array(
            'title' => array('required', 'min:4'),
            'body' => array('required', 'min:20')
            );
        return $rules;
    }

    public static function validMessages() {

        $messages = array(
            'required' => 'שדה זה חובה',
            'body.min' => 'מינימום 20 תווים',
            'title.min' => 'מינימום 4 תווים'


            );

        return $messages;
    }
}