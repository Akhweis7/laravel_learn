<?php

namespace App\Models;

class Dog implements Animal
{
    public function makeSound()
    {
        echo "Woof";
    }

    public function sleep()
    {
        echo "Zzz";
    }
}
