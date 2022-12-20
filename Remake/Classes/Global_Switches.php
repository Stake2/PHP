<?php 

# Global_Switches

class Global_Switches {
	public function __construct() {
		global $folders;

		# Global Switches dictionary
		$this -> global_switches = [];

		$json = self::JSON($folders["mega"]["php"]["classes"]["text_files"]["switches"]);

		foreach (array_keys($json) as $key) {
			$changed_key = str_replace(" ", "_", strtolower($key));

			$value = $json[$key];

			if (in_array($value, ["True", "true", "Yes", "yes", "Sim", "sim"]) == True) {
				$value = True;
			}

			if (in_array($value, ["False", "false", "No", "no", "Não", "não"]) == True) {
				$value = False;
			}

			$this -> global_switches[$changed_key] = $value;
		}
	}

	public static function JSON($file) {
		$contents = json_decode(file_get_contents($file), True);

		return $contents;
	}
}

?>