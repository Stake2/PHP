<?php 

# Language.php

class Language extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> settings = self::JSON_To_PHP($folders["Apps"]["Settings"]);

		$this -> Define_Languages();
	}

	private function JSON_To_PHP($file) {
		return json_decode(file_get_contents($file), true);
	}

	private function Define_Languages() {
		global $folders;

		$this -> languages = self::JSON_To_PHP($folders["Apps"]["Module files"]["Utility"]["Language"]["Languages"]);
		$this -> languages["small"] = array_insert($this -> languages["small"], 0, "general");

		$array = $this -> languages["full"];

		$this -> languages["full"] = [
			"general" => "General"
		];

		foreach (array_keys($array) as $key) {
			$this -> languages["full"][$key] = $array[$key];
		}

		foreach ($this -> languages["small"] as $key) {
			if (
				in_array($key, $this -> languages["supported"]) == False and
				$key != "general"
			) {
				$this -> languages["small"] = array_diff($this -> languages["small"], [$key]);
				unset($this -> languages["full"][$key]);
			}
		}

		unset($array);
	}

	public function Define_User_Language() {
		global $JSON;
		global $website;
		global $folders;

		$this -> modules_language = $this -> settings["Language"];
		$this -> user_language = $website["language"];

		$website["language"] = $this -> user_language;
		$website["full_language"] = $this -> user_language;

		$i = 0;
		foreach ($this -> languages["small"] as $language) {
			$full_language = $this -> languages["full"][$language];

			if ($this -> user_language == $full_language) {
				$this -> user_language = $language;

				$website["language_number"] = $i;
			}

			$c = 0;
			foreach (array_keys($this -> languages["full_translated"]) as $key) {
				foreach (array_values($this -> languages["full_translated"][$key]) as $full_translated_language) {
					if ($this -> user_language == $full_translated_language) {
						$this -> user_language = $key;

						$website["language_number"] = $i;
					}
				}

				$c++;
			}

			$i++;
		}

		$this -> full_user_language = $this -> languages["full"][$this -> user_language];

		$website["language"] = $this -> user_language;
		$website["full_language"] = $this -> full_user_language;

		# Get the Python "Texts.json" file
		$website["Texts"] = $JSON -> To_PHP($folders["PHP"]["Classes"]["Text files"]["Texts"]);

		# Mix it with the PHP "Texts.json" file
		$website["Texts"] = array_merge($website["Texts"], $JSON -> To_PHP($folders["Apps"]["Module files"]["Utility"]["Language"]["Texts"]));

		$website["Language texts"] = self::Item($website["Texts"]);

		$this -> texts = $website["Texts"];
		$this -> language_texts = $website["Language texts"];

		$website["language_icon"] = $website["Language texts"]["language_icon"];

		# Define the website "Languages" dictionary
		$website["Languages"] = [
			"Small" => $website["language"],
			"Full" => $website["full_language"],
			"Module" => $this -> settings["Language"]
		];

		# Define the language texts but with the module language
		$website["Language texts (Module language)"] = self::Item($website["Texts"], $website["Languages"]["Module"]);
	}

	public static function Item($item, $parameter_language = "") {
		global $website;

		$language = $website["language"];

		if ($website["language"] == "general") {
			$language = "en";
		}

		if ($parameter_language != "") {
			$language = $parameter_language;
		}

		if (
			is_array($item) == True and
			isset($item[$language]) == True
		) {
			return $item[$language];
		}

		if (
			is_array($item) == True and
			isset($item[$language]) == False
		) {
			$array = $item;

			foreach (array_keys($array) as $key) {
				if (
					isset($item[$key]) == True and
					isset($item[$key][$language]) == True
				) {
					$array[$key] = $item[$key][$language];
				}
			}

			return $array;
		}
	}
}

?>