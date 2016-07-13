<?php

/**
 * 观察者模式	
 */

class DemoSubject implements SplSubject
{
    private $observers;
    private $foo;

    public function setObservers()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }

    public function set($foo)
    {
        $this->foo = $foo;
    }

    public function get()
    {
        return $this->foo;
    }
}

class DemoObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo $subject->get() . "<br />";
    }
}

class FooObserver implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo $subject->get() . "<br />";
    }
}


class Client
{
    public function __construct()
    {
        echo "<p>三个观察者，一个主题</p>";
        $ob1 = new DemoObserver();
        $foo = new FooObserver();
        $ob2 = new DemoObserver();
        $ob3 = new DemoObserver();

        $subject = new DemoSubject();
        $subject->setObservers();
        $subject->set('记录');
        $subject->attach($ob1);
        $subject->attach($ob2);
        $subject->attach($ob3);

        $subject->notify();

        echo "<p>取消第三个</p>";
        $subject->detach($ob3);
        $subject->notify();

        echo "<p>添加第三个，取消第二个</p>";
        $subject->attach($ob3);
        $subject->detach($ob2);
        $subject->notify();
    }
}

(new Client);