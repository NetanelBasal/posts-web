<?php

class AdminController extends BaseController {
    public function deletePost() {
        $post_id = Input::get('post_id');

        //DB::delete('delete from posts where id = ?', array($post_id));
        $post = Post::find($post_id);
        $post->delete();
        return Redirect::to('/')->with('message', 'הפוסט נמחק בהצלחה');
    }
}