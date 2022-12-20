<?php 

# Text

class Text {
	public static function Show_Variable($variable) {
		$variable = var_export($variable, True);

		$variable = str_replace("'", '"', $variable);
		$variable = str_replace("  ", '	', $variable);
		$variable = str_replace("=> \n\t", '=> ', $variable);
		$variable = str_replace(" 	array", ' array', $variable);
		$variable = preg_replace("/[ 	]+array/i", " array", $variable);

		echo '<pre style="background-color: white;font-family: Verdana, sans-serif;font-size: 15px;line-height: 1.5;">'.$variable.";</pre>";
	}

	public static function format($text, $parameters) {
		$parameters = (array)$parameters;

		$text = preg_replace_callback("#\{\}#",
			function ($parameters_array) {
				static $i = 0;
				return '{'.($i++).'}';
			},
			$text
		);

		return str_replace(
			array_map(
				function ($key) {
					return '{'.$key.'}';
				},

				array_keys($parameters)
			),

			array_values($parameters),

			$text,
		);
	}
}

?>