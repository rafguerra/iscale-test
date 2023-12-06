<?php

namespace Models;

class Comment
{
    private $id;
    private $newsId;
    private $body;

    public function __construct($id, $newsId, $body)
    {
        $this->id = $id;
        $this->newsId = $newsId;
        $this->body = $body;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsId(): ?int
    {
        return $this->newsId;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }
}
