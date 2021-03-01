<?php

/*
 * 1. Herencia * 
 * 2. Clases o funciones abstractas * 
 * 3. Interacción entre objetos *
 * 4. Polimorfismo e interfaces *
 *  */

abstract class Character {
    protected $name;
    protected $life = 60;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function move($direction) {
        echo "<p>{$this->name} avanza hacia {$direction}</p>";
    }
    
    abstract function attack($opponent);
    
    public function die() {
        echo "<p>{$this->name} muere</p>";
    }
    
    public function getLife() {
        return $this->life;
    }

    public function setLife($life) {
        $this->life = $life;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function takeDamage($damage) {
        $this->life = $this->life - $damage;        
        echo "{$this->name} tiene {$this->life} vida";
        
        if ($this->life <= 0) {
            $this->die();
        }
        
    }
    
}

class Knight extends Character{
    protected $damage = 30;
    protected $armor;
    
    public function __construct($name, Armor $armor = null) {
        $this->setArmor($armor);
        parent::__construct($name);
    }
    
    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }
    
    public function attack($opponent) {
        echo "<p>{$this->name} ataca con espada a {$opponent->getName()}</p>";        
        $opponent->takeDamage($this->damage);
    }
    
    public function takeDamage($damage) {
        
        if ($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        
        parent::takeDamage($damage);
    }
    
}

class Monster extends Character {
    
    protected $damage = 40;

     public function attack($opponent) {
        echo "<p>{$this->name} escupe fuego a {$opponent->getName()}</p>";
        $opponent->takeDamage($this->damage);
    }  
    
    public function takeDamage($damage) {
        if (rand(0,1)) {
          parent::takeDamage($damage);
        }
    }
    
}

interface Armor {
    public function absorbDamage($damage);
}

class BronzeArmor implements Armor{
    public function absorbDamage($damage) {
        return $damage / 2;
    }
}


class SilverArmor implements Armor{
    public function absorbDamage($damage) {
        return $damage / 4;
    }
}


$bronzeArmor = new BronzeArmor();
$silverArmor = new SilverArmor();


$monster = new Monster("Dragon");
$monster->move("norte");

$knight = new Knight("Caballero Bronce");
$knight->move("sur");
$knight->attack($monster);

$silverKnight = new Knight("Caballero Plateado", $silverArmor);
$silverKnight->move("sur");
$silverKnight->attack($monster);


$monster->attack($knight);

$knight->setArmor($silverArmor);

$monster->attack($knight);


$knight->attack($monster);
