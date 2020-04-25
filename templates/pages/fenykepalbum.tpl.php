<?php
    // Alkalmazás logika:
    include('szures.tpl.php');
    
    // adatok összegyűjtése:    
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
 ?>
 			    <h1>Feltöltés a fényképalbumba:</h1><p>(csak bejelentkezve elérhető)</p>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>
<?php if(isset($_SESSION['login'])): ?>
    <form action="?oldal=feltoltes"  method="post"
                enctype="multipart/form-data">
        <input type="hidden" name="max_file_size" value="1100000">
        <label>Fájlok:
            <input type="file" name="fajlok[]" accept="image/png, image/jpeg" multiple required>
        </label>
        <input type="submit" name="kuld">
      </form>
<?php endif ?>	 
	  
	 

<center>
    <h1>Fényképalbum</h1>  
    <?php

    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <p>Név:  <?php echo $fajl; ?></p>
            <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
	</center>
      