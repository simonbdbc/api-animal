<?php
namespace Controller;
use Helper\View as View;

class Dispatcher
{
    public function accueil($aURI)
    {
        // var_dump($aURI);die;
        $viewName = 'home';

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
        $view->renderView($aURI, 
        [
            "{{TITLE}}" => $aURI[0],
        ]);
    }

    public function compose($aURI)
    {
        // var_dump($aURI);die;
        $viewName = $aURI;

        $view = new View();
        $view->renderView($viewName, 
        [
            "{{TITLE}}" => $aURI[0],
        ]);
    }

    public function code404()
    {
        echo '<h2>Cette page est introuvable...</h2>';
    }
}
