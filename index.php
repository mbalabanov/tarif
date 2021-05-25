<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarif Formular</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
	<main class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1>Verbrauch</h1>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<select class="form-select" id="verbrauch" name="verbrauch">
									<option value="100">100 kWh</option>
									<option value="2000">2000 kWh</option>
									<option value="5000">5000 kWh</option>
								</select>
							</div>
						</div>

						<div class="col-6">
							<input type="submit" class="btn btn-primary" value="Daten absenden">
						</div>
					</div>
				</form>

				<?php

				$tarifA = [3, 0.16];
				$tarifB = [6, 0.14];
				$tarifC = [12, 0.12];

				//Ausgabe der geposteten Daten
				if (isset($_POST['verbrauch'])) {

					$verbrauch = $_POST['verbrauch'];

					$tarifAKosten = $verbrauch * $tarifA[1] + 12 * $tarifA[0];
					$tarifBKosten = $verbrauch * $tarifB[1] + 12 * $tarifB[0];
					$tarifCKosten = $verbrauch * $tarifC[1] + 12 * $tarifC[0];


					echo "<p class='mt-4 text-info'>Ihr <strong>Verbrauch</strong> beträgt: " .
						$verbrauch
						. " kWh.</p>"
						. "<div class='row'><div class='col-md-8'><div class='alert alert-primary text-center' role='alert'>"
						. "Ihre Kosten für <strong>Tarif A</strong> betragen: " . $tarifAKosten . "€<br/>"
						. "Ihre Kosten für <strong>Tarif B</strong> betragen: " . $tarifBKosten . "€<br/>"
						. "Ihre Kosten für <strong>Tarif C</strong> betragen: " . $tarifCKosten . "€</div></div></div>";

					if ($tarifAKosten <= $tarifBKosten && $tarifAKosten <= $tarifCKosten) {
						echo "<div class='row'><div class='col-md-8'><div class='alert alert-success text-center' role='alert'><strong>Tarif A</strong> ist mit $tarifAKosten € der günstigte Tarif.</div></div></div>";
					} elseif ($tarifBKosten <= $tarifAKosten && $tarifBKosten <= $tarifCKosten) {
						echo "<div class='row'><div class='col-md-8'><div class='alert alert-success text-center' role='alert'><strong>Tarif B</strong> ist mit $tarifBKosten € der günstigte Tarif.</div></div></div>";
					} else {
						echo "<div class='row'><div class='col-md-8'><div class='alert alert-success text-center' role='alert'><strong>Tarif C</strong> ist mit $tarifCKosten € der günstigte Tarif.</div></div></div>";
					}
				}

				?>
			</div>
		</div>

	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>