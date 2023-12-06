<?php

namespace Views;

class NewsView
{
    public function renderNews(array $newsList)
    {
        foreach ($newsList as $news) {
            echo "############ NEWS " . $news['title'] . " ############\n";
            echo $news['body'] . "\n";
        }
    }

    public function renderNewsWithComments(array $newsListWithComments)
    {
        foreach ($newsListWithComments as $news) {
            echo "############ NEWS " . $news->getTitle() . " ############\n";
            echo $news->getBody() . "\n\n";

            foreach ($news->getComments() as $comment) {
                echo "Comment " . $comment->getId() . " : " . $comment->getBody() . "\n";
            }
        }
    }
}
