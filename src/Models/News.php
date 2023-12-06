<?php

namespace Models;

class News
{
    private $id;
    private $title;
    private $body;
    private $comments = [];

    public function __construct($id, $title, $body)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setBody($body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setComments(array $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

    public function addComment(Comment $comment): void
    {
        $this->comments[] = $comment;
    }

    public function getComments(): array
    {
        return $this->comments;
    }
}
