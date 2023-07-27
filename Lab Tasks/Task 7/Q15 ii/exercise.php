<!DOCTYPE html>
<html>
<head>
    <title>Visit Count Example</title>

    <style>
        body {
            background-color: aqua;
            font-family: 'Courier New', Courier, monospace;
        }

        h1 {
            background-color: bisque;
            width: 500px;
            margin: auto;
            padding: 10px 20px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        p {
            margin: 7px auto;
            width: 500px;
            background-color: pink;
            padding: 10px 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            font-size: 32px;
        }
    </style>
</head>
<body>
    <h1>Welcome to our website!</h1>
    <?php
    setVisitCountCookie();
        $cookieName = 'visitCount';
        $visitCount = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : 0;
        echo "<p>This is visit number: $visitCount</p>";
    
        function setVisitCountCookie() {
            $cookieName = 'visitCount';
            $expiryTime = time() + (10);

            if (!isset($_COOKIE[$cookieName])) {
                setcookie($cookieName, '1', $expiryTime);
            } else {
                $visitCount = $_COOKIE[$cookieName];
                $visitCount++;
                setcookie($cookieName, $visitCount, $expiryTime);
            }
        }        
    ?>
</body>
</html>
