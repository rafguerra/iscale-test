<?php

namespace Controllers;

use Views\NewsView;
use Repositories\NewsRepository;

class NewsController
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function listNews()
    {
        $news = $this->newsRepository->listNews();
        $newsView = new NewsView();
        return $newsView->renderNews($news);
    }

    public function listNewsWithComments()
    {
        $news = $this->newsRepository->listNewsWithComments();
        $newsView = new NewsView();
        return $newsView->renderNewsWithComments($news);
    }

    public function addNews($title, $body)
    {
        return $this->newsRepository->addNews($title, $body);
    }
}
