<?php

require_once  "modeli/zemlja.php";
require_once  "configuration/baza.php";
require_once   "modeli/sportisti.php";


$zemlja = new zemlja();


$ukupno = $zemlja->getAllMedalsForCountry("Srbija");

echo "Ukupno medalja za Srbiju: $ukupno";

$sportistaObjekat=new sportisti();
$sportisti_iz_Srbije=$sportistaObjekat->prikaziSportisteZaZemlju(10);
foreach ($sportisti_iz_Srbije as $sportisti){

    echo $sportisti['ime']."".$sportisti['prezime']."<br>";
}

$s=new sportisti();
$lista=$s->brojMedaljaPoSportisti ();
foreach ($lista as $red) {
    echo $red['ime']."".$red['prezime']."Ukupno medalja:". $red['broj_medalja']. "<br>";
}





















