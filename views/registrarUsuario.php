<?php namespace views;
?>

</head>
<body>
<body class="blurBg-false" style="background-color:#EBEBEB">
<!-- Start Formoid form-->
<link rel="stylesheet" href="estilosFormularios/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="estilosFormularios/formoid1/jquery.min.js"></script>
    <form method="post" action="" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
        <div class="title">
            <h2>Registrarse</h2>
        </div>
        <div class="element-name"><label class="title"></label><span class="nameFirst"><input placeholder=" Nombre" type="text" size="8" name="nombre" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder=" Apellido" type="text" size="14" name="apellido" /><span class="icon-place"></span></span></div>
        
        <div class="element-number">
            <label class="title"></label>
            <div class="item-cont">
                <input class="large" type="text" min="0" max="100" name="number" placeholder="DNI" value=""/>
                <span class="icon-place"></span>
            </div>
        </div>
        <div class="element-email">
            <label class="title"></label>
            <div class="item-cont">
                <input class="large" type="email" name="email" value="" placeholder="Email"/>
                <span class="icon-place"></span>
            </div>
        </div>
        <div class="element-password">
            <label class="title"></label>
            <div class="item-cont">
                <input class="large" type="password" name="password" value="" placeholder="Password"/>
                <span class="icon-place"></span>
            </div>
        </div>
        <div class="submit">
            <input type="submit" value="Registrarse"/>
        </div>
    </form>
<p class="frmd"><a href="http://formoid.com/v29.php">bootstrap forms</a> Formoid.com 2.9</p><script type="text/javascript" src="estilosFormularios/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->



</body>




