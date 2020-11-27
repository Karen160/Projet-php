<header>
    <div style="width:100px">

    </div>
        <img src="..\Public\Asset\img\logo.png">
    <div>
        
    <a 
    <?php 
    if(!isset($_SESSION['connect'])){
        $_SESSION['connect'] = false;
    }
    if($_SESSION['connect'] == true) { 
        ?>  href="../public/index.php?page=profil" 
            <?php }else{ ?> href="../public/index.php?page=sign" <?php   } ?> ><i class="fas fa-user"></i></a>
        <i class="fas fa-bars"></i>

    </div>
    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
        session_destroy();
        header('location:index.php');
    }
    ?>

    <nav>
   
        <div><i class="fas fa-times"></i></div>
        <a href="../public/index.php?page=home">Accueil</a>
        <hr>
        <a href="../public/index.php?page=newsondage">Nouveau sondage</a>
        <hr>
        <a href="../public/index.php?page=resultats">Résultat</a>
        <hr>
        <a href="../public/index.php?page=amis">Amis</a>
        <?php if($_SESSION['connect'] == true) { ?>
        <hr>
        <a href="index.php?action=deconnexion">Deconnexion</a>
        <?php } ?>
    </nav>
</header>