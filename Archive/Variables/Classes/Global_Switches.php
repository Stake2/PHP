<?php 

# Global_Switches

class Global_Switches {
	public function __construct() {
		global $folders;

		# Global Switches dictionary
		$this -> global_switches = [];

		$dictionary = self::Dictionary($folders["mega"]["php"]["variables"]["classes"]["text_files"]["switches"]);

		foreach (array_keys($dictionary) as $key) {
			$changed_key = str_replace(" ", "_", strtolower($key));

			$value = $dictionary[$key];

			if (in_array($value, ["True", "true", "Yes", "yes", "Sim", "sim"]) == True) {
				$value = True;
			}

			if (in_array($value, ["False", "false", "No", "no", "Não", "não"]) == True) {
				$value = False;
			}

			$this -> global_switches[$changed_key] = $value;
		}
	}

	public static function Dictionary($file) {
		$dictionary = [];

		$lines = file($file);

		foreach ($lines as $line) {
			if (strpos($line, ": ") == True) {
				$split = explode(": ", $line);

				$key = $split[0];
				$value = $split[1];

				$dictionary[$key] = $value;
			}
		}

		return $dictionary;
	}
}

?>