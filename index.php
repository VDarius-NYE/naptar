<?php
    //egy soros
    #egy soror
    /**több
     * soros
     * komment
     */
    //phpinfo()

    /**
     * PHP nyitó tag: <?php
     * PHP záró tag: ?>
     * 
     * PHP gyengén típusos szkriptnyelv
     * nincs szükség a változók deklarálására
     * minden változó $ jellel kezdődik
     * változzó neve nem kezdődhet számmal csak _ engedélyezett mint speciális karakter, kis- és nagybetű pedig különbözik
     * 
     * ADATTíPUSOK:
     * egyszerű: string, boolean, int, float
     * összetett: array, object
     * 
     * TÖMB
     * 1. Sorszámozott
     *  indexelése egész számmal történik 0-tól, automatikus, de felülbírálható
     * 2. Társításos, asszociatív tömbök
     *  indexelése string típussal történik
     * 
     * VEZÉRLÉSI SZERKEZETEK
     *  szekvencia
     * iteráció - ciklusok
     * 
     *  while(feltétel)
     *  {
     *      ciklusmag;
     *  }
     * 
     *  for($i=0;$i<=100;$i++)
     *  {
     *      (post inkrementálás):   $i++;
     *      (pre inkrementálás):    ++$i;
     *      (post dekrementálás):   $i--;
     *      (pre dekrementálás):    --$i;
     *  }
     *  Tömbök bejárása (tömb indexhez érték hozzárendelés =>)
     *  foreach($tomb as [$index=>]$ertek)
     *  {
     *      ciklusmag;
     *  }
     * 
     * ELÁGAZÁSOK:
     *  if(logikai feltétel(ek))
     *  {
     *      igaz:
     *  }
     *  [elseif(logikai feltétel(ek))]
     *  [else]
     * 
     *  switch($a)
     *  {
     *      case 'ertek1': utasitasok; break;
     *      case 'ertek2': utasitasok; break;
     *      [default:]
     *  }
     * 
     *  3 tényezős ? művelet, értékadás és kiiratás esetén használható
     *  $a = logikaifeltétel(ek)?'igaz érték':'hamis érték';
     * 
     * HIBAÜZENETEK
     * 1. Notice - megjegyzés
     *      ismeretlen változóra hivatkozás, nem végzetes a hiba, az oldal tovább működik, @ jellel eltakarható
     * 2. Warning - figyelmeztetés
     *      kivezetésre kerülő belső függvény hívásakor
     *      rossz adatszerkezetű változó használata vezérlési szerkezetben
     *      nem végzetes a hiba, az oldal tovább működik, nem eltakarható
     * 3. Fatal error, Parse error
     *      szintaktikai hiba, jogosúltsági hiba, nem létező erőforrás
     *      végzetes hiba, az oldal nem működik tovább
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Regisztráció</div>
            <div class="card-body"></div>
            <form>
                    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="vezeteknev" id="vezeteknev" placeholder="Vezetéknév" class="form-control">
                            <label for="vezeteknev">Vezetéknév</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="keresztnev" id="keresztnev" placeholder="Keresztnév" class="form-control">
                            <label for="keresztnev">Keresztnév</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="felhasznalonev" id="felhasznalonev" placeholder="Felhasználonév" class="form-control">
                            <label for="felhasznalonev">Felhasználónév</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="jelszo" id="jelszo" placeholder="Jelszó" class="form-control">
                            <label for="jelszo">Jelszó</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="jelszo_ujra" id="jelszo_ujra" placeholder="Jelszó újra" class="form-control">
                            <label for="jelszo_ujra">Jelszó újra</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="szuletesi_ev" id="szuletesi_ev" class="form-select">
                                <option value="">-- Év választása --</option>
                                <?php for($i=date('Y')-100;$i<=date('Y')-10;$i++): ?>

                                    <option value="<?=$i?>"><?=$i?></option>

                                <?php endfor; ?>
                            </select>
                            <label for="szuletesi_ev">Születési év</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="neme" id="inlineRadio1" value="Nő" checked>
                            <label class="form-check-label" for="inlineRadio1">Nő</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="neme" id="inlineRadio2" value="Férfi">
                            <label class="form-check-label" for="inlineRadio2">Férfi</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <textarea name="bemutatkozas" id="bemutatkozas" class="form-control" placeholder="Bemutatkozás"></textarea>
                            <label for="bemutatkozas">Bemutatkozás</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="hirlevel" name="hirlevel" value="1">
                            <label class="form-check-label" for="hirlevel">Hírlevél</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="GDPR" name="GDPR" value="1">
                            <label class="form-check-label" for="GDPR">GDPR</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="button">Regisztráció</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</body>
</html>