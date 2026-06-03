<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Dog;
use App\Models\Strawberry;
use App\Models\Welcomes;
use App\Models\Welcome2;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        ob_start();

        $x = 757;
        $y = 757;
        $z = $x + $y;
        $w = true;
        $newline = "<br>";
        $cars = array("Volvo", "BMW", "Toyota");
        // var_dump($z);
        $this->math(10, 20);
        echo $z . ' ' . $x . ' ' . $y . $newline . $w
            . $newline . ' ' . $cars[0] . ' ' . $cars[1] . ' ' . $cars[2];
        $this->newline();
        echo $this->myFamily("Khweis", "Amro", "Mohammad", "Adam");
        $this->newline();
        echo $this->addNumbers(10, 20);
        $this->newline();
        echo $this->addNumbers(10.5, 20.5);

        return response(ob_get_clean());
    }

    public function hello()
    {
        ob_start();

        $this->details("Amro", 24, "Jerusalem");
        $this->newline();
        $this->myMessage();
        $this->newline();
        $strawberry = new Strawberry("Strawberry", "red");
        $strawberry->intro();
        $strawberry->message();
        $this->newline();
        $num = 2;
        $this->add_five($num);
        echo $num;
        $this->newline();
        echo $this->sumMyNumbers(1, 2, 3, 4, 5);
        $this->newline();
        $dog = new Dog();
        echo "Dog says: ";
        $dog->makeSound();
        $this->newline();
        echo "Dog sleeps: ";
        $dog->sleep();
        $cat = new Cat();
        $this->newline();
        echo "Cat says: ";
        $cat->makeSound();
        $this->newline();
        echo "Cat sleeps: ";
        $cat->sleep();

        return response(ob_get_clean());
    }

    public function showWelcomeForm()
    {
        return view('welcome');
    }

    public function submitWelcomeForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|min:1',
        ]);

        return redirect('/');
    }

    public function traits()
    {
        ob_start();

        echo "Hello traits";

        $this->newline();

        $obj = new Welcomes();
        $obj2 = new Welcome2();

        $obj->msg1();
        $this->newline();
        $obj->msg2();
        $this->newline();
        $obj->msg3();
        $this->newline();
        $obj2->msg1();
        $this->newline();
        $obj2->msg2();
        $this->newline();
        $obj2->msg3();

        return response(ob_get_clean());
    }

    public function user($id)
    {
        return "User ID is: " . $id;
    }

    private function add_five(&$value)
    {
        $value += 5;
    }

    private function sumMyNumbers(...$x)
    {
        $n = 0;
        $len = count($x);
        for ($i = 0; $i < $len; $i++) {
            $n += $x[$i];
        }

        return $n;
    }

    private function myFamily($lastname, ...$firstname)
    {
        $txt = "";
        $len = count($firstname);
        for ($i = 0; $i < $len; $i++) {
            $txt = $txt . "Hi, $firstname[$i] $lastname.<br>";
        }

        return $txt;
    }

    private function addNumbers(float $a, float $b)
    {
        return $a + $b;
    }

    private function math($x, $y)
    {
        $z = $x + $y;
        echo $z;
    }

    private function myMessage()
    {
        echo "Hello world6789!";
    }

    private function newline()
    {
        echo "<br>";
    }

    private function details($name, $year, $city)
    {
        echo "My name is " . $name . " and I am " . $year . " years old and I live in " . $city;
    }
}
