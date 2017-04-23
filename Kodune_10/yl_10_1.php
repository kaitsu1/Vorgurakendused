<?php
// algväärtused:
$taust='white';
$joon='blue';
$laius='2';
$nurk='10';
$joonestiil='solid';
$tekst = 'Siia sisesta tekst';
$tekstivarvus = 'blue';
//muuda, kui sisend on antud:
if (!empty($_POST)) {
    if (isset($_POST['taust']) && $_POST['taust'] != "") {
        $taust = htmlspecialchars($_POST['taust']);
    }
    if (isset($_POST['tekstivarvus']) && $_POST['tekstivarvus'] != "") {
        $tekstivarvus = htmlspecialchars($_POST['tekstivarvus']);
    }
    if (isset($_POST['nurk']) && $_POST['nurk'] != "") {
        $nurk = htmlspecialchars($_POST['nurk']);
    }
    if (isset($_POST['laius']) && $_POST['laius'] != "") {
        $laius = htmlspecialchars($_POST['laius']);
    }
    if (isset($_POST['joon']) && $_POST['joon'] != "") {
        $joon= htmlspecialchars($_POST['joon']);
    }
    if (isset($_POST['joonestiil']) && $_POST['joonestiil'] != "") {
        $joonestiil= htmlspecialchars($_POST['joonestiil']);
    }
    if (isset($_POST['tekst']) && $_POST['tekst'] != "") {
        $tekst = htmlspecialchars($_POST['tekst']);
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kodutöö 8 1.ülesanne</title>
		<meta charset="UTF-8">
             
        <style>
            .textarea {
                background-color: <?php echo "$taust"; ?>;
                color: <?php echo "$tekstivarvus"; ?>;
                border-width: <?php echo "$laius"; ?>px;
                border-style: <?php echo "$joonestiil"; ?>;
                border-color: <?php echo "$joon"; ?>;
                border-radius: <?php echo "$nurk"; ?>px;
            }
        </style>
    
	</head>
	<body>
        <p> Tulemus ilmus siia rea alla:</p>
        <p class = textarea>
                    <?php echo "$tekst"; ?>
        </p>
        <hr/>
        
		<form action="yl_10_1.php" method="POST">
            <textarea name="tekst" placeholder='<?php echo "$tekst";?>'><?php echo "$tekst";?></textarea><br>
            <hr>
            <input type="color" name="taust" value='<?php echo "$taust"; ?>'> Taustavärvus<br>
            <input type="color" name="tekstivarvus" value='<?php echo "$tekstivarvus"; ?>'> Tekstivärvus<br>
            <hr>
            <div>
                  <p>Piirjoone seaded:</p>
                    <input type="number" name="laius" min="0" max="20" step="1" value='<?php echo "$laius"; ?>'>Piirjoone laius (0-20px)<br>
                    <select name="joonestiil" value=' <?php echo "$joonestiil"; ?>'>
                        <option value='hidden' <?php if ($joonestiil == 'hidden' ) echo 'selected' ; ?>>hidden</option>
                        <option value='double' <?php if ($joonestiil == 'double' ) echo 'selected' ; ?>>double</option>
                        <option value='solid'  <?php if ($joonestiil == 'solid' )  echo 'selected' ; ?>>solid</option>
                        <option value='dotted' <?php if ($joonestiil == 'dotted' ) echo 'selected' ; ?>>dotted</option>
                        <option value='outset' <?php if ($joonestiil == 'outset' ) echo 'selected' ; ?>>outset</option>
                    </select><br>
                    <input type="color" name="joon" value='<?php echo "$joon"; ?>'>Piirjoone värvus<br>
                    <input type="number" step="1" name="nurk" min="0" max="100"  value='<?php echo "$nurk"; ?>'> Piirjoone nurga raadius (0-100px)<br>
            </div>
            <hr>
            <input type="submit" value="Esita">
        </form>
    
	</body>
</html>