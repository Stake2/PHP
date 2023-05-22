<?php 

# Language

class Language extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;

		$this -> Define_Languages();
		$this -> Define_User_Language();
	}

	private function Define_Languages() {
		$this -> languages = json_decode(file_get_contents($this -> folders["apps"]["module_files"]["language"]["languages"]), true);
		array_splice($this -> languages["small"], 0, 0, "general");

		$this -> languages["full"]["general"] = "General";
	}

	private function Define_User_Language() {
		global $http_method;
		global $website_information;

		$this -> user_language = $http_method["language"];

		$website_information["language"] = $this -> user_language;
		$website_information["full_language"] = $this -> user_language;

		$i = 0;
		foreach ($this -> languages["small"] as $language) {
			$full_language = $this -> languages["full"][$language];

			if ($this -> user_language == $full_language) {
				$this -> user_language = $language;

				$website_information["language_number"] = $i;
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

		$website_information["language"] = $this -> user_language;
		$website_information["full_language"] = $this -> full_user_language;
	}

	public static function Item($item) {
		global $website_information;

		if (array_key_exists($website_information["language"], $item)) {
			return $item[$website_information["language"]];
		}
	}
}

?>