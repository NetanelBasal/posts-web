<?php

class CommentController extends BaseController {

    public function addComment() {
        $comment = new Comment;
        $comment->body = Input::get('body');
        $comment->user_id = Input::get('user_id');
        $comment->post_id = Input::get('post_id');
        $comment->save();

        return Redirect::to('/')->with('message', 'התגובה נשמרה בהצלחה!');
    }


}