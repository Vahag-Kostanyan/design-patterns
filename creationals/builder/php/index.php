<?php

/**
 * This class represents a Car object that can have various configurations
 * such as engine type, number of seats, and whether it has GPS.
 */
class Car
{
    public ?string $engine;
    public ?int $seats;
    public ?bool $gps;

    /**
     * Display the car's specifications in a readable format.
     */
    public function showSpecifications(): void
    {
        echo "Engine: $this->engine";
        echo "Seats: $this->seats";
        echo "GPS: $this->gps";
        echo "\n";
    }
}

/**
 * CarBuilderInterface defines the methods that any Car builder must implement.
 * It provides a blueprint for creating different parts of the car (engine, seats, GPS).
 */
interface CarBuilderInterface
{
    public function setEngine(string $engine): CarBuilderInterface;
    public function setSeats(int $seats): CarBuilderInterface;
    public function setGPS(bool $gps): CarBuilderInterface;
    public function getCare(): Car;
}

/**
 * CarBuilder is the concrete implementation of CarBuilderInterface.
 * It builds a Car object step by step by setting its engine, seats, and GPS.
 */
class CarBuilder implements CarBuilderInterface
{
    private Car $car;

    public function __construct() {
        $this->car = new Car();
    }

    /**
     * Set the car's engine and return the builder for method chaining.
     */
    public function setEngine(string $engine): CarBuilderInterface
    {
        $this->car->engine = $engine;
        return $this;
    }

    /**
     * Set the number of seats and return the builder for method chaining.
     */
    public function setSeats(int $seats): CarBuilderInterface
    {
        $this->car->seats = $seats;
        return $this;
    }

    /**
     * Set whether the car has GPS and return the builder for method chaining.
     */
    public function setGPS(bool $gps): CarBuilderInterface
    {
        $this->car->gps = $gps;
        return $this;
    }

    /**
     * Return the fully constructed Car object.
     */
    public function getCare(): Car
    {
        return $this->car;
    }
}

/**
 * CarEngineer is responsible for orchestrating the construction of different types of cars.
 * It uses the builder to create specific configurations of cars like sports cars or family cars.
 */
class CarEngineer
{
    /**
     * Create and return a sports car with predefined specifications.
     * This method uses the builder to configure the engine, seats, and GPS for a sports car.
     */
    public function buildSportCare(CarBuilderInterface $builder): Car
    {
        return $builder
            ->setEngine('V8 Engine')
            ->setSeats(2)
            ->setGPS(true)
            ->getCare();
    }

     /**
     * Create and return a family car with predefined specifications.
     * This method uses the builder to configure the engine, seats, and GPS for a family car.
     */
    public function buildFamilyCare(CarBuilderInterface $builder): Car 
    {
        return $builder
            ->setEngine('V6 Engine')
            ->setSeats(5)
            ->setGPS(false)
            ->getCare();
    }
}

// Example usage:
$builder = new CarBuilder();
$engineer = new CarEngineer();

// Create a sports car
$sportCar = $engineer->buildSportCare($builder);
$sportCar->showSpecifications();

// Create a family car
$familyCar = $engineer->buildFamilyCare($builder);
$familyCar->showSpecifications();