<?php

class PostController extends BaseController {


    public function __construct() {
         $this->beforeFilter('auth', array('only'=>array('adminPanel')));
         //$this->beforeFilter('notactivate', array('on'=> 'get'));
    }



    public function getPosts() {
        //$posts = Post::orderBy('created_at', 'desc')->paginate(4);
        //  $posts = DB::select('SELECT posts.id, posts.title, posts.body, posts.user_id, posts.created_at, users.firstname
        // FROM posts, users
        // WHERE posts.user_id = users.id ORDER BY posts.created_at');
        $posts = DB::table('posts')->join('users', 'posts.user_id', '=' , 'users.id')->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at','users.firstname')->orderBy('created_at', 'desc')->paginate(4);
        return View::make('allposts')->with('posts', $posts);
    }

    public function getFullPost($id) {
        $post = Post::find($id);
        $comments = DB::select('SELECT comments.id, comments.body, comments.created_at, users.firstname
        FROM comments, posts, users
        WHERE comments.user_id = users.id AND comments.post_id = posts.id AND posts.id = ?', array($id));
        if(count($post) > 0) {
            return View::make('fullpost')->with('post', $post)->with('comments', $comments);
        }else {
            return Redirect::to('/');
        }
    }

    public function getCreate() {
        return View::make('createpost');
    }

    public function addPost() {
            $data = Input::all();
            $valid = Validator::make($data, Post::validRules(), Post::validMessages());
            if($valid->passes()) {
                $post = new Post;
                $post->title = Input::get('title');
                $post->body = Input::get('body');
                $post->user_id = Auth::user()->id;
                $post->category_id = Input::get('category');
                $post->save();
                return Redirect::to('/')->with('message', 'הפוסט נשמר בהצלחה!');
            }
            else {
                Input::flash();
               return Redirect::to('createpost')->withErrors($valid);
            }
    }

    public function getMyPosts() {
        $posts = Post::with('users')->where('user_id', Auth::user()->id)->paginate(3);
        return View::make('myposts')->with('posts', $posts);
    }

    public function deletePost($id) {
        $post = Post::find($id);
        if(count($post) > 0) {
                //DB::delete('delete from comments where post_id = ?', array($id));
                $post->delete();
                return Redirect::to('myposts')->with('message', 'הפוסט נמחק הצלחה');
        }else {
            return Redirect::to('/');
        }
    }

    public function getEditPost($id) {
        $post = Post::find($id);
        if(count($post) > 0) {
            return View::make('editpost')->with('post', $post);
        }else {
            Redirect::to('/');
        }
    }

    public function postEditPost() {
        $post = Post::find(Input::get('post_id'));
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->category_id = Input::get('category');
        $post->save();
        return Redirect::to('/')->with('message', 'הפוסט עודכן בהצלחה');
    }

    public function adminPanel() {
        $posts = DB::table('posts')->paginate(4);
        return View::make('adminpanel')->with('posts', $posts);
    }

    public function getSearchByCategories() {
        $category = Input::get('category');
       $results = DB::table('posts')->join('users', 'posts.user_id', '=' , 'users.id')->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at','users.firstname')->where('category_id', '=', $category)->orderBy('created_at', 'desc')->paginate(4);
        return View::make('results')->with('result', $results);
    }

    public function getSearchByKey() {
        $key = Input::get('search');
       $results = DB::table('posts')->join('users', 'posts.user_id', '=' , 'users.id')->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at','users.firstname')->where('posts.body', 'LIKE', '%' .  $key . '%' )->orderBy('created_at', 'desc')->paginate(4);
        return View::make('results')->with('result', $results);
    }


}