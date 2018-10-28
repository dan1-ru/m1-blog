<?php
namespace Blog\Models;

use Blog\Core\DataMapper;

/**
 * Class for describe actions with Post
 */
class PostsMapper extends DataMapper {

    /**
     * Get all posts
     *
     * @return array
     */
    function all(): array
    {
        $query = self::$db->query("
            SELECT 
                * 
            FROM 
                posts 
            ORDER BY 
                updated_at DESC
        ");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        
        return $query->fetchAll();
    }

    /**
     * Find post by id
     *
     * @param integer $id
     * @return array
     */
    function find(int $id) 
    {
        $query = self::$db->prepare("
            SELECT 
                * 
            FROM 
                posts 
            WHERE 
                id = :id
        ");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        
        return $query->fetch();
    }

    /**
     * Update post
     *
     * @param integer $id
     * @param array $post
     * @return boolean
     */
    function update(int $id, array $post): bool
    {
        $query = self::$db->prepare("
            UPDATE
                posts
            SET
                title = :title,
                text = :text,
                image = :image,
                updated_at = current_timestamp
            WHERE
                id = :id
        ");
        
        $query->bindParam(':title', $post['title']);
        $query->bindParam(':text', $post['text']);
        $query->bindParam(':image', $post['image']);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * Store post
     *
     * @param array $post
     * @return void
     */
    function store(array $post) 
    {
        $query = self::$db->prepare("
            INSERT INTO
                posts
            VALUES 
                (null, :title, :text, :image, current_timestamp)
        ");

        $query->bindParam(':title', $post['title']);
        $query->bindParam(':text', $post['text']);
        $query->bindParam(':image', $post['image']);

        return $query->execute();
    }

    /**
     * Destroy (delete) the specified post
     *
     * @param integer $id
     * @return bool
     */
    function destroy(int $id): bool 
    {
        $query = self::$db->prepare("DELETE FROM posts WHERE id = :id");
        $query->bindParam(':id', $id);
        
        return $query->execute();
    }
}