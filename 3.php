<?php

abstract class Animal {
    protected string $name;
    protected int $age;
    protected string $species;
    
    public function __construct(string $name, int $age, string $species) {
        $this->name = $name;
        $this->age = $age;
        $this->species = $species;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function getAge(): int {
        return $this->age;
    }
    
    public function getSpecies(): string {
        return $this->species;
    }
    

    abstract public function makeSound(): void;
 
    public function getInfo(): string {
        return "{$this->name} ({$this->species}), возраст: {$this->age} лет";
    }
}


class Dog extends Animal {
    private string $breed;
    
    public function __construct(string $name, int $age, string $breed) {
        parent::__construct($name, $age, "Собака");
        $this->breed = $breed;
    }
    
    public function getBreed(): string {
        return $this->breed;
    }
    
    public function makeSound(): void {
        echo "{$this->name} говорит: Гав-гав!\n";
    }
    
    public function getInfo(): string {
        return parent::getInfo() . ", порода: {$this->breed}";
    }
}

class Cat extends Animal {
    private string $color;
    
    public function __construct(string $name, int $age, string $color) {
        parent::__construct($name, $age, "Кот");
        $this->color = $color;
    }
    
    public function getColor(): string {
        return $this->color;
    }
    
    public function makeSound(): void {
        echo "{$this->name} говорит: Мяу!\n";
    }
    
    public function getInfo(): string {
        return parent::getInfo() . ", цвет: {$this->color}";
    }
}

class Zoo {
    private array $animals = [];
    
    public function addAnimal(Animal $animal): void {
        $this->animals[] = $animal;
        echo "Животное {$animal->getName()} добавлено в зоопарк\n";
    }
    
    public function listAnimals(): void {
        echo "=== Животные в зоопарке ===\n";
        if (empty($this->animals)) {
            echo "В зоопарке пока нет животных\n";
            return;
        }
        
        foreach ($this->animals as $index => $animal) {
            echo ($index + 1) . ". " . $animal->getInfo() . "\n";
        }
        echo "============================\n";
    }
    

    public function animalSounds(): void {
        echo "=== Звуки животных ===\n";
        if (empty($this->animals)) {
            echo "В зоопарке пока нет животных\n";
            return;
        }
        
        foreach ($this->animals as $animal) {
            $animal->makeSound();
        }
        echo "======================\n";
    }
    
    public function getAnimalCount(): int {
        return count($this->animals);
    }
}

echo "=== Демонстрация работы классов ===\n\n";

$dog1 = new Dog("Граф", 3, "Лабрадор");
$dog2 = new Dog("Рекс", 5, "Овчарка");
$cat1 = new Cat("Тоша", 2, "Рыжий");
$cat2 = new Cat("Дракула", 4, "Черный");

$zoo = new Zoo();

$zoo->addAnimal($dog1);
$zoo->addAnimal($dog2);
$zoo->addAnimal($cat1);
$zoo->addAnimal($cat2);

echo "\n";
$zoo->listAnimals();

echo "\n";
$zoo->animalSounds();
echo "\nВсего животных в зоопарке: " . $zoo->getAnimalCount() . "\n";