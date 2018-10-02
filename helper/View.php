<?php
namespace Helper;
use Helper\Animal as Animal;

class View
{
    private $viewDirectory = "view/";
    
    private function loadView($aURI, $type = 'view')
    {
        switch ($type) {
            case 'view':
                // $viewPath = $this->viewDirectory . $viewName . ".html";
                $mAnimal = new Animal;
                $animal = $mAnimal->chooseModel($aURI[0]);
                $viewPath = '';
                if(is_array($aURI)){
                    array_key_exists(1,$aURI) ? $nbr = intval($aURI[1]) : $nbr = 1;
                    $nbr > 10 ? $nbr = 10 : '';
                    for ($i=0; $i < $nbr; $i++) { 
                        $file = $animal->file;
                        $imgHTML = '<img src="'.$animal->get()->$file.'" style="max-width:250px">';
                        $viewPath .= $imgHTML;
                        // var_dump($animal->get()->file);die;
                    }
                } else {
                    $viewPath = $this->viewDirectory.$aURI.".html"; 
                }
                
                break;
            case 'template':
                $viewPath = $this->viewDirectory ."layout/".$aURI.".html";                
                break;
        }
        // var_dump($viewPath);


        if (file_exists($viewPath)) {
            return file_get_contents($viewPath);
        } else {
            return $viewPath;
        }

    }

    public function renderView($aURI, Array $values = [])
    {
        // var_dump($sHtml);die;
        $template = $this->loadView('base', 'template');
        $content = $this->loadView($aURI);
        $sHtml = str_replace("{{CONTENT}}", $content, $template);
        $sHtml = str_replace("{{MENU}}", $this->loadView('menu', 'template'), $sHtml);
        foreach ($values as $key => $value) {
            $sHtml = str_replace($key, $value, $sHtml);
        }
        echo $sHtml;
    }
}
