<?php
/**
* Class and Function List:
* Function list:
* - space_or_dash()
* - list_files()
* - category_previews()
* - list_directories()
* - createThumbnail()
* Classes list:
*/
// Remove trailing slashes (if present), and add one manually.
// Note: This avoids a problem where some servers might add a trailing slash, and others not..
define('BASE_PATH', rtrim(realpath(dirname(__FILE__)) , "/") . '/');

require BASE_PATH . 'settings.php'; // Note. Include a file in same directory without slash in front of it!
require BASE_PATH . '_lib_/translator_class.php';
$translator = new translator($settings['lang']);
if (session_status() == PHP_SESSION_NONE)
{
	session_cache_limiter("private_no_expire");
	session_start();
}

// <<<<<<<<<<<<<<<<<<<<
// Validate the _GET category input for security and error handling
// >>>>>>>>>>>>>>>>>>>>
$HTML_navigation = '<li><a href="' . BASE_PATH . '">' . $translator->string('Home') . '</a></li>';

if (isset($_GET['category']))
{
	$HTML_navigation .= '<li><a href="index.php">' . $translator->string('Categories') . '</a></li>';
	if (preg_match("/^[a-zæøåÆØÅ-]+$/i", $_GET['category']))
	{
		$requested_category = $_GET['category'];
		if (isset($ignored_categories_and_files["$requested_category"]))
		{
			header("HTTP/1.0 500 Internal Server Error");
			echo '<!doctype html><html><head></head><body><h1>' . $translator->string('Error') . '</h1><p>' . $translator->string('This is not a file or category...') . '</p></body></html>';
			exit();
		}
		// <<<<<<<<<<<<<<<<<<<<
		// Fetch the files in the category, and require them in an HTML ul list
		// >>>>>>>>>>>>>>>>>>>>
		$files                    = list_files($settings, $ignored_categories_and_files);
		if (count($files) >= 1)
		{
			$HTML_cup                 = '<ul id="images">';
			foreach ($files as & $file_name)
			{
				if (isset($_SESSION["password"]))
				{
					$delete_control           = '<a href="admin.php?delete=' . $requested_category . '/' . $file_name . '" class="delete"><img src="delete.png" alt="delete" style="width:30px;height:30px;"></a>';
					$category_preview_control = '<a href="admin.php?category=' . $requested_category . '&set_preview_image=' . $file_name . '" class="preview"><img src="preview.png" alt="set preview image" style="width:30px;height:30px;"></a>';
				}
				else
				{
					$delete_control           = '';
					$category_preview_control = '';
				}
				$thumb_file_location      = 'thumbnails/' . $requested_category . '/thumb-' . rawurlencode($file_name);
				$source_file_location     = $requested_category . '/' . $file_name;
				$HTML_cup .= '<li><a href="viewer.php?category=' . $requested_category . '&filename=' . $file_name . '"><img src="' . $thumb_file_location . '" alt="' . $file_name . '"></a>' . $delete_control . $category_preview_control . '</li>';
			}
			$HTML_cup .= '</ul>';
		}
		else
		{
			$HTML_cup = '<p>' . $translator->string('There are no files in:') . ' <b>' . space_or_dash('-', $requested_category) . '</b></p>';
		}
	}
	else
	{
		header("HTTP/1.0 500 Internal Server Error");
		echo '<!doctype html><html><head></head><body><h1>Error</h1><p>Invalid category</p></body></html>';
		exit();
	}
}
else
{ // If no category was requested
	// <<<<<<<<<<<<<<<<<<<<
	// Fetch categories, and require them in a HTML ul list
	// >>>>>>>>>>>>>>>>>>>>
	$requested_category      = $translator->string('Categories');
	$categories              = list_directories($ignored_categories_and_files);
	if (count($categories) >= 1)
	{
		$HTML_cup                = '<ul id="categories">';
		foreach ($categories as & $category_name)
		{
			if (isset($_SESSION["password"]))
			{
				$delete_control          = '<a href="admin.php?delete=' . $category_name . '" class="delete"><img src="delete.png" alt="delete" style="width:30px;height:30px;"></a>';
			}
			else
			{
				$delete_control          = '';
			}
			$category_preview_images = category_previews($category_name, $ignored_categories_and_files, $category_json_file);
			// echo 'cats:'.$category_preview_images; // Testing category views
			$HTML_cup .= '<li><div class="preview_images">' . $category_preview_images . '</div><div class="category"><a href="index.php?category=' . $category_name . '" class=""><span>' . space_or_dash('-', $category_name) . '</span></a></div>' . $delete_control . '</li>';
		}
		$HTML_cup .= '</ul>';
	}
	else
	{
		$HTML_cup        = '<p>' . $translator->string('There are no categories yet...') . '</p>';
	}
}
$HTML_navigation = '<ol class="flexbox">' . $HTML_navigation . '</ol>';

