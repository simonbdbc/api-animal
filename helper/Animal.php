<?php
namespace Helper;
use Model\Cat as Cat;
use Model\Dog as Dog;
use Model\Fox as Fox;

class Animal
{
    private $directory = 'model/';
    
    public function chooseModel($animal)
    {
        $mAnimal = '';
        switch ($animal) {
            case 'chat':
                $mAnimal = new Cat;
                break;

            case 'chien':
                $mAnimal = new Dog;
                break;
            
            case 'renard':
                $mAnimal = new Fox;
                break;
            
            default:
                echo $animal.' n\'est pas disponible.';die;
                break;
        }

        return $mAnimal;
    }
    
}
