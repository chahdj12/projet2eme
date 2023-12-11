<?php

class Commentaire {
    private $id = null;
    private $user_id = null;
    private $blog_id  = null;
    private $comment_text = null;
    private $created_at = null;
    private $likes = null;

    function __construct($user_id, $blog_id, $comment_text, $created_at, $likes){
        $this->user_id = $user_id;
        $this->blog_id = $blog_id;
        $this->comment_text = $comment_text;
        $this->created_at = $created_at;
        $this->likes = $likes;
    }

    
    public function getUserId(){
        return $this->user_id;
    }
    public function getBlogId(){
        return $this->blog_id;
    }
    public function getCommentText(){
        return $this->comment_text;
    }
    public function getCreatedAt(){
        return $this->created_at;
    }
    public function getLikes(){
        return $this->likes;
    }
    public function getID(){
        return $this->id;
    }
}
