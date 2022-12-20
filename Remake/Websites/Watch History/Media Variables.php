<?php 

$media_type_separator = " - ";

$media_type_names = array(
	Null,
	"Animes",
	"Cartoons",
	"Series",
	"Movies",
	"Videos",
);

$media_type_names_without_null = array(
	"Animes",
	"Cartoons",
	"Series",
	"Movies",
	"Videos",
);

$media_type_names_english = array(
	Null,
	"Anime",
	"Cartoon",
	"Series",
	"Movie",
	"Video",
);

$media_type_names_english_plural = array(
	Null,
	"Animes",
	"Cartoons",
	"Series",
	"Movies",
	"Videos",
);

$media_type_names_portuguese = array(
	Null,
	"Anime",
	"Desenho",
	"Série",
	"Filme",
	"Vídeo",
);

$media_type_names_portuguese_plural = array(
	Null,
	"Animes",
	"Desenhos",
	"Séries",
	"Filmes",
	"Vídeos",
);

$anime_media_type_number = 1;
$anime_media_type = $media_type_names[$anime_media_type_number];
$anime_media_type_english = $media_type_names_english[$anime_media_type_number];
$anime_media_type_portuguese = $media_type_names_portuguese[$anime_media_type_number];
$anime_media_type_english_plural = $media_type_names_english_plural[$anime_media_type_number];
$anime_media_type_portuguese_plural = $media_type_names_portuguese_plural[$anime_media_type_number];

$cartoon_media_type_number = 2;
$cartoon_media_type = $media_type_names[$cartoon_media_type_number];
$cartoon_media_type_english = $media_type_names_english[$cartoon_media_type_number];
$cartoon_media_type_portuguese = $media_type_names_portuguese[$cartoon_media_type_number];
$cartoon_media_type_english_plural = $media_type_names_english_plural[$cartoon_media_type_number];
$cartoon_media_type_portuguese_plural = $media_type_names_portuguese_plural[$cartoon_media_type_number];

$series_media_type_number = 3;
$series_media_type = $media_type_names[$series_media_type_number];
$series_media_type_english = $media_type_names_english[$series_media_type_number];
$series_media_type_portuguese = $media_type_names_portuguese[$series_media_type_number];
$series_media_type_english_plural = $media_type_names_english_plural[$series_media_type_number];
$series_media_type_portuguese_plural = $media_type_names_portuguese_plural[$series_media_type_number];

$movie_media_type_number = 4;
$movie_media_type = $media_type_names[$movie_media_type_number];
$movie_media_type_english = $media_type_names_english[$movie_media_type_number];
$movie_media_type_portuguese = $media_type_names_portuguese[$movie_media_type_number];
$movie_media_type_english_plural = $media_type_names_english_plural[$movie_media_type_number];
$movie_media_type_portuguese_plural = $media_type_names_portuguese_plural[$movie_media_type_number];

$video_media_type_number = 5;
$video_media_type = $media_type_names[$video_media_type_number];
$video_media_type_english = $media_type_names_english[$video_media_type_number];
$video_media_type_portuguese = $media_type_names_portuguese[$video_media_type_number];
$video_media_type_english_plural = $media_type_names_english_plural[$video_media_type_number];
$video_media_type_portuguese_plural = $media_type_names_portuguese_plural[$video_media_type_number];

$language_media_types = Language_Item_Definer($media_type_names_english, $media_type_names_portuguese);
$language_plural_media_types = Language_Item_Definer($media_type_names_english_plural, $media_type_names_portuguese_plural);

$mixed_media_type_names = array(
	Null,
	$anime_media_type,
	$cartoon_media_type_english.$media_type_separator.$cartoon_media_type_portuguese,
	$series_media_type_english.$media_type_separator.$series_media_type_portuguese,
	$movie_media_type_english.$media_type_separator.$movie_media_type_portuguese,
	$video_media_type_english.$media_type_separator.$video_media_type_portuguese,
);

$mixed_media_type_names_plural = array(
	Null,
	$anime_media_type,
	$cartoon_media_type_english_plural.$media_type_separator.$cartoon_media_type_portuguese_plural,
	$series_media_type_english_plural.$media_type_separator.$series_media_type_portuguese_plural,
	$movie_media_type_english_plural.$media_type_separator.$movie_media_type_portuguese_plural,
	$video_media_type_english_plural.$media_type_separator.$video_media_type_portuguese_plural,
);

$mixed_media_type_names_plural_without_null = array(
	$anime_media_type,
	$cartoon_media_type_english_plural.$media_type_separator.$cartoon_media_type_portuguese_plural,
	$series_media_type_english_plural.$media_type_separator.$series_media_type_portuguese_plural,
	$movie_media_type_english_plural.$media_type_separator.$movie_media_type_portuguese_plural,
	$video_media_type_english_plural.$media_type_separator.$video_media_type_portuguese_plural,
);

$mixed_media_type_names_plural_dict = array("Null" => Null);

$i = 1;
foreach ($media_type_names_without_null as $media_type) {
	$mixed_media_type_names_plural_dict[$media_type] = $mixed_media_type_names_plural[$i];

	$i++;
}

$mixed_media_type_anime = $mixed_media_type_names[$anime_media_type_number];
$mixed_media_type_cartoon = $mixed_media_type_names[$cartoon_media_type_number];
$mixed_media_type_series = $mixed_media_type_names[$series_media_type_number];
$mixed_media_type_movie = $mixed_media_type_names[$movie_media_type_number];
$mixed_media_type_video = $mixed_media_type_names[$video_media_type_number];

$mixed_media_type_anime_plural = $mixed_media_type_names_plural[$anime_media_type_number];
$mixed_media_type_cartoon_plural = $mixed_media_type_names_plural[$cartoon_media_type_number];
$mixed_media_type_series_plural = $mixed_media_type_names_plural[$series_media_type_number];
$mixed_media_type_movie_plural = $mixed_media_type_names_plural[$movie_media_type_number];
$mixed_media_type_video_plural = $mixed_media_type_names_plural[$video_media_type_number];

$media_type_names_portuguese_dict = array("Null" => Null);

$i = 1;
foreach ($media_type_names_without_null as $media_type) {
	$media_type_names_portuguese_dict[$media_type] = $media_type_names_portuguese[$i];

	$i++;
}

?>