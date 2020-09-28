<?php

/*

1. Ферма - абстракция
a. Опишите следующие классы

■ Cow - Коровка
■ Pig - Хрюшка
■ Chicken - Курица
■ Farm - Ферма

b. Ферма должна содержать свойство public $animals - массив с животными, а также метод public
function addAnimal(Animal $animal) - который добавит животное на ферму.

c. Каждое животное умеет говорить public function say() и ходить public function walk(), создайте и
реализуйте эти методы. Метод say() - должен выводить голос каждого животного. Метод walk() -
должен выводить "топ-топ", для каждого из животных.

d. При заселении на ферму животное должно пойти.

e. Создайте метод перекличка на ферме public function rollCall() - в котором каждое животное на
ферме покажет свой голос в случайном порядке .

f. Создайте класс - абстракцию для данной задачи. Обратите внимание на условие в этой задачи,
волей-неволей эта абстракция в явном виде присутствует в условии задачи. Вынесите как можно
больше функционала в абстракцию - а реализации сделайте наследниками этой абстракции.

g. Поселите корову, двух хрюшек и курицу на ферму. Проведите их перекличку.

*/

namespace Farm;

abstract class Animal
{
	public $voice;

	public function say()
	{
		echo $this->voice.' </br>';
	}

	public function walk()
	{
		echo 'топ-топ'.'</br>';
	}
}

class Cow extends Animal
{
	public $voice = 'Муууу';
}

class Pig extends Animal
{
	public $voice = 'ХрюХрю';
}

class Chicken extends Animal
{
	public $voice = 'КхоКхо';
}

// b. Ферма должна содержать свойство public $animals - массив с животными, а также метод public
// function addAnimal(Animal $animal) - который добавит животное на ферму.

class farm
{
	public $animals = [];

	public function addAnimal(Animal $animal)
	{
	//d. При заселении на ферму животное должно пойти.
		$this->animals[] = $animal;
		$animal->walk();
	}

// 	e. Создайте метод перекличка на ферме public function rollCall() - в котором каждое животное на
// ферме покажет свой голос в случайном порядке.

	public function rollCall()
	{
		shuffle($this->animals);	

		foreach ($this->animals as $animal) {
			$animal->say();	
			}
	}
}

$farm = new Farm();

$animals = [
	$cow = new Cow(),
	$pig = new Pig(),
	$pig2 = new Pig(),
	$chicken = new Chicken(),
];

foreach ($animals as $animal) {
	$farm->addAnimal($animal);
}

echo '<h2>Перекличка на Ферме 1:</h2>';

$farm->rollCall();