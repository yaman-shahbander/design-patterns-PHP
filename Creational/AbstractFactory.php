<?php

interface CarInterface
{
	public function calculatePrice();
}

class BMWCar implements CarInterface
{
	public function __construct(private $price) {}

	public function calculatePrice()
	{
		return $this->price + 120000;
	}
}

class BenzCar implements CarInterface
{
	public function __construct(private $price, private $tax) {}

	public function calculatePrice()
	{
		return $this->price + $this->tax + 200000;
	}
}

class CarAbstractFactory
{
	public function __construct(private $price, private $tax = 0) {}

	public function createBMWCar(): BMWCar
	{
		return new BMWCar($this->price);
	}

	public function createBenzCar(): BenzCar
	{
		return new BenzCar($this->price, $this->tax);
	}
}

$carAbstractFactory = new CarAbstractFactory(10);
$bmw = $carAbstractFactory->createBMWCar()->calculatePrice();
var_dump($bmw);