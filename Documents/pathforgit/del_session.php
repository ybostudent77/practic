<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
$newURL = 'http://localhost:8888/check_session.php';
header('Location: '.$newURL);
header('Location: check_session.php');
?>
</body>
</html>
