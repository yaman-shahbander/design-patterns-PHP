<?php

interface CarBrandInterface
{
	public function createBrand();
}

class BMWBrand implements CarBrandInterface
{
	public function createBrand()
	{
		return "BMW Brand";
	}
}

class BenzBrand implements CarBrandInterface
{
	public function createBrand()
	{
		return "Benz Brand";
	}
}

interface BrandFactory
{
	public function buildBrand();
}

class BMWBrandFactory implements BrandFactory
{
	public function buildBrand()
	{
		return new BMWBrand();
	}
}

class BenzBrandFactory implements BrandFactory
{
	public function buildBrand()
	{
		return new BenzBrand();
	}
}

$BMWbrandFactory = new BMWBrandFactory();
$BMWBrand = $BMWbrandFactory->buildBrand();
var_dump($BMWBrand->createBrand());
