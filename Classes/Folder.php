<?php 

# Folder.php

class Folder extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public function Verbose($folder, $text) {
		return False;
	}

	public function Sanitize($folder) {
		$restricted_characters = [
			"?",
			'"',
			"|",
			"*",
			"<",
			">"
		];

		return str_replace($restricted_characters, "", $folder);
	}

	public function Exist($folder) {
		if (file_exists($folder) == True) {
			return True;
		}

		else {
			return False;
		}
	}

	public function Create($folder) {
		$folder = $this -> Sanitize($folder);

		if ($this -> Exist($folder) == False) {
			mkdir($folder);
		}
	}

	public function Contents($folder, $replace_with = "") {
		$root_folder = $this -> Sanitize($folder);

		# Extract the folder name from the given path
		$folder_name = explode("/", $root_folder);

		$number = 1;

		# If the folder name is empty, extract the second last element as the folder name
		if (end($folder_name) == "") {
			$number = 2;
		}

		$folder_name = $folder_name[count($folder_name) - $number];

		# Define the contents array
		$contents = [
			"Folder" => [],
			"File" => [],
			"Dictionary" => [
				"root" => $root_folder
			],
			"Size" => 0
		];

		$item_types = [
			"Folder",
			"File"
		];

		$sub_item_types = [
			"List",
			"Names",
			"Extensions",
			"Dictionary",
			"Creation time",
			"Modification time"
		];

		# Create the folder and file keys
		foreach ($item_types as $key) {
			# Iterate through the sub-keys
			foreach ($sub_item_types as $sub_key) {
				# Define the value (list or dictionary)
				$value = [];

				# Create the sub-key
				$contents[$key][$sub_key] = $value;
			}
		}

		$hard_drive_letter = $this -> folders["Hard drive letter"];

		foreach (new DirectoryIterator($root_folder) as $item) {
			$path = $item -> getPathname();

			# Replace the two left facing slashes with one right facing slash
			$path = str_replace("\\", "/", $path);

			# Replace the path with the "replace_with" variable if it is not empty
			if ($replace_with != "") {
				$path = str_replace($root_folder, $replace_with, $path);
			}

			# Get the folder or file name
			$name = $item -> getFilename();

			# Only folders and files
			if ($item -> isDot() == False) {
				# Only folders
				if ($item -> isDir() == True) {
					# Add the folder path
					$path .= "/";

					$type = "Folder";
				}

				# Only files
				if ($item -> isFile() == True) {
					$type = "File";
				}

				# Add the item path
				array_push($contents[$type]["List"], $path);

				# Add the item name
				array_push($contents[$type]["Names"], $name);

				# Replace the dot in the name
				$name = (string)explode(".", $name)[0];

				$contents[$type]["Extensions"][$name] = $item -> getExtension();
				$contents[$type]["Creation time"][$name] = $item -> getCTime();
				$contents[$type]["Modification time"][$name] = $item -> getMTime();

				# Get the size of the item and add it to the "size" key
				$contents["Size"] = $contents["Size"] + $item -> getSize();
			}
		}

		$sorting_type = SORT_NATURAL;

		foreach (["Folder", "File"] as $item) {
			$i = 0;
			foreach ($contents[$item]["Names"] as $key) {
				$key = (string)explode(".", $key)[0];

				$contents[$item]["Dictionary"][$key] = [
					"Name" => $contents[$item]["Names"][$i],
					"Extension" => $contents[$item]["Extensions"][$key],
					"Path" => $contents[$item]["List"][$i],
					"Creation time" => $contents[$item]["Creation time"][$key],
					"Modification time" => $contents[$item]["Creation time"][$key]
				];

				$i++;
			}

			# Sort the array items
			sort($contents[$item]["List"], $sorting_type);
			sort($contents[$item]["Names"], $sorting_type);

			# Sort the array keys
			ksort($contents[$item]["Dictionary"], $sorting_type);
			ksort($contents[$item]["Creation time"], $sorting_type);
			ksort($contents[$item]["Modification time"], $sorting_type);
		}

		return $contents;
	}
}

?>