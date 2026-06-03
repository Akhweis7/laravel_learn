<?php

namespace App\Models;

class Cat implements Animal
{
    public function makeSound()
    {
        echo "Meow";
    }

    public function sleep()
    {
        echo "Momomo";
    }
}
