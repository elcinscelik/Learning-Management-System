<?php

$file = $_FILES["file"];

move_uploaded_file($file["tmp_name"], "contents/" . $file["name"]);


header("Location: contentsTE.php");

?>