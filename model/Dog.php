<?php
namespace Model;

class Dog extends Model
{
    public $url = 'https://random.dog/woof.json';
    public $file = 'url';
    function __construct__()
    {
        parent::__construct();
    }
}