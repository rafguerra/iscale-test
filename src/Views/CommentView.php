<?php

namespace Views;

class CommentView
{
    public function renderComments(array $commentsList)
    {
        foreach ($commentsList as $comment) {
            echo "############ NEWS " . $comment['id'] . " ############\n";
            echo $comment['body'] . "\n";
        }
    }
}
