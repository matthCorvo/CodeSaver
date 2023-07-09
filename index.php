<?php
require_once './codeModel.php';
require_once './codeController.php';



$codeSaver = new CodeSaver();
$codeSnippet = $codeSaver->getAllCode();



include_once 'home.php';
?>
