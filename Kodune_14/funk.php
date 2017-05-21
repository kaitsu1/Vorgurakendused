<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	global $connection;
	if(!empty($_SESSION["user"])){
		header("Location: ?page=loomad");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["user"] == '' || $_POST["pass"] == ''){
				$errors =array();
				if(empty($_POST["user"])) {
					
					$errors[] = "Kasutajanimi puudub!";
				}
				
				if(empty($_POST["pass"]))
					
					$errors[] = "Parooli väli on tühi!";
				}else{
					$u = mysqli_real_escape_string ($connection, $_POST["user"]);
					$p = mysqli_real_escape_string ($connection, $_POST["pass"]);
					$sql = "SELECT id FROM 10153154_kylastajad WHERE username='$u' AND passw=sha1('$p')";
					$result = mysqli_query($connection, $sql);
					$row = mysqli_num_rows($result);
					if($row){
						$_SESSION["user"] = $_POST["user"];
                        $_SESSION["roll"] = $_POST["roll"];
						header("Location: ?page=loomad");
						
					}else{
						header("Location: ?page=login");
					}
				}				
			}else{
				
			}
		}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
    global $connection;
    $puurid = array();
    $minu_puurid = "SELECT DISTINCT puur FROM 10153154_loomaaed";
    $tulemus = mysqli_query($connection, $minu_puurid);
    while($rida = mysqli_fetch_assoc($tulemus)){
        $minu_puurisisu = "SELECT id, nimi, puur, liik FROM 10153154_loomaaed WHERE puur =".$rida["puur"];
        $uustulemus = mysqli_query($connection, $minu_puurisisu);
        while ($loomarida = mysqli_fetch_assoc($uustulemus)) {
            $puurid[$rida["puur"]][] = $loomarida;
        }
    }

	include_once('views/puurid.html');
	
}

function lisa(){
		global $connection;
	
	if(empty($_SESSION["user"]) || $_SESSION["roll"] != 'admin'){
		header("Location: ?page=login");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["nimi"] == '' || $_POST["puur"] == '' ){
				$errors =array();
				if(empty($_POST["nimi"])) {
					$errors[] = "Sisesta nimi!";
				}
				if(empty($_POST["puur"])){
					$errors[] = "Sisesta puur!";
				}
				}else{
					upload('liik');
					$nimi = mysqli_real_escape_string ($connection, $_POST["nimi"]);
					$puur = mysqli_real_escape_string ($connection, $_POST["puur"]);
					$liik = mysqli_real_escape_string ($connection, "pildid/".$_FILES["liik"]["name"]);
					$sql = "INSERT INTO 10153154_loomaaed (nimi, puur, liik) VALUES ('$nimi','$puur','$liik')";
					$result = mysqli_query($connection, $sql);
					$id = mysqli_insert_id($connection);
					if($id){
						header("Location: ?page=loomad");
					}else{
						header("Location: ?page=loomavorm");
					}
				}
			}
		}
	
	include_once('views/loomavorm.html');
}

function hangi_loom($id) {
	global $connection;
	$sql = "SELECT * FROM 10153154_loomaaed WHERE id=".$id;
	$result = mysqli_query($connection, $sql) or die("Ei saanud looma kätte");
	if ($looma_andmed = mysqli_fetch_assoc($result)) {
		return $looma_andmed;
	}
	else {
		header("Location: ?page=loomad");
	}
}

function muuda() {
global $connection;
	if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
	}
	if ($_SESSION['roll'] != 'admin') {
		header("Location: ?page=loomad");
	}
	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset( $_GET['id'] ) && $_GET['id'] != "") {
		$id = $_GET['id'];
		$loom = hangi_loom(mysqli_real_escape_string($connection, $id));
	}
	else {
		header("Location: ?page=loomad");
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['muuda'])) {
			//valideerimine
			$errors = array();
			if (empty($_POST['nimi'])) {
				$errors[] = "Nimi sisestamata!";
			}
			if (empty($_POST['puur'])) {
				$errors[] = "Puur sisestamata!";
			}
			if (empty($errors)) {
				$id = $_POST['muuda'];
				$loom = hangi_loom(mysqli_real_escape_string($connection, $id));
				$loom['nimi'] = mysqli_real_escape_string($connection, $_POST["nimi"]);
				$loom['puur'] = mysqli_real_escape_string($connection, $_POST["puur"]);
				$liik = upload("liik");
				if ($liik != "") {
					$loom['liik'] = $liik;
				}
				
				$sql = "UPDATE 10153154_loomaaed SET nimi='".$loom['nimi']."', puur=".$loom['puur'].", liik='".$loom['liik']."' WHERE id=".$id;
				$result = mysqli_query($connection, $sql) or die("Ei uuendanud looma");
				header("location: ?page=loomad");
		}
	}
	include_once('views/editform.html');
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>