<?php 

# Folder

class Folder extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}
}

?>