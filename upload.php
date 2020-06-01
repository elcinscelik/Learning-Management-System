<?php

$file = $_FILES["file"];

move_uploaded_file($file["tmp_name"], "files/" . $file["name"]);


header("Location: syllabusTE.php");

?>