<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="myAccount.css">
    <link rel="icon" type="image/png" href="Wild_Rift_icon.png">
</head>
<body id="home">
    <header>
        <div class="left">
            <a class="myAccount" href="myAccount.html"><ion-icon name="person-circle-outline"></ion-icon></a>
            <a href="#home" class="logo">Summoner's<span>pedia</span></a>
        </div>
        <div class="right">
            <nav>
                <ul>
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="tuto.html">Tutorial</a>
                    </li>
                    <li>
                        <a href="champs.html">Campeones</a>
                    </li>
                    <li>
                        <a href="tierlist.html">Tier List</a>
                    </li>
                </ul>
            </nav>
            <div class="rightside">
                <div class="btns menutoggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="btns daynight">
                    <ion-icon name="moon-outline"></ion-icon>
                    <ion-icon name="sunny-outline"></ion-icon>
                </div>
            </div>
        </div>
    </header>
    
    <section class="background">
        <div class="form">
            <h2>
                Registrarse
            </h2>
            <form action="myAccountRegister.php" method="post" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <span>Nombre de usuario</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required>
                    <span>Correo Electrónico</span>
                </div>
                <div class="inputBox">
                    <input id="password" type="password" name="password" required>
                    <span>Contraseña</span>
                    <div class="btnsBox" onclick="showHide();">
                        <ion-icon name="eye-off-outline"></ion-icon>
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="inputBox">
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Ingresar" name="aceptar">
                </div>
                <div class="registerBox">
                    <p>¿Ya te registraste? <a href="myAccount.html">Inicia sesión aquí</a></p>
                </div>
            </form>
            
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'summonerspedia');
            if(isset($_POST["aceptar"])){
                if(strlen($_POST["name"]) > 1 && strlen($_POST["email"]) > 1 && strlen($_POST["password"]) > 1){
                    $n = trim($_POST["name"]);
                    $e = trim($_POST["email"]);
                    $p = trim($_POST["password"]);
                    $img = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $d = date("d-m-Y (H:i:s)");
                    $insert = "INSERT INTO register VALUES(null, '$n', '$e', '$p', '$img', '$d')";
                    $action = mysqli_query($connect, $insert);
                    if($action){
                        echo "<script>
                                alert('¡Operación exitosa!');
                                window.location='myAccountRegister.php';
                            </script>";
                    }
                    else{
                        echo "<script>
                                alert('¡Ha ocurrido un error!');
                                window.location='myAccountRegister.php';
                            </script>";
                    }
                }
                else{
                    echo "<script>
                            alert('¡Complete los campos!');
                            window.location='myAccountRegister.php';
                        </script>";
                }
            }
            mysqli_close($connect);
            ?>
        </div>
    </section>
    
    <section class="footer-background">
        <div class="footer">
            <div class="footerleft">
                <p class="copyrightText">© 2019-2020 Riot Games, Inc. RIOT GAMES, LEAGUE OF LEGENDS: WILD RIFT y todas las imágenes o videos referentes al videojuego son propiedad de Riot Games, Inc.</p>
                <p class="madeBy">Hecho por: Martín Sepúlveda. <a href="https://www.instagram.com/martin07.22/"><ion-icon name="logo-instagram"></ion-icon></a></p>
            </div>
            <ul class="sci">
                <li><a href="https://www.facebook.com/wildriftLATAM"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="https://twitter.com/wildriftLATAM"><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li><a href="https://www.instagram.com/wildriftlatam/"><ion-icon name="logo-instagram"></ion-icon></a></li>
                <li><a href="https://www.youtube.com/channel/UCZryWLpEaW1T40CWjiYIXAQ"><ion-icon name="logo-youtube"></ion-icon></a></li>
            </ul>
        </div>
    </section>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="myAccount.js"></script>
    <script src="nav.js"></script>
</body>
</html>
