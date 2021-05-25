<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif Formular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>


    <main>
        <form method="post" action="<?php echo $_SERVER["tarifberechnung.php"]; ?>">

            <?php
                $tarifOptionen = [
                    ['Tarif A'] => [3, 0.16],
                    ['Tarif B'] => [6, 0.14],
                    ['Tarif C'] => [12, 0.12],
                ];

                foreach($tarifOptionen as [$key]=>$option) {
                    echo "
                    <strong>$key</strong><br>
                    <em>Grundtarif pro Monat</em><br>
                    <input type='number' name='grundTarifMonat$key' value='$option[0]'>
                    <br/>
                    <em>Arbeitstarif</em><br>
                    <input type='number' name='arbeitsTarif$key' value='$option[1]'>
                    ";
                }
            ?>

            <input type="submit" value="Daten absenden" name="senden">
        </form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>