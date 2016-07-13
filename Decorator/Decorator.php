<?php

interface Component
{
    public function operation();
}
 

// 装饰角色 

abstract class Decorator implements Component
{ 
    protected  $_component;

    public function __construct(Component $component)
    {
        $this->_component = $component;
    }

    public function operation()
    {
        $this->_component->operation();
    }
}

// 具体装饰类A

class ConcreteDecoratorA extends Decorator
{ 
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation() {
        parent::operation();    //  调用装饰类的操作
        $this->addedOperationA();   //  新增加的操作
    }

    public function addedOperationA()
    {
        echo '加点酱油; ';
    }
}

// 具体装饰类B

class ConcreteDecoratorB extends Decorator
{ 
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addedOperationB();
    }

    public function addedOperationB()
    {
        echo "加点辣椒; ";
    }
}

//具体组件类
 
class ConcreteComponent implements Component
{ 
    public function operation()
    {
        echo "安静的做个菜; ";
    } 
}
 

$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

//最开始的状态
$component->operation();


echo '<br>--------<br>';

$decoratorA->operation();

echo '<br>--------<br>';
$decoratorB->operation();