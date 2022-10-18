<?php
namespace app\controllers;

class Comment extends \app\core\Controller{

    #[\app\filters\Login]
	#[\app\filters\Profile]
    public function edit(){

        $comment_id = intval($_GET['comment_id']);
        if(!isset($comment_id)){
            header('location:'.URLROOT.'Main/index?error=Comment not found.');
	
        }else{
            if(isset($_POST['action'])){
                if(isset($_POST['deleteComment'])){
                    $comment = new \app\models\Comment();
                    $comment->comment_id = $_POST['deleteComment'];
                    $comment->delete();
                        header('location:'.URLROOT.'Main/index');
                }
                else{
						$profile = new \app\models\Profile();
						$profile = $profile->get( $_SESSION["user_id"]);
						$comment = new \app\models\Comment();
                        $comment = $comment->get($comment_id);
						$comment->comment_id = $comment_id;
						$comment->comment = $_POST['comment'];
						$comment->date_time = (new \DateTime())->format('Y-m-d H:i:s');
						$comment->update();
						
                    header('location:'.URLROOT.'Post/index/?publication_id='.$comment->publication_id.'?message=Success, your post was edited.');
                }
            }
            else{
            $data = $comment_id;
			$this->view('Comment/edit',$data);}
	    }
	
    }
}