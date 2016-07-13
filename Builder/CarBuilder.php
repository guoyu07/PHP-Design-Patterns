<?php

/**
* 汽车类
*/
class Car
{
	private $parts;

	public function __construct()
	{
		$this->parts = [];
	}

	public function add($part)
	{
		return array_push($this->parts, $part);
	}

}


/**
* 建造者抽象类
*/
abstract class Builder
{
	public abstract function buildWindow();
    public abstract function buildwheel();
    public abstract function getResult();
}


/**
* 汽车构建类
*/
class CarBuilder extends Builder
{
	private $car;

	public function __construct()
	{
		$this->car = new Car();
	}


	public function buildWindow()
	{
		$this->car->add('窗户');
	}

	public function buildwheel()
	{	
		$this->car->add('轮子');
	}

	public function getResult()
	{
		return $this->car;
	}

}

/**
* 汽车导演类
*/
class CarDirector 
{ 
    public function __construct(Builder $car)
    {
        $car->buildWindow();
        $car->buildwheel();
    }
}

/**
* 自行车导演类
*/
class BicycleDirector 
{ 
    public function __construct(Builder $car)
    {
        $car->buildwheel();
    }
}



//小汽车

$carBulider = new CarBuilder();
$carDirector = new CarDirector($carBulider);
$car = $carBulider->getResult();

//自行车
$bicycleBulider = new CarBuilder();
$bicycleDirector = new BicycleDirector($bicycleBulider);
$bicycle = $bicycleBulider->getResult();



var_dump($car);


var_dump($bicycle);




