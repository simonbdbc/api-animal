<?php
namespace Model;

class Cat extends Model
{
    public $url = 'https://aws.random.cat/meow';
    public $file = 'file';
    function __construct__()
    {
        parent::__construct();
    }
}
