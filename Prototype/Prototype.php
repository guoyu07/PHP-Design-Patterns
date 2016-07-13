<?php

//原形接口
interface Prototype {
	public function copy(); 
}

//具体生成原型类 
class ConcretePrototype implements Prototype{

    private  $_name;

    public function __construct($name) 
    { 
    	$this->_name = $name;
    }

    public function copy() {
    	return clone $this->_name;
 	}
}

//英雄类 clone 模式
class Wukong
{
	public $nickname;

    protected $q = '粉碎打击';
    protected $w = '真假猴王';
    protected $e = '腾云突击';
    protected $r = '大闹天空';

    public function skills()
    {
        echo "Q: " . $this->q;
        echo "W: " . $this->w;
        echo "E: " . $this->e;
        echo "R: " . $this->r."<br/>";
    }

    public function getNickname($nickname)
    {
    	$this->nickname = $nickname;
    	echo $this->nickname;
    }

}
 

 
$wukong = new Wukong();
$wukong = new ConcretePrototype($wukong);


$wukong1 = $wukong->copy();
$wukong2 = $wukong->copy();

echo $wukong1->getNickname('悟空1号');
echo $wukong1->skills();

echo $wukong2->getNickname('悟空2号');
echo $wukong2->skills();

?>