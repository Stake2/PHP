<?php 

abstract class Animal {

	public function Falar() {

		return "Som";

	}

	public function Mover() {

		return "Anda";

	}

}

class Cachorro extends Animal {

	public function Falar() {

		return "Late";

	}

}

class Gato extends Animal {

	public function Falar() {

		return "Mia";
		
	}

}

class Passaro extends Animal {

	public function Falar() {

		return "Canta";

	}

	public function Mover() {

		return "Voa e ".parent::Mover();

	}

}

$pluto = new Cachorro();

echo $pluto -> Falar()."<br />";

echo $pluto -> Mover()."<br />";

echo "-------------------<br />";

$garfield = new Gato();

echo $garfield -> Falar()."<br />";

echo $garfield -> Mover()."<br />";

echo "-------------------<br />";

$ave = new Passaro();

echo $ave -> Falar()."<br />";

echo $ave -> Mover()."<br />";

?>