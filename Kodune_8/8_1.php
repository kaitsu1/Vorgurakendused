<!DOCTYPE html>
<html>
	<head>
		<title>Kodutöö 8 1.ülesanne</title>
		<meta charset="UTF-8">
            <?php
            $text = "";
            if (isset($_POST['text'])) {
                $text=htmlspecialchars($_POST['text']);
            }
            $taust = "#ffffff";
            if (isset($_POST['taustavarv']) && $_POST['taustavarv']!="") {
                $taust=htmlspecialchars($_POST['taustavarv']);
            }
            $tekst = "#ffffff";
            if (isset($_POST['tekstivarv']) && $_POST['tekstivarv']!="") {
                $tekst=htmlspecialchars($_POST['tekstivarv']);
            }
            $laius = 0;
            if (isset($_POST['joonelaius']) && $_POST['joonelaius']!="") {
                $laius=htmlspecialchars($_POST['joonelaius']);
            }
            $piirjoon = "solid";
            if (isset($_POST['piirjoon']) && $_POST['piirjoon']!="") {
                $piirjoon=htmlspecialchars($_POST['piirjoon']);
            }
            $joonevarv = "#ffffff";
            if (isset($_POST['joonevarv']) && $_POST['joonevarv']!="") {
                $joonevarv=htmlspecialchars($_POST['joonevarv']);
            }
            $jooneraadius = 0;
            if (isset($_POST['jooneraadius']) && $_POST['jooneraadius']!="") {
                $jooneraadius=htmlspecialchars($_POST['jooneraadius']);
            }
        ?> 
        <style>
            #textarea {
                background: <?php echo $taust; ?>;
                color: <?php echo $tekst; ?>;
                border-width: <?php echo $laius; ?>px;
                border-style: <?php echo $piirjoon; ?>;
                border-color: <?php echo $joonevarv; ?>;
                border-radius: <?php echo $jooneraadius; ?>px;
            }
        </style>
    
	</head>
	<body>
        <p> Tulemus ilmus siia rea alla:</p>
        <p id = textarea>
            <?php echo $text; ?>
        </p>
        <hr/>
        
		<form action="8_1.php" method="POST">
            <textarea name="text" cols="20" rows="3" placeholder="Kirjuta näidistekst siia ja vali kujundus"></textarea><br/>
            <hr>
            <input name="taustavarv" type="color">Taustavärvus<br/>
            <input name="tekstivarv" type="color">Tekstivärvus<br/>
            <hr>
            <div>
                  <p>Piirjoone seaded:</p>
                      <label><input type="number" name="joonelaius" min="1" max="10" default="2"/>Piirjoone laius (1-10px)</label><br/>
                      <label><select name="piirjoon">
                        <option value="solid">solid</option>
                        <option value="dotted">dotted</option>
                        <option value="dashed">dashed</option>
                        <option value="double">double</option>
                      </select>Piirjoone stiil</label><br/>

                      <label><input type="color" name="joonevarv" />Piirjoone värvus</label><br/>
                      <label><input type="number" name="jooneraadius" min="0" max="100" />Piirjoone nurga raadius (0-100px)</label><br/>
            </div>
            <hr>
            <input type="submit" value="Esita">
        </form>
    
	</body>
</html>