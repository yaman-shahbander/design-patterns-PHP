<?php

interface CarBuilderInterface
{
    public function createCar(): self;
    public function createBody(): self;
    public function createEngine(): self;
    public function createDoor(): self;
    public function createWheel(): self;
    public function getCar(): object;
}

class CarData
{
    public $type;
    public $body;
    public $engine;
    public $door;
    public $wheel;
}

class BMWCar
{
    public function __construct(public CarData $data) {}
}

class BenzCar
{
    public function __construct(public CarData $data) {}
}

class BMWCarBuilder implements CarBuilderInterface
{
    private CarData $carData;

    public function __construct()
    {
        $this->carData = new CarData();
    }

    public function createCar(): self
    {
        $this->carData->type = 'BMW';
        return $this;
    }

    public function createBody(): self
    {
        $this->carData->body = 'BMW body';
        return $this;
    }

    public function createEngine(): self
    {
        $this->carData->engine = 'BMW engine';
        return $this;
    }

    public function createDoor(): self
    {
        $this->carData->door = 'BMW door';
        return $this;
    }

    public function createWheel(): self
    {
        $this->carData->wheel = 'BMW wheel';
        return $this;
    }

    public function getCar(): object
    {
        return new BMWCar($this->carData);
    }
}

class BenzCarBuilder implements CarBuilderInterface
{
    private CarData $carData;

    public function __construct()
    {
        $this->carData = new CarData();
    }

    public function createCar(): self
    {
        $this->carData->type = 'Benz';
        return $this;
    }

    public function createBody(): self
    {
        $this->carData->body = 'Benz body';
        return $this;
    }

    public function createEngine(): self
    {
        $this->carData->engine = 'Benz engine';
        return $this;
    }

    public function createDoor(): self
    {
        $this->carData->door = 'Benz door';
        return $this;
    }

    public function createWheel(): self
    {
        $this->carData->wheel = 'Benz wheel';
        return $this;
    }

    public function getCar(): object
    {
        return new BenzCar($this->carData);
    }
}

class CarDirector
{
    public function __construct(private CarBuilderInterface $builder) {}

    public function buildCar(): object
    {
        return $this->builder
            ->createCar()
            ->createBody()
            ->createEngine()
            ->createDoor()
            ->createWheel()
            ->getCar();
    }
}

$bmwDirector = new CarDirector(new BMWCarBuilder());
var_dump($bmwDirector->buildCar());
