<?php

require 'HeroFactory.php';

interface HeroInterface
{
    public function skills();
}

class Anni implements HeroInterface
{
    protected $q = '碎裂之火';
    protected $w = '焚烧';
    protected $e = '熔岩护盾';
    protected $r = '提伯斯之怒';

    public function skills()
    {
        echo "Q: " . $this->q;
        echo "W: " . $this->w;
        echo "E: " . $this->e;
        echo "R: " . $this->r;
    }
}



class Wukong implements HeroInterface
{
    protected $q = '粉碎打击';
    protected $w = '真假猴王';
    protected $e = '腾云突击';
    protected $r = '大闹天空';

    public function skills()
    {
        echo "Q: " . $this->q;
        echo "W: " . $this->w;
        echo "E: " . $this->e;
        echo "R: " . $this->r;
    }
}


// $anni = new Anni;
// $anni->skills();


$heroFactory = new HeroFactory;

$anni = $heroFactory->createHero('anni');

$anni->skills();

$wukong = $heroFactory->createHero('wukong');
$wukong->skills();