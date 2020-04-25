<?php
    include('szures.php');
    $uzenet = array();   

    // Űrlap ellenőrzés:
    if (isset($_POST['kuld'])) {
        /*
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        */
        $fajlok = $_FILES["fajlok"];
        for($i = 0; $i < count($fajlok["name"]); $i++) {
            if ($fajlok['error'][$i] == 4) 
                $uzenet[] = "Nem töltött fel fájlt.";
            elseif ($fajlok['error'][$i] == 1   
                        or $fajlok['error'][$i] == 2   
                        or $fajlok['size'][$i] > $MAXMERET) 
                $uzenet[] = " Maximum 1920x1080 méretű képet lehet feltölteni. " ;
            elseif (!in_array($fajlok['type'][$i], $MEDIATIPUSOK))
                $uzenet[] = " Csak jpg, vagy png formátumot lehet feltölteni. " ;
            else {
                $vegsohely = $MAPPA.strtolower($fajlok['name'][$i]);
                if (file_exists($vegsohely))
                    $uzenet[] = " 1 képet csak egyszer lehet feltölteni. " ;
				    
                else {
                    move_uploaded_file($fajlok['tmp_name'][$i], $vegsohely);
					
					
                }
            }
        }
    }
?>

