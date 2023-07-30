<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>22MCA0321 | Next Page</title>
</head>
<body>
    <h1>Welcome to the Next Page</h1>
    <p>Hello, <?php echo $_SESSION['username']; ?></p>
</body>
</html>
