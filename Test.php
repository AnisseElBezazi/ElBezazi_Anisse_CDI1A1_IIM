<?php
session_start();
?>

<pre><?php print_r($_SESSION['user']); ?></pre>
<img src="<?= $_SESSION['user']['picture'] ?>" 
     alt="profil" 
     style="width: 100px; height: 100px; display: inline-block; border: 2px solid green;">