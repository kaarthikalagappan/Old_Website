<?php
if (isset($_POST["submit"])) {
  $username = $_POST["createdUsername"];
  $password = $_POST["createdPassword"];
  $check = false;
  $information = fopen("user_information.txt", "a+");
  while (!feof($information)) {
    $content = explode(":", rtrim(fgets($information, 1024)));
    if ($username == $content[0]) {
		 $check = true;
         break;
    }
  }
$problem = "";
  if ($check) {
	 $problem = "exists";
	 $url = "Location: register.php?information=$problem";
	 header($url);
  fclose($information);
	}
  else {
	$text = $username . ":" . $password . "\n";
	fwrite($information, $text);
    fclose($information);
	 $problem = "created";
	 $url = "Location: login.php?problem=$problem";
	 header($url);
  }
}

else {
	 $url = "Location: index.php?";
	 header($url);
}
?>