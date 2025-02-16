<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
$file = json_decode(file_get_contents("json/tarot_card_data.json"));

$cards = $file->cards;
$seed;

// Iterator for card id's
$iterator = 1;
// Attach image url to each card
foreach($cards as $card) {
  $card->imageURL = "https://geraldburke.com/apis/plateautarot/images/".$card->name.".jpg";
  $card->cardBack = "https://geraldburke.com/apis/plateautarot/images/Card Back.jpg";
  $card->id = $iterator;
  $iterator++;
}

if (isset($_GET["seed"])) {
   $seed = $_GET["seed"];
}
else {
   $seed = rand();
}

// Apply Fisher-Yates shuffle to deck
for($i = 0; $i < sizeof($cards); ++$i) {
   srand($seed);
   $r = rand(0, $i);
   $tmp = $cards[$i];
   $cards[$i] = $cards[$r];
   $cards[$r] = $tmp;  
}

// Returns card with matching id
if (isset($_GET["id"])) {
  foreach ($cards as $card) {
    if ($card->id == $_GET["id"]){
      echo json_encode($card);
      die();
    }
  }
  echo "Card not found";
  die();
}

// Returns all cards of matching arcana
if (isset($_GET["arcana"])) {
    $selection = [];
    foreach ($cards as $card) {
        if (strtolower($card->arcana) == strtolower($_GET["arcana"])) {
            array_push($selection, $card);
        }
    }
    if (count($selection) < 1) {
        echo "Invalid Arcana";
        die();
    }
    $cards = $selection;
}

// Returns all cards of matching suit
if (isset($_GET["suit"])) {
    $selection = [];
    foreach ($cards as $card) {
        if (strtolower($card->suit) == strtolower($_GET["suit"])) {
            array_push($selection, $card);
        }
    }
    if (count($selection) < 1) {
        echo "Invalid Suit";
        die();
    }
    $cards = $selection;
}

// Returns n number of cards
if (isset($_GET["count"])) {
    try {
        if ($_GET["count"] > 78 || $_GET["count"] < 1) {
            echo "Invalid Number";
            die();
        }
        $selection = [];
        for ($i = 0; $i < $_GET["count"]; $i++) {
            array_push($selection, $cards[$i]);
        }
        $cards = $selection;
    } catch (Exception $e) {
        echo "Not a number!";
        die();
    }
}

$file->seed = $seed;
$file->cards = $cards;

echo json_encode($file);

?>