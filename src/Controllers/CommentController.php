<?php

use Views\CommentView;
use Repositories\CommentRepository;

class CommentController
{
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function listComments()
    {
        $comments = $this->commentRepository->listComments();
        $commentView = new CommentView();
        return $commentView->renderComments($comments);
    }
}
