<?php

namespace Repositories;

use Models\DB;
use Models\News;
use Models\Comment;

class NewsRepository extends DB
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * List all news
     *
     * @return array
     */
    public function listNews(): array
    {
        return $this->db->select('SELECT * FROM `news`');
    }
    
    /**
     * List all News with comments
     *
     * @return array
     */
    public function listNewsWithComments(): array
    {
        $newsList = [];

        $result = $this->db->select('
            SELECT news.id as news_id, news.title, news.body, comment.id as comment_id, comment.body as comment_text
            FROM news
            LEFT JOIN comment ON news.id = comment.news_id
            ORDER BY news.id, comment.id
        ');

        foreach ($result as $row) {
            $newsId = $row['news_id'];
            if (!isset($newsList[$newsId])) {
                $newsList[$newsId] = new News($newsId, $row['title'], $row['body']);
            }

            $comment = new Comment($row['comment_id'], $newsId, $row['comment_text']);
            $newsList[$newsId]->addComment($comment);
        }

        return array_values($newsList);
    }

    /**
     * Add a record in the news table
     *
     * @param string $title
     * @param string $body
     * @return int The ID of the newly inserted news
     */
    public function addNews(string $title, string $body): int
    {
        $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES(:title, :body, :created_at)";
        $params = [
            ':title' => $title,
            ':body' => $body,
            ':created_at' => date('Y-m-d'),
        ];
    
        return $this->db->executeStatement($sql, $params);
    }

    /**
     * Deletes a news and its linked comments
     *
     * @param int $id
     * @return int The number of affected rows
     */
    public function deleteNews(int $id): int
    {
        $commentRepository = new CommentRepository($this->db);
        $commentRepository->deleteCommentsByNewsId($id);

        $sql = "DELETE FROM `news` WHERE `id` = :id";
        $params = [':id' => $id];

        return $this->db->executeStatement($sql, $params);
    }
}
