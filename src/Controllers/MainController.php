<?php

namespace Blog\Controllers;

use Blog\Core\View; 

class MainController {
    
    /**
     * Main (index) page
     *
     * @return void
     */
    public function actionIndex() 
    {
        View::render('main/index');
    }

}