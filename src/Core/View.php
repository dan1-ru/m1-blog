<?php
namespace Blog\Core;

class View
{	
    /**
     * Render template
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    function render(string $view, array $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }

        unset($data);

        $viewPath = 'src/Views/' . $view . '.php';

        include $viewPath;
    }
}