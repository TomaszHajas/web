<!DOCTYPE html>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head><title>Randomizer</title></head>

<body>


<?php
echo "<br>";
echo "Random Items:";
echo "<br>";
for ($x = 0; $x < 3; $x++) {
	$materials = file("materials.txt");
	$items = file("items.txt"); 
	$item_adjectives = file("item_adjectives.txt");
	$material = strtolower($materials[rand(0, count($materials) - 1)]);
	$item = strtolower($items[rand(0, count($items) - 1)]);
	$item_adjective = strtolower($item_adjectives[rand(0, count($item_adjectives) - 1)]);

	echo '- '.$item_adjective.' '.$item.' enriched with '.$material;
	echo "<br>";
}
echo "<br>";
echo "Random Magic Items:";
echo "<br>";
for ($x = 0; $x < 3; $x++) {
	$materials = file("materials.txt");
	$potions = file("potions.txt"); 
	$item_adjectives = file("item_adjectives.txt");
	$material = strtolower($materials[rand(0, count($materials) - 1)]);
	$potion = strtolower($potions[rand(0, count($potions) - 1)]);
	$item_adjective = strtolower($item_adjectives[rand(0, count($item_adjectives) - 1)]);

	echo '- '.$item_adjective.' '.$potion.' enriched with '.$material;
	echo "<br>";
}
echo "<br>";
echo "Random People:";
echo "<br>";
$anglo_saxon_prefixes = file("anglo_saxon_prefixes.txt");
$germanic_prefixes = file("germanic_prefixes.txt");
$hindu_prefixes = file("hindu_prefixes.txt");
$anglo_saxon_suffixes = file("anglo_saxon_suffixes.txt");
$germanic_suffixes = file("germanic_suffixes.txt");
$hindu_suffixes = file("hindu_suffixes.txt");

$anglo_saxon_prefix = substr($anglo_saxon_prefixes[rand(0, count($anglo_saxon_prefixes) - 1)], 0, -2);
$germanic_prefix = substr($germanic_prefixes[rand(0, count($germanic_prefixes) - 1)], 0, -2);
$hindu_prefix = substr($hindu_prefixes[rand(0, count($hindu_prefixes) - 1)], 0, -2);
$anglo_saxon_suffix = strtolower($anglo_saxon_suffixes[rand(0, count($anglo_saxon_suffixes) - 1)]);
$germanic_suffix = strtolower($germanic_suffixes[rand(0, count($germanic_suffixes) - 1)]);
$hindu_suffix = strtolower($hindu_suffixes[rand(0, count($hindu_suffixes) - 1)]);

for ($x = 0; $x < 3; $x++) {
	$name = $anglo_saxon_prefix.''.$anglo_saxon_suffix;
	switch ($x) {
		case 0:
			$name = $anglo_saxon_prefix.''.$anglo_saxon_suffix;
			break;
		case 1:
			$name = $germanic_prefix.''.$germanic_suffix;
			break;
		case 2:
			$name = $hindu_prefix.''.$hindu_suffix;
			break;
	}
	$person_adjectives = file("person_adjectives.txt");
	$races = file("races.txt"); 
	$personalities = file("personalities.txt");
	$person_adjective = strtolower($person_adjectives[rand(0, count($person_adjectives) - 1)]);
	$race = strtolower($races[rand(0, count($races) - 1)]);
	$personality = strtolower($personalities[rand(0, count($personalities) - 1)]);
	
	echo '- '.$name.', '.$person_adjective.' and '.$personality.' '.$race;
	echo "<br>";
}
echo "<br>";
echo "Random Places:";
echo "<br>";
for ($x = 0; $x < 3; $x++) {
	$place_adjectives = file("place_adjectives.txt");
	$places = file("places.txt"); 
	$structures = file("structures.txt");
	$place_adjective1 = strtolower($place_adjectives[rand(0, count($place_adjectives) - 1)]);
	$place_adjective2 = strtolower($place_adjectives[rand(0, count($place_adjectives) - 1)]);
	$place = strtolower($places[rand(0, count($places) - 1)]);
	$structure = strtolower($structures[rand(0, count($structures) - 1)]);

	echo '- '.$place_adjective1.' '.$structure.' in '.$place_adjective2.' '.$place;
	echo "<br>";
}
?>

</body>