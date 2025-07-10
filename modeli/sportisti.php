<?php

class sportisti extends  baza {


    public function save($ime,$prezime,$sport,$pol,$zemlja_id,$osvojena_medalja,$broj_ucesca,$datum_osvajanja,$visina,$tezina)
    {
        $baza=mysqli_connect("localhost","root","","olimpijada");
        $ime=$baza->real_escape_string($ime);
        $prezime=$baza->real_escape_string($prezime);
        $sport=$baza->real_escape_string($sport);
        $pol=$baza->real_escape_string($pol);
        $zemlja_id=$baza->real_escape_string($zemlja_id);
        $osvojena_medalja=$baza->real_escape_string($osvojena_medalja);
        $broj_ucesca=$baza->real_escape_string($broj_ucesca);
        $datum_osvajanja=$baza->real_escape_string($datum_osvajanja);
        $visina=$baza->real_escape_string($visina);
        $tezina=$baza->real_escape_string($tezina);
        $baza->query("INSERT INTO sportisti (ime,prezime,sport,pol,zemlja_id,osvojena_medalja,broj_ucesca,datum_osvajanja,visina,tezina) 
VALUES('$ime','$prezime','$sport','$pol','$zemlja_id','$osvojena_medalja','$broj_ucesca','$datum_osvajanja','$visina','$tezina')");

    }

    public function prikaziSportisteZaZemlju($zemlja_id)
    {

        $baza=mysqli_connect("localhost","root","","olimpijada");
        $zemlja_id=$baza->real_escape_string($zemlja_id);
        $rezultat=$baza->query("SELECT * FROM sportisti WHERE zemlja_id=$zemlja_id");


        return $rezultat->fetch_all(MYSQLI_ASSOC);
    }
    public function  brojMedaljaPoSportisti()
    {
      $baza=mysqli_connect("localhost","root","","olimpijada");
      $rezultat=$baza->query("SELECT ime,prezime,COUNT(osvojena_medalja)AS broj_medalja
      FROM sportisti 
      WHERE osvojena_medalja IS NOT NULL 
      GROUP BY ime,prezime
      ");
      return $rezultat->fetch_all(MYSQLI_ASSOC);
    }

}

