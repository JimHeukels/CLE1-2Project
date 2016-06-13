<div id="hmenu">
    <nav>
        <ul><li>    <a class="headerlogo" href="../site/home.php">
                    <img src="../images/BoekenplusLogo_1.jpg" />
                </a></li>
            <li><a href="../site/home.php"> Home </a></li>
            <li><a href="../site/assortiment.php"> Assortiment </a></li>
            <li><a href="../site/about_us.php"> Over ons </a></li>

<!--            if user is logged in, button changes to log out button-->
            <?php if (isset($_SESSION['email'])) { ?>
                <li><a href="../accounts/logout.php"> Uitloggen </a></li><?php ;
            } ?>
<!--            if user is not logged in, button changes into log in button-->
            <?php if (!isset($_SESSION['email'])) { ?>
                <li><a href="../accounts/login.php"> Inloggen </a></li> <?php ;
            }  ?>
            <li><a href="../site/account.php">Mijn account</a></li>
            <li><a href="../site/reservationsOverview.php"> Reserveringsoverzicht</a></li>




        </ul>
    </nav>
</div>

