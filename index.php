<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Home</h1>

        <?php if (isset($user)): ?>

            <p class="text-center">Hello <?= htmlspecialchars($user["name"]) ?></p>
            <div class="text-center">
                <a href="logout.php" class="btn btn-primary">Log out</a>
            </div>

        <?php else: ?>

            <div class="text-center">
                <p><a href="login.php" class="btn btn-primary">Log in</a> or <a href="signup.html" class="btn btn-secondary">Sign up</a></p>
            </div>

        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
