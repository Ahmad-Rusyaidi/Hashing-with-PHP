<?php
    $md5 = "Not computed";
    
    $error = false;
    $md5 = false;
    $code = "";
    $txt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $char = false;

    //MD5 PIN Maker
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
            $error = "Input must contains only integer";
        } else {
            $md5 = hash('md5', $code);
        }
    } else if (isset($_GET['encode']) ) {
        //MD5 Maker
        $md5 = hash('md5', $_GET['encode']);
    }
?>
<!DOCTYPE html>
<head>
    <title>SSE3150 Web App Development MD5 Cracker</title>
</head>
<body>
    <h1>MD5 cracker</h1>
    <p>This application takes an MD5 hash
        of a two-character lower case string and 
        attempts to hash all two-character combinations
        to determine the original two characters.
    </p>
<pre>
Debug Output:
<?php

    $goodtext = "Not Found!";
    $total = 0;
    $time_pre = 0;

    //MD5 Cracker
    if ( isset($_GET['md5']) ) {

        $time_pre = microtime(true);
        $md5 = $_GET['md5'];

        for($i=0; $i<10000; $i++) {
                
            $x = str_pad($i, 4, '0', STR_PAD_LEFT);
            $check = hash('md5',$x);
                    
            if ( $check == $md5 ) {
                $goodtext = $x;
            }

            if ( $i < 21 ) {
                print "$check $x\n";
            }

            $total = $i;

        }
    }
    
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";

?>
Total Checks: <?php echo $total ?>
</pre>
    <p>Original Text: <?php echo htmlentities($goodtext); ?></p>
    <form method="GET">
        <input type="text" name="md5" size="60" value="<?php if (isset($_GET['md5'])) echo $_GET['md5']; ?>"/>
        <input type="submit" value="Crack MD5"/>
    </form>
    <ul>
        <li><a href="index.php">Reset</a></li>
        <li><a href="md5.php">MD5 Encoder</a></li>
        <li><a href="makecode.php">MD5 PIN Maker</a></li>
    </ul>
</body>
</html>
