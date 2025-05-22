<?php
session_start();
session_destroy();
session_unset();
header("Location: login.php?melding=Je bent afgelogd");
?>