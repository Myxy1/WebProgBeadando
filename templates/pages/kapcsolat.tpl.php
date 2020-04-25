 <h1>Kapcsolat</h1>
 <center><p>
 <strong>Egyesületünk</strong><br>
Budaörsi Brazil Jiu Jitsu és Judo Integrált Küzdősport Egyesület<br>
2040 Budaörs Károly Király út 145. <br>adószám: 18296824-1-13   számlaszám: 
11600006-00000000-60110538
</p></center>
<center><p>
<strong>Kapcsolat</strong>
<br>Szekeres Ákos <br>
+36-70-344-7434 <br>szekeres.akos.zoltan@gmail.com<br>  www.facebok.com/bjjbudaors </center></p>
 <h3>Üzenetküldés csak bejelentkezve érhető el!</h3>
<?php if(isset($_SESSION['login'])): ?>			
    <form name="kapcsolat" action="?oldal=kapcsolat1" onsubmit="return ellenoriz();" method="post">   
        <div>
            <label><input type="text" id="nev" name="nev" size="35" maxlength="40">Név (minimum 5 karakter) </label>
            <br/>
            <label><input type="text" id="email" name="email" size="35" maxlength="40">E-mail (kötelező) </label>
            <br/>
            <label><textarea id="szoveg" name="szoveg" cols="40" rows="10"></textarea>Üzenet (kötelező)  </label>
            <br/>
            <input id="kuld" type="submit" value="Küld">
            <button onclick="ellenoriz();" type="button">Ellenőriz</button>
        </div>
    </form>
<?php endif ?>	