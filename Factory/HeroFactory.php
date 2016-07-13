<?php

/**
* 英雄工厂类
*/
class HeroFactory
{
	protected $heroList = [];			

	public function __construct()
	{
		$this->heroList = [
			'anni' => 'Anni',
			'wukong' => 'Wukong' 
		];
	}

	public function createHero($name)
	{
		if (!array_key_exists($name, $this->heroList)) {
			throw new InvalidArgumentException("$name not exist");
		}
		return new $this->heroList[$name];
	}

}
