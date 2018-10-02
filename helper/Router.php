<?php
namespace Helper;
use Controller\Dispatcher as Dispatcher;

class Router
{
    private function trimUri($uri)
    {
        $uri = substr($uri, 1);
        // var_dump($uri);
        $aURI = [];
        if($uri != ''){
            $aURI = explode('/', $uri);
        }
        // var_dump($aURI);

        return $aURI;
    }

    public function route()
    {

        // var_dump($_SERVER['REQUEST_URI']);
        
        $aURI = $this->trimUri($_SERVER['REQUEST_URI']);
        // var_dump(count($aURI));
        
        $dispatcher = new Dispatcher();
        $ind = 'accueil';

        switch (count($aURI)) {
            case '0':
                $ind = 'accueil';
                break;
            case '1':
                $ind = 'single';
                break;
            case '2':
                $ind = 'compose';                
                break;
            default:
                $aURI = array_slice($aURI, 0, 2);
                $ind = 'compose';
                break;
        }

        if(method_exists($dispatcher,$ind))
        {
            $dispatcher->$ind($aURI);
        } else {
            $dispatcher->code404();
        }       
        
        // var_dump($uri);
    }
}
