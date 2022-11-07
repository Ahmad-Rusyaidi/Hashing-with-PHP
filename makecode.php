<?php
    $error = false;
    $md5 = false;
    $code = "";
    $txt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $char = false;

    if ( isset($_GET['code']) ) {
        $code = $_GET['code'];

        for($i = 0; $i < strlen($txt); $i++){

            for($j=0; $j < strlen($code); $j++){
                if($code[$j] == $txt[$i]){
                    $char = true;
                }
            }
        }

        if ( strlen($code) != 4 ) {
            $error = "Input must be exactly four digits";
        } else if($char == true){
            $error = "Input must contain only integer";
        } else {
            $md5 = hash('md5', $code);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>207523 Make PIN Code</title>
</head>
<body>
    <h1>MD5 PIN Maker</h1>
    <?php
        if ( $error !== false ) {
            print '<p style="color:red">';
            print htmlentities($error);
            print "</p>\n";
        }

        if ( $md5 !== false ) {
            print "<p>MD5 value: ".htmlentities($md5)."</p>";
        }
    ?>
    <p>Please enter a four-digits key for encoding.</p>
    <form method = "GET">
        <input type="text" name="code" value="<?= htmlentities($code) ?>"/>
        <input type="submit" value="Compute MD5 for PIN"/>
    </form>
    <ul>
        <li><p><a href="makecode.php">Reset</a></p></li>
        <li><p><a href="index.php">Back to Cracking</a></p></li>
    </ul>
</body>
</html>
