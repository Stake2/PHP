<?php 

# Class_

abstract class Class_ {
	public function __construct($class) {
		$class = strtolower($class);

		$global_switches = new Global_Switches();

		$this -> global_switches = $global_switches -> global_switches;
		$this -> global_switches[$class] = [];

		$items = ["create", "delete", "copy", "move", "edit"];

		foreach ($items as $item) {
			$value = True;

			if (array_key_exists("testing", $this -> global_switches) == True and $this -> global_switches["testing"] == True) {
				$value = False;
			}

			$this -> global_switches[$class][$item] = True;
		}
	}
}

?>