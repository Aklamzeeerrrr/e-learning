<?php
    include("inc/fonction.php");
?>
<div id="header">
    <div id="up_head">
        <div id="lien">
            <?php
                echo head_lien();
            ?>
        </div>
        <div id="date">
            <p>
                <?php
                    echo date('l, d F Y');
                ?>
            </p>
        </div>
        <div id="slog">
            <p>
                Numero 1 des Sites de E learning Ivoirien
            </p>
        </div>
    </div>
    <div id="titre">
        <h2><a href="index.php">E Learning</a></h2>
    </div>
    <div id="menu">
        <h2>
            <i class="fas fa-bars"></i>
            <?php
                include("inc/cat_menu.php");
            ?>
        </h2>
    </div>
    <div id="head_recherche">
        <form method="post" enctype="multipart/form-data">
            <input type="recherche" name="requete" placeholder="Rechercher Cours Ici">
            <button name="recherche"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div id="head_panier">
        <a href="panier.php"><i class="fas fa-shopping-cart"></i> <span>0</span></a>
    </div>
    <div id="head_connexion">
        <h4><i class="fas fa-user"></i> Connexion</h4>
        <form method="post">
            <center>
                <h3><i class="fas fa-user"></i></h3>
                <h4>Connexion</h4>
            </center>
            <div id="input_f">
                <i class="fas fa-envelope"></i>
                <input type="text" name="u_email" placeholder="Entrer Votre Adresse Mail">
            </div>
            <div id="input_f">
                <i class="fas fa-lock"></i>
                <input type="password" name="u_pass" placeholder="Entrer Votre Mot De Passe">
            </div>
            <h5>Mot De Passe Oublié ?</h5><br clear="all">
            <center><button name="connexion">Connexion</button></center>
        </form>
    </div>
    <div id="head_sinscrire">
        <h4><i class="fas fa-user-plus"></i> S'inscrire</h4>
        <form method="post">
            <center>
                <h3><i class="fas fa-user-plus"></i></h3>
                <h4>S'inscrire</h4>
            </center>
            <div id="input_f">
                <i class="fas fa-user"></i>
                <input type="text" name="s_nom" placeholder="Entrer Votre Nom">
            </div>
            <div id="input_f">
                <i class="fas fa-envelope"></i>
                <input type="text" name="s_email" placeholder="Entrer Votre Adresse Mail">
            </div>
            <div id="input_f">
                <i class="fas fa-phone"></i>
                <input type="text" name="s_tel" placeholder="Entrer Votre N° De Téléphone">
            </div>
            <div id="input_f">
                <i class="fas fa-lock"></i>
                <input type="password" name="s_pass1" placeholder="Entrer Votre Mot De Passe">
            </div>
            <div id="input_f">
                <i class="fas fa-lock"></i>
                <input type="password" name="s_pass2" placeholder="Réentrer Votre Mot De Passe">
            </div>
            <center><button name="s_sinscrire">S'inscrire</button></center>
        </form>
    </div>
</div>
