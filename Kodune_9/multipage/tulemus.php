<?php require_once('head.html');
require_once('pildid.php');
$link ='';
?>
	<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
		<?php if (!empty($_GET)) {

            foreach ($pildid as &$value) {
                if ($value['alt'] == $_GET["nimi"]){
                    $link = $value['src'];
                }
            }

			if ($_GET["nimi"] != "") {
				echo "Valisite pildi nimega ".htmlspecialchars($_GET["nimi"])."</br>";
				echo "</br>";
				echo "<div id=\"gallery\"><img src=\"".$link."\" alt=\"".$_GET["nimi"]."\" /> </div>";
			}
		}
		else {
			echo "Teil ununes pilt valimata! Minge tagasi hääletamise lehele ja valige oma lemmik pilt!";
		}
		?>

	</p>

</div>
<?php require_once('foot.html') ?>

