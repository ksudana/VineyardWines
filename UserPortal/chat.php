<?php
    session_start();
    include_once 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wine Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="screen"
    />
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
    <link href="css/elements.css" rel="stylesheet">

    <title>VineyardWines</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/shop-item.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h5><titlec>Chat with Wine Enthusiasts</titlec></h5>
        </header>
        <main>
            <div class="chat">
                <div id="chatOutput"></div>
                <input id="chatInput" type="text" placeholder="Input Text here" maxlength="128">
                <button id="chatSend">Send</button>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/rChat.js"></script>
    <script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
