<?php

/**
* 水果工厂类
*/
class FruitFactory
{
	
	protected $fruitList = [];			

	protected function __construct()
	{
		$this->fruitList = [
			'apple' => 'Apple',
			'mango' => 'Mango' 
		];
	}

	public function createFruit($name)
	{
		if (!array_key_exists($name, $this->fruitList)) {
			throw new InvalidArgumentException("$name not exist");
		}
		return new $this->fruitList[$name];
	}

}
