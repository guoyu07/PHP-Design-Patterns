<?php

// 抽象责任角色
abstract class Responsibility { 

    public $next; // 下一个责任角色
 
    public function setNext(Responsibility $l)
    {
        $this->next = $l;
        return $this;
    }
    abstract public function operate(); // 操作方法
}


//经理级别 
class CommonManager extends Responsibility 
{
    public function operate()
    {
        if (is_null($this->next) == false) {
            $this->next->operate();
            echo '经理开始处理 start'."<br>";
        }
    }
}


// 总监级别
class MajorDomo extends Responsibility 
{
    public function operate()
    {
        if (is_null($this->next) == false) {
            $this->next->operate();
            echo '总监开始处理 start';
        }
    }
}

// 总经理级别
class GeneralManager extends Responsibility 
{
    public function operate()
    {
        if (is_null($this->next) == false) {
            $this->next->operate();
            echo '总经理开始处理 start';
        }
    }
}

 
$commonManager = new CommonManager();
$majorDomo = new MajorDomo();
$generalManager = new GeneralManager();




$commonManager->setNext($majorDomo);

// var_dump($commonManager);
//var_dump($commonManager->next);

$commonManager->operate();


$majorDomo->setNext($generalManager);
//var_dump($majorDomo);
$majorDomo->operate();


