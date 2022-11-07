<?php
    $md5 = "Not computed";
    if (isset($_GET['encode']) ) {
        $md5 = hash('md5', $_GET['encode']);
    }
?>
<!DOCTYPE html>
<head>
    <title>SSE3150 Web App Development MD5</title>
</head>
<body>
    <h1>MD5 Maker</h1>
    <p>MD5: <?= htmlentities($md5); ?></p>
    <form method = "GET">
        <input type="text" name="encode" size="40" value="<?php if (isset($_GET['encode'])) echo $_GET['encode']; ?>"/>
        <input type="submit" value="Compute MD5"/>
    </form>
    <ul>
        <li><p><a href="md5.php">Reset</a></p></li>
        <li><p><a href="index.php">Back to Cracking</a></p></li>
    </ul>
    
    
</body>
</html>
