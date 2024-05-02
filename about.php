<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['username'])) : ?>
        <p><?php echo $_SESSION['username']; ?></p>
        <?php endif ?>
    <h1>TEST COMPLETE</h1>
</body>
</html>