<?php include("inc/db.php")?>
<div id="bodyright">
    <?php
        if (isset($_GET['modifier_cat'])) {
            echo modifier_cat();
        }else {
    ?>
    <h3>Toutes Catégories</h3>
    <div id="add">
        <details>
            <summary>Ajouter Catégorie</summary>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="cat_name" placeholder="Entrer le Nom de la Catégorie Ici"/>
                <input type="text" name="cat_icone" placeholder="Entrer le Code de l'Icône de la Catégorie Ici"/>
                <center><button name="add_cat">Ajouter Catégorie</button></center>
            </form> 
        </details>
        <table cellspacing="0">
            <tr>
                <th>N°</th>
                <th>Catégorie</th>
                <th>Action</th>
            </tr>
            <?php
                echo view_cat();
            ?>
        </table>
    </div>
</div>

<?php 
    echo add_cat();}
?>