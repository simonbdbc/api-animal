<?php
namespace Controller;
use Helper\View as View;

class Dispatcher
{
    public function accueil($aURI)
    {
        // var_dump($aURI);die;
        $viewName = 'base';

        $view = new View();
        $view->renderView($viewName, 
        [
            "{{TITLE}}" => "My Home",
        ]);
    }

    public function single($aURI)
    {
        // var_dump($aURI);die;

        $view = new View();
        $view->renderView($aURI);
    }

    public function compose($aURI)
    {
        // var_dump($aURI);die;
        $viewName = $aURI;

        $view = new View();
        $view->renderView($viewName);
    }

    public function code404()
    {
        echo '<h2>Cette page est introuvable...</h2>';
    }
}
