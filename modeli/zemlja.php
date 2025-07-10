<?php

require_once "configuration/baza.php";

class zemlja extends  baza
{
    public function save($naziv, $skracenica, $broj_zlatnih, $broj_srebrnih, $broj_bronzanih)
    {
        $baza = mysqli_connect("localhost", "root", "", "olimpijada");
        $naziv = $baza->real_escape_string($naziv);
        $skracenica = $baza->real_escape_string($skracenica);
        $broj_zlatnih = $baza->real_escape_string($broj_zlatnih);
        $broj_srebrnih = $baza->real_escape_string($broj_srebrnih);
        $broj_bronzanih = $baza->real_escape_string($broj_bronzanih);

        $baza->query("INSERT INTO zemlje (naziv, skracenica, broj_zlatnih, broj_srebrnih, broj_bronzanih) 
                  VALUES ('$naziv', '$skracenica', '$broj_zlatnih', '$broj_srebrnih', '$broj_bronzanih')");


    }

    public function getAllMedalsForCountry($naziv)
    {
        $baza = mysqli_connect("localhost", "root", "", "olimpijada");

        $naziv = $baza->real_escape_string($naziv);

        $query = "SELECT SUM(broj_zlatnih + broj_srebrnih + broj_bronzanih) AS ukupno_medalja 
              FROM zemlje 
              WHERE naziv = '$naziv'";

        $rezultat = $baza->query($query);

        $rezultat = $this->conn->query($query);

        if ($rezultat && $rezultat->num_rows > 0) {
            $red = $rezultat->fetch_assoc();
            return $red['ukupno_medalja'];
        } else {
            return 0;
        }
    }



}

























