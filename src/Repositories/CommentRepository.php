<?php

namespace Repositories;

use Models\DB;

class CommentRepository extends DB
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * List all comments
     *
     * @return array
     */
    public function listComments(): array
    {
        return $this->db->select('SELECT * FROM `comment`');
    }
    
	/**
     * Add a comment for news
     *
     * @param string $body
     * @param int $newsId
     * @return int The ID of the newly inserted comment
     */
    public function addCommentForNews(string $body, int $newsId): int
    {
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES(:body, :created_at, :news_id)";
        $params = [
            ':body' => $body,
            ':created_at' => date('Y-m-d'),
            ':news_id' => $newsId,
        ];

        return $this->db->executeStatement($sql, $params);
    }

    /**
     * Delete a comment by ID
     *
     * @param int $id
     * @return int The number of affected rows
     */
    public function deleteComment(int $id): int
    {
        $sql = "DELETE FROM `comment` WHERE `id` = :id";
        $params = [':id' => $id];

        return $this->db->executeStatement($sql, $params);
    }

	/**
     * Delete a comment by NEWS ID
     *
     * @param int $news_id
     * @return int The number of affected rows
     */
    public function deleteCommentsByNewsId(int $news_id): int
    {
        $sql = "DELETE FROM `comment` WHERE `news_id` = :news_id";
        $params = [':news_id' => $news_id];

        return $this->db->executeStatement($sql, $params);
    }
}


