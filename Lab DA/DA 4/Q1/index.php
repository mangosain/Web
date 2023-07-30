<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'])) {
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>22MCA0321 | Page 1</title>
</head>
<body>
    <h1>Welcome to the Main Page</h1>
    <form method="post">
        <label for="username">Enter your username:</label>
        <input type="text" name="username" id="username" required>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($_SESSION['username'])) : ?>
        <a href="next_page.php?<?php echo htmlspecialchars(SID); ?>">Go to next page</a>
    <?php endif; ?>
</body>
</html>