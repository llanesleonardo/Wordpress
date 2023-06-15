<?php
/**
 *  Comments Custom Page: custom-comments.php
 * 
 */
?>
<?php

$args =  array('status' => 'approve');

$comments_query = new WP_Comment_Query();
$comments = $comments_query->query($args);

if($comments){
        foreach ($comments as $comment) {
            echo"<p>".$comment->comment_content."</p>";
            echo"<p>".get_comment_author()."</p>";
            echo"<p>".get_comment_link()."</p>";
            echo"<p>".get_comment_date()."</p>";
            echo"<p>".get_comment_time()."</p>";
            echo"<p>".get_comment_text()."</p>";
        }
}else{
    echo "No comments found.";
} ?>