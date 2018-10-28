<?php

namespace Blog\Controllers;

use Blog\Models\PostsMapper;
use Blog\Core\View; 

class PostsController {

    public function __construct() 
    {
        $this->postsMapper = new PostsMapper;
    }

    /**
     * Posts List 
     *
     * @return void
     */
    public function actionIndex()
    {
        $posts = $this->postsMapper->all();
        
        View::render('posts/index', compact('posts'));
    }

    /**
     * Post creating form
     *
     * @return void
     */
    public function actionCreate() 
    {
        View::render('posts/create');
    }

    /**
     * Post editing form
     *
     * @param integer $id
     * @return void
     */
    public function actionEdit(int $id) 
    {
        $post = $this->postsMapper->find($id);
   
        View::render('posts/edit', compact('post'));
    }

    /**
     * Post updating handle
     *
     * @param integer $id
     * @return void
     */
    public function actionUpdate(int $id) 
    {
        $post = $this->postsMapper->find($id);

        if(!$post) {
            throw new \Exception('Post not found');
        }

        $post = array_replace($post, $_POST);

        if(isset($_FILES['image'])) {
            $filename = $_FILES['image']['name'];
            $destpath = UPLOAD_PATH . $filename;
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $destpath)) {
                $post['image'] = $filename;
            }
        }
        
        $this->postsMapper->update($id, $post);
    }

    /** 
     * Post storing handle
     */
    public function actionStore() 
    {
        $post = $_POST;

        if(isset($_FILES['image'])) {
            $filename = $_FILES['image']['name'];
            $destpath = UPLOAD_PATH . $filename;
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $destpath)) {
                $post['image'] = $filename;
            }
        } else {
            $post['image'] = null;
        }
        
        $this->postsMapper->store($post);
    }

    /**
     * Show the specified post
     *
     * @param integer $id (post id)
     * @return void
     */
    function actionShow(int $id) 
    {    
        $post = $this->postsMapper->find($id);

        if(!$post) {
            throw new \Exception('Post not found');
        }

        View::render('posts/show', compact('post'));
    }

    /**
     * Destroy (delete) the specified post
     *
     * @param integer $id (post id)
     * @return void
     */
    function actionDestroy(int $id) 
    {
        /**
         * @TODO: fix that
         */
        if($this->postsMapper->destroy($id)) {
            echo "Пост успешно удален";
        } else {
            echo "Не удалось удалить пост";
        }
    }
}