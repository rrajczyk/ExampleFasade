<?php

abstract class System
{
    abstract public function operation(): string;

    public function systemMagic(string $type): string
    {
        $result = "systemMagic - ".$type." <br>";

        return $result;
    }
}
class System1 extends System
{
    public function operation(): string
    {
        return "System1: Ready!<br>";
    }

    public function operationN(): string
    {
        return "System1: Go!<br>";
    }
}

class System2 extends System
{
    public function operation(): string
    {
        return "System2: Ready!<br>";
    }

    public function operationZ(): string
    {
        return "System2: Fire!<br>";
    }
}

class Facade
{
    protected $system1;

    protected $system2;

    public function __construct(
        System1 $system1 = null,
        System2 $system2 = null
    ) {
        $this->system1 = $system1 ?: new System1();
        $this->system2 = $system2 ?: new System2();
    }

    public function operation(): string
    {
        $result = "Facade initializes systems:<br>";
        $result .= $this->system1->operation();
        $result .= $this->system2->operation();
        $result .= $this->system1->systemMagic('Magic1');
        $result .= $this->system2->systemMagic('Magic2');
        $result .= "Facade orders systems to perform the action:<br>";
        $result .= $this->system1->operationN();
        $result .= $this->system2->operationZ();

        return $result;
    }
}

$system1 = new System1();
$system2 = new System2();

$facade = new Facade($system1, $system2);
echo $facade->operation();