// ====================
// Functions
// ====================
function space_or_dash($replace_this    = '-', $in_this)
{
	if ($replace_this == '-')
	{
		return preg_replace('/([-]+)/', ' ', $in_this);
	}
	elseif ($replace_this == ' ')
	{
		return preg_replace('/([ ]+)/', '-', $in_this);
	}
}

function list_files($settings, $ignored_categories_and_files)
{
	$directory        = BASE_PATH . $_GET['category'];
	$thumbs_directory = BASE_PATH . 'thumbnails/' . $_GET['category'];
	$item_arr         = array_diff(scandir($directory) , array(
		'..',
		'.'
	));
	foreach ($item_arr as $key          => $value)
	{
		if ((is_dir($directory . '/' . $value)) || (isset($ignored_categories_and_files["$value"])))
		{
			unset($item_arr["$key"]);
		}
		else
		{
			$path_to_file = $thumbs_directory . '/thumb-' . $value;
			if (file_exists($path_to_file) !== true)
			{
				createThumbnail($value, $directory, $thumbs_directory, 400, 400);
			}
		}
	}
	return $item_arr;
}

function category_previews($category, $ignored_categories_and_files, $category_json_file)
{
	$thumbs_directory = BASE_PATH . 'thumbnails/' . $category;
	$previews_html    = '';

	if (file_exists($thumbs_directory))
	{

		if (file_exists($thumbs_directory . '/' . $category_json_file))
		{
			$category_data    = json_decode(file_get_contents($thumbs_directory . '/' . $category_json_file) , true);

			$previews_html    = '<div style="background:url(thumbnails/' . $category . '/' . rawurlencode($category_data['preview_image']) . ');" class="category_preview_img"></div>';

		}
		else
		{
			// Automatically try to select preview image if none was choosen
			$item_arr         = array_diff(scandir($thumbs_directory) , array(
				'..',
				'.'
			));
			foreach ($item_arr as $key              => $value)
			{
				// if ((is_dir($thumbs_directory . '/' . $value)) || (isset($ignored_categories_and_files["$value"]))) {
				// unset($item_arr["$key"]);
				// } else {
				$previews_html    = '<div style="background:url(thumbnails/' . $category . '/' . rawurlencode($item_arr["$key"]) . ');" class="category_preview_img"></div>'; // add a dot in front of = to return all images
				//}
				
			}
			$category_data    = json_encode(array(
				'preview_image' => $item_arr["$key"]
			));
			file_put_contents($thumbs_directory . '/' . $category_json_file, $category_data);
		}
	}
	return $previews_html;
}

function list_directories($ignored_categories_and_files)
{
	$item_arr = array_diff(scandir(BASE_PATH) , array(
		'..',
		'.'
	));
	foreach ($item_arr as $key => $value)
	{
		if ((is_dir(BASE_PATH . '/' . $value) == false) || (isset($ignored_categories_and_files["$value"])))
		{
			unset($item_arr["$key"]);
		}
	}
	return $item_arr;
}

function createThumbnail($filename, $source_directory, $thumbs_directory, $max_width, $max_height)
{
	$path_to_source_file = $source_directory . '/' . $filename;
	$path_to_thumb_file  = $thumbs_directory . '/thumb-' . $filename;
	$source_filetype     = exif_imagetype($path_to_source_file);
	if (file_exists($thumbs_directory) !== true)
	{
		if (!mkdir($thumbs_directory, 0777, true))
		{
			echo $translator->string('Error: The thumbnails directory could not be created.');
			exit();
		}
		else
		{
			chmod($thumbs_directory, 0777); // On some hosts, we need to change permissions of the directory using chmod
			// after creating the directory
			
		}
	}
	// Create the thumbnail ----->>>>
	list($orig_width, $orig_height)          = getimagesize($path_to_source_file);
	$width   = $orig_width;
	$height  = $orig_height;

	if ($height > $max_height)
	{ // taller
		$width   = ($max_height / $height) * $width;
		$height  = $max_height;
	}

	if ($width > $max_width)
	{ // wider
		$height  = ($max_width / $width) * $height;
		$width   = $max_width;
	}

	$image_p = imagecreatetruecolor($width, $height);

	switch ($source_filetype)
	{
		case IMAGETYPE_JPEG:
			$image   = imagecreatefromjpeg($path_to_source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
			imagejpeg($image_p, $path_to_thumb_file);
		break;
		case IMAGETYPE_PNG:
			$image = imagecreatefrompng($path_to_source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
			imagepng($image_p, $path_to_thumb_file);
		break;
		case IMAGETYPE_GIF:
			$image = imagecreatefromgif($path_to_source_file);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
			imagegif($image_p, $path_to_thumb_file);
		break;
		default:
			echo $translator->string('Unknown filetype. Supported filetypes are: JPG, PNG og GIF.');
			exit();
	}
}

require BASE_PATH . 'templates/' . $template . '/category_template.php';

?>
