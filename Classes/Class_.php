<?php 

# Class_.php

abstract class Class_ {
	public function __construct($class) {
		$class = strtolower($class);

		$global_switches = new Global_Switches();

		$this -> switches = $global_switches -> switches;
		$this -> switches[$class] = [];

		$items = ["create", "delete", "copy", "move", "edit"];

		foreach ($items as $item) {
			$value = True;

			if ($this -> switches["testing"] == True) {
				$value = False;
			}

			$this -> switches[$class][$item] = True;
		}
	}
}

?>