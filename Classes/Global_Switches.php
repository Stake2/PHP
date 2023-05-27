<?php 

# Global_Switches.php

class Global_Switches {
	public function __construct() {
		global $folders;

		$this -> global_switches = [
			"testing" => false,
			"verbose" => false,
			"user_information" => false
		];

		# Global Switches dictionary
		$this -> switches = $this -> JSON_To_PHP($folders["mega"]["php"]["classes"]["text_files"]["switches"]);
	}

	public function JSON_To_PHP($file) {
		$contents = json_decode(file_get_contents($file), True);

		return $contents;
	}

	public function JSON_From_PHP($json) {
		return json_encode($json, JSON_PRETTY_PRINT);
	}

	public function Edit($file, $text, $mode = "w") {
		$text = $this -> JSON_From_PHP($text);

		$file = fopen($file, $mode);
		fwrite($file, $text);
		fclose($file);
	}

	public function Switch($switches = Null) {
		global $folders;

		if ($switches == Null) {
			$switches = $this -> global_switches;
		}

		foreach (array_keys($this -> global_switches) as $local_switch) {
			if (isset($switches) == False) {
				$switches[$local_switch] = $this -> global_switches[$switch];
			}
		}

		$this -> Edit($folders["mega"]["php"]["classes"]["text_files"]["switches"], $switches);

		return True;
	}
}

?>