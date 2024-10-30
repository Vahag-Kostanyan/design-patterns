<?php

// Define the Animal interface with a method for making sound
interface Animal
{
    public function makeSound();
}

// Implement the Dog class that adheres to the Animal interface
class Dog implements Animal
{
    // Provide implementation for makeSound specific to Dog
    public function makeSound()
    {
        return 'Woof!';
    }
}

// Implement the Cat class that adheres to the Animal interface
class Cat implements Animal
{
    // Provide implementation for makeSound specific to Cat
    public function makeSound()
    {
        return 'Meow';
    }
}

// Abstract factory class for creating animals
abstract class AnimalFactory
{
    // Define an abstract method for creating animals
    abstract public function createAnimal(): Animal;
}

// Concrete factory class for creating Dog instances
class DogFactory extends AnimalFactory
{
    // Implement the createAnimal method to return a Dog instance
    public function createAnimal(): Animal
    {
        return new Dog();
    }
}

// Concrete factory class for creating Cat instances
class CatFactory extends AnimalFactory
{
    // Implement the createAnimal method to return a Cat instance
    public function createAnimal(): Animal
    {
        return new Cat();
    }
}

// Client function that uses the factory to create an animal and make it sound
function clientCode($factory)
{
    $animal = $factory->createAnimal(); // Use factory to create an animal
    echo $animal->makeSound(); // Call makeSound on the created animal
}

// Create a DogFactory and use it in the client code
$dogFactory = new DogFactory();
clientCode($dogFactory); // Output: Woof!

echo PHP_EOL; // Print a new line

// Create a CatFactory and use it in the client code
$catFactory = new CatFactory();
clientCode($catFactory); // Output: Meow