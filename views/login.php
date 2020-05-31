<?php namespace views;

?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In Form</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../views/css/styles.css">
</head>

<body>
    <div class="container" id="log-in-form">
        <div class="heading">
            <h1>Movie Pass</h1>
        </div>
        <form method="post" action="../user/login">
            <div class="form-group">
                <input type="text" class="form-control" name= "email" id="username" placeholder="Enter username">
            </div>

            <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg">Log In</button>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name= "password" id="pwd" placeholder="Enter password">
            </div>

            <div class="form-group form-group-btn">
            <?php
                require_once "FacebookConfig.php";
                $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
                echo "<br> <a class="." form-group-btn btn btn-primary "." href=" . htmlspecialchars($loginUrl) . "> <i class="."fab fa-facebook-f fa-fw"."></i>  LOGIN FACEBOOOK  </a>";
            ?>
            </div>


            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me</label>
            </div>
        </form>

     

    </div>
   