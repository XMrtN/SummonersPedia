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
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'summonerspedia');
            if(isset($_POST["aceptar"])){
                $n = $_POST["name"];
                $select = "SELECT * FROM `register` WHERE name='$n'";
                $action = mysqli_query($connect, $select);
                if($action){
                    $regs = mysqli_num_rows($action);
                    if($regs > 0){
                        while($row = mysqli_fetch_assoc($action)){ ?>
                <div class="profile-img"><img src="data:image/jpg;base64, <?php echo base64_encode($row["image"]); ?>"></div>
                <div class="profile">
                    <p>
                        Nombre: <span style='text-transform: capitalize;'><?php echo $row["name"] ?></span>
                    </p>
                    <p>
                        Email: <?php echo $row["email"] ?>
                    </p>
                    <p>
                        Fecha de registro: <?php echo $row["date"] ?>
                    </p>
                </div>
                    <?php }
                    }
                    else{
                        echo "<script>
                                alert('¡No existe el usuario!');
                                window.location='myAccount.html';
                            </script>";
                    }
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