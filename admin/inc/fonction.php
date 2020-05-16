<?php
    function add_lang(){
        include("inc/db.php");
        if(isset($_POST['add_lang'])) {
            $lang_name=$_POST['lang_name'];

            /** @var TYPE_NAME $con */
            $check= $con->prepare("select * from lang where lang_name='$lang_name'");
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCount();

            if($count==1){
                echo"<script>alert('Catégorie Déjà Ajoutée')</script>";
                echo"<script>window.open('index.php?lang','_self')</script>";
            }else{
                $add_lang=$con->prepare("insert into lang(lang_name)values('$lang_name')");
                if($add_lang->execute()){
                    echo"<script>alert('Catégorie Ajoutée Avec Succès')</script>";
                    echo"<script>window.open('index.php?lang','_self')</script>";
                } else {
                    echo"<script>alert('Catégorie Non Ajoutée)</script>";
                    echo"<script>window.open('index.php?lang','_self')</script>";
                }
            }
        }
    }

    function modifier_lang(){
        include("inc/db.php");
        if(isset($_GET['modifier_lang'])) {
            $id=$_GET['modifier_lang'];

            /** @var TYPE_NAME $con */
            $get_cat=$con->prepare("select * from lang where lang_id='$id'");
            $get_cat->setFetchMode(PDO::FETCH_ASSOC);
            $get_cat->execute();
            $row=$get_cat->fetch();

            echo "<h3>Modifier Langage</h3>
                    <form id='modifier_form' method='post' enctype='multipart/form-data'>
                        <input type='text' name='l_name' value='".$row['lang_name']."' placeholder='Entrer le Nom du Lanage Ici'/>
                        <center><button name='modifier_lang'>Modifier Langage</button></center>
                    </form>";

            if (isset($_POST['modifier_lang'])){
                $cat_name=$_POST['l_name'];

                /** @var TYPE_NAME $con */
                $check= $con->prepare("select * from lang where lang_name='$cat_name'");
                $check->setFetchMode(PDO::FETCH_ASSOC);
                $check->execute();
                $count=$check->rowCount();

                if($count==1){
                    echo"<script>alert('Langage Déjà Ajouté')</script>";
                    echo"<script>window.open('index.php?lang','_self')</script>";
                }else{
                    $up=$con->prepare("update lang set lang_name='$cat_name' where lang_id='$id'");
                    if($up->execute()){
                        echo"<script>alert('Langage Modifié Avec Succès')</script>";
                        echo"<script>window.open('index.php?lang','_self')</script>";
                    } else {
                        echo"<script>alert('Langage Non Modifié)</script>";
                        echo"<script>window.open('index.php?lang','_self')</script>";
                    }
                }
            }
        }
    }

    function view_lang(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_lang=$con->prepare("select * from lang");
        $get_lang->setFetchMode(PDO::FETCH_ASSOC);
        $get_lang->execute();
        $i=1;
        while($row=$get_lang->fetch()):
            echo "<tr>
                        <td>".$i++."</td>
                        <td>".$row['lang_name']."</td>
                        <td>
                            <a href='index.php?lang&modifier_lang=".$row['lang_id']."'><i class='far fa-edit'></i></a>    
                            <a style='#f00' href='index.php?lang&supp_lang=".$row['lang_id']."'><i class='far fa-trash-alt'></i></a>
                        </td>
                      </tr>";
        endwhile;

        if(isset($_GET['supp_lang'])){
            $id=$_GET['supp_lang'];

            $supp=$con->prepare("delete  from lang where lang_id='$id'");
            if ($supp->execute()){
                echo "<script>alert('Langage Supprimé Avec Succès')</script>";
                echo"<script>window.open('index.php?lang','_self')</script>";
            }else{
                echo "<script>alert('Langage Non Supprimé Avec Succès')</script>";
                echo"<script>window.open('index.php?lang','_self')</script>";
            }
        }
    }

    function add_cat(){
        include("inc/db.php");
        if(isset($_POST['add_cat'])) {
             $cat_name=$_POST['cat_name'];
             $cat_icone=$_POST['cat_icone'];
             /** @var TYPE_NAME $con */
            $check= $con->prepare("select * from cat where cat_name='$cat_name'");
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCount();

            if($count==1){
                echo"<script>alert('Catégorie Déjà Ajoutée')</script>";
                echo"<script>window.open('index.php?cat','_self')</script>";
            }else{
                $add_cat=$con->prepare("insert into cat(cat_name,cat_icone)values('$cat_name','$cat_icone')");
                if($add_cat->execute()){
                    echo"<script>alert('Catégorie Ajoutée Avec Succès')</script>";
                    echo"<script>window.open('index.php?cat','_self')</script>";
                } else {
                    echo"<script>alert('Catégorie Non Ajoutée)</script>";
                    echo"<script>window.open('index.php?cat','_self')</script>";
                }
            }
        }   
    }

    function modifier_cat(){
        include("inc/db.php");
        if(isset($_GET['modifier_cat'])) {
            $id=$_GET['modifier_cat'];

            /** @var TYPE_NAME $con */
            $get_cat=$con->prepare("select * from cat where cat_id='$id'");
            $get_cat->setFetchMode(PDO::FETCH_ASSOC);
            $get_cat->execute();
            $row=$get_cat->fetch();

            echo "<h3>Modifier Catégorie</h3>
                <form id='modifier_form' method='post' enctype='multipart/form-data'>
                    <input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Entrer le Nom de la Catégorie Ici'/>
                    <input type='text' name='cat_icone' value='".$row['cat_icone']."' placeholder='Entrer le Code Icone de la Catégorie Ici'/>
                    <center><button name='modifier_cat'>Modifier Catégorie</button></center>
                </form>";

                if (isset($_POST['modifier_cat'])){
                    var_dump($_POST);
                    $cat_name=$_POST['cat_name'];
                    $cat_icone=$_POST['cat_icone'];
                    /** @var TYPE_NAME $con */

                        $up=$con->prepare("update cat set cat_name='$cat_name', cat_icone='$cat_icone' where cat_id='$id'");
                        if($up->execute()){
                            echo"<script>alert('Catégorie Modifiée Avec Succès')</script>";
                            echo"<script>window.open('index.php?cat','_self')</script>";
                        } else {
                            echo"<script>alert('Catégorie Non Modifiée)</script>";
                            echo"<script>window.open('index.php?cat','_self')</script>";
                        }

                }
        }
    }

    function view_cat(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $i=1;
        while($row=$get_cat->fetch()):
            echo "<tr>
                    <td>".$i++."</td>
                    <td>".$row['cat_icone']."".$row['cat_name']."</td>
                    <td>
                        <a  href='index.php?cat&modifier_cat=".$row['cat_id']."' title='Modifier'><i class='far fa-edit'></i></a>
                        <a style='color: #f00' href='index.php?cat&supp_cat=".$row['cat_id']."' title='Supprimer'><i class='far fa-trash-alt'></i></a>
                    </td>
                  </tr>";
        endwhile;

        if(isset($_GET['supp_cat'])){
            $id=$_GET['supp_cat'];

            $supp=$con->prepare("delete  from cat where cat_id='$id'");
            if ($supp->execute()){
                echo "<script>alert('Catégorie Supprimée Avec Succès')</script>";
                echo"<script>window.open('index.php?cat','_self')</script>";
            }else{
                echo "<script>alert('Catégorie Non Supprimée Avec Succès')</script>";
                echo"<script>window.open('index.php?cat','_self')</script>";
            }
        }
    }

    function add_sous_cat(){
        include("inc/db.php");
        if(isset($_POST['add_sous_cat'])) {
            $cat_name=$_POST['sous_cat_name'];
            $cat_id=$_POST['cat_id'];

            /** @var TYPE_NAME $con */
            $check= $con->prepare("select * from sous_cat where sous_cat_name='$cat_name'");
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCount();

            if($count==1){
                echo"<script>alert('Sous-Catégorie Déjà Ajoutée')</script>";
                echo"<script>window.open('index.php?sous_cat','_self')</script>";
            }else{
                $add_sous_cat=$con->prepare("insert into sous_cat(sous_cat_name,cat_id)values('$cat_name','$cat_id')");
                if($add_sous_cat->execute()){
                    echo"<script>alert('Sous-Catégorie Ajoutée Avec Succès')</script>";
                    echo"<script>window.open('index.php?sous_cat','_self')</script>";
                } else {
                    echo"<script>alert('Sous-Catégorie Non Ajoutée )</script>";
                    echo"<script>window.open('index.php?sous_cat','_self')</script>";
                }
            }
        }
    }

    function modifier_sous_cat(){
    include("inc/db.php");
    if(isset($_GET['modifier_sous_cat'])) {
        $id=$_GET['modifier_sous_cat'];

        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from sous_cat where sous_cat_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();

        $cat_id=$row['cat_id'];
        $get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
        $get_c->execute();
        $row_cat=$get_c->fetch();

        echo "<h3>Modifier Sous-Catégorie</h3>
                <form id='modifier_form' method='post' enctype='multipart/form-data'>
                    <select name='cat_id'>
                       <option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
                       echo select_cat();
                echo"</select>    
                    <input type='text' name='sous_cat_name' value='".$row['sous_cat_name']."' placeholder='Entrer le Nom de la Catégorie Ici'/>
                    <center><button name='modifier_sous_cat'>Modifier Catégorie</button></center>
                </form>";

        if (isset($_POST['modifier_sous_cat'])){
            $cat_name=$_POST['sous_cat_name'];
            $cat_id=$_POST['cat_id'];


                $up=$con->prepare("update sous_cat set sous_cat_name='$cat_name',cat_id='$cat_id' where sous_cat_id='$id'");
                if($up->execute()){
                    echo"<script>alert('Catégorie Modifiée Avec Succès')</script>";
                    echo"<script>window.open('index.php?sous_cat','_self')</script>";
                } else {
                    echo"<script>alert('Catégorie Non Modifiée)</script>";
                    echo"<script>window.open('index.php?sous_cat','_self')</script>";
                }

        }
    }
}

    function view_sous_cat(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from sous_cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $i=1;
        while($row=$get_cat->fetch()):
            $id=$row['cat_id'];
            $get_c=$con->prepare("select * from cat where cat_id='$id'");
            $get_c->setFetchMode(PDO::FETCH_ASSOC);
            $get_c->execute();
            $row_cat=$get_c->fetch();

            echo "<tr>
                        <td>".$i++."</td>
                        <td>".$row['sous_cat_name']."</td>
                        <td>".$row_cat['cat_name']."</td>
                        <td>
                            <a href='index.php?sous_cat&modifier_sous_cat=".$row['sous_cat_id']."' title='Modifier'><i class='far fa-edit'></i></a>
                            <a style='color: #f00' href='index.php?sous_cat&supp_sous_cat=".$row['sous_cat_id']."' title='Supprimer'><i class='far fa-trash-alt'></i></a>
                        </td>
                      </tr>";
        endwhile;

        if(isset($_GET['supp_sous_cat'])){
            $id=$_GET['supp_sous_cat'];

            $supp=$con->prepare("delete  from sous_cat where sous_cat_id='$id'");
            if ($supp->execute()){
                echo "<script>alert('Sous-Catégorie Supprimée Avec Succès')</script>";
                echo"<script>window.open('index.php?sous_cat','_self')</script>";
            }else{
                echo "<script>alert('Sous-Catégorie Non Supprimée Avec Succès')</script>";
                echo"<script>window.open('index.php?sous_cat','_self')</script>";
            }
        }
    }

    function select_cat(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        while($row=$get_cat->fetch()):
            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
        endwhile;
    }

    function add_term(){
    include("inc/db.php");
    if(isset($_POST['add_term'])) {
        $cat_name=$_POST['term'];
        $cat_id=$_POST['pour_qui'];

        /** @var TYPE_NAME $con */
        $check= $con->prepare("select * from term where term='$cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();

        if($count==1){
            echo"<script>alert('Terme Déjà Ajoutée')</script>";
            echo"<script>window.open('index.php?termes','_self')</script>";
        }else{
            $add_sous_cat=$con->prepare("insert into term(term,pour_qui)values('$cat_name','$cat_id')");
            if($add_sous_cat->execute()){
                echo"<script>alert('Terme Ajoutée Avec Succès')</script>";
                echo"<script>window.open('index.php?termes','_self')</script>";
            } else {
                echo"<script>alert('Terme Non Ajoutée )</script>";
                echo"<script>window.open('index.php?termes','_self')</script>";
            }
        }
    }
}

    function modifier_term(){
        include("inc/db.php");
        if(isset($_GET['modifier_term'])) {
                $id=$_GET['modifier_term'];

                /** @var TYPE_NAME $con */
                $get_cat=$con->prepare("select * from term where t_id='$id'");
                $get_cat->setFetchMode(PDO::FETCH_ASSOC);
                $get_cat->execute();
                $row=$get_cat->fetch();

                echo "<h3>Modifier T&C</h3>
                        <form id='modifier_form' method='post' enctype='multipart/form-data'>
                            <select name='pour_qui'>
                                <option value='".$row['pour_qui']."'>".$row['pour_qui']."</option>
                                <option value='Etudiant'>Etudiant</option>
                                <option value='Professeur'>Professeur</option>";
                echo"</select>    
                            <input type='text' name='term' value='".$row['term']."' placeholder='Entrer le Nom de la Catégorie Ici'/>
                            <center><button name='modifier_t'>Modifier T&C</button></center>
                        </form>";

                if (isset($_POST['modifier_t'])){
                    $cat_name=$_POST['term'];
                    $cat_id=$_POST['pour_qui'];


                    $up=$con->prepare("update term set term='$cat_name',pour_qui='$cat_id' where t_id='$id'");
                    if($up->execute()){
                        echo"<script>alert('Terme Modifié Avec Succès')</script>";
                        echo"<script>window.open('index.php?termes','_self')</script>";
                    } else {
                        echo"<script>alert('Terme Non Modifié)</script>";
                        echo"<script>window.open('index.php?termes','_self')</script>";
                    }

                }
            }
    }

    function view_term(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_c=$con->prepare("select * from term ");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $i=1;
        while($row=$get_c->fetch()):

            echo "<tr>
                        <td>".$i++."</td>
                        <td>".$row['term']."</td>
                        <td>".$row['pour_qui']."</td>
                        <td>
                            <a href='index.php?termes&modifier_term=".$row['t_id']."' title='Modifier'><i class='far fa-edit'></i></a>
                            <a style='color: #f00' href='index.php?termes&supp_term=".$row['t_id']."' title='Supprimer'><i class='far fa-trash-alt'></i></a>
                        </td>
                      </tr>";
            endwhile;

        if(isset($_GET['supp_term'])){
            $id=$_GET['supp_term'];

            $supp=$con->prepare("delete  from term where t_id='$id'");
            if ($supp->execute()){
                echo "<script>alert('Terme Supprimé Avec Succès')</script>";
                echo"<script>window.open('index.php?termes','_self')</script>";
            }else{
                echo "<script>alert('Terme Non Supprimé Avec Succès')</script>";
                echo"<script>window.open('index.php?termes','_self')</script>";
            }
        }
    }

    function contact(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_con=$con->prepare("select * from contact");
        $get_con->setFetchMode(PDO::FETCH_ASSOC);
        $get_con->execute();
        $row=$get_con->fetch();

        echo "<form method='post'enctype='multipart/form-data'>
                    <table>
                        <tr>
                            <td>Contact</td>
                            <td><input type='tel' value='".$row['tel']."' name='tel' /></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type='email'value='".$row['email']."'  name='email' /></td>
                        </tr>
                        <tr>
                            <td>Adresse 1</td>
                            <td><input type='text' value='".$row['add1']."'  name='add1' /></td>
                        </tr>
                        <tr>
                            <td>Address 2</td>
                            <td><input type'text' value='".$row['add2']."'  name='add2' /></td>
                        </tr>
                        <tr>
                            <td>http://youtube.com/</td>
                            <td><input type='text'  value='".$row['yt']."' name='yt' /></td>
                        </tr>
                        <tr>
                            <td>http://facebook.com/</td>
                            <td><input type='text' value='".$row['fb']."'  name='fb' /></td>
                        </tr>
                        <tr>
                            <td>http://plus.google.com/</td>
                            <td><input type='text' value='".$row['gp']."'  name='gp' /></td>
                        </tr>
                        <tr>
                            <td>http://twitter.com</td>
                            <td><input type='text' value='".$row['tw']."'  name='tw' /></td>
                        </tr>
                        <tr>
                            <td>http://linkedin.com</td>
                            <td><input type='text' value='".$row['link']."'  name='ln' /></td>
                        </tr>
                    </table>
                    <center><button name='up_con'>Sauvegarder</button></center>
             </form>";
        // mise-a-jour
            if (isset($_POST['up_con'])){
                $tel=$_POST['tel'];
                $email=$_POST['email'];
                $add1=$_POST['add1'];
                $add2=$_POST['add2'];
                $yt=$_POST['yt'];
                $fb=$_POST['fb'];
                $gp=$_POST['gp'];
                $tw=$_POST['tw'];
                $ln=$_POST['ln'];

                $up=$con->prepare("update contact set tel='$tel', email='$email', add1='$add1', add2='$add2', yt='$yt', fb='$fb', gp='$gp', tw='$tw', link='$ln'");
                if($up->execute()){
                    echo "<script>window.open('index.php?contact','_self')</script>";
                }
            }
    }

    function add_faqs(){
    include("inc/db.php");
    if(isset($_POST['add_faqs'])) {
        $qsn=$_POST['qsn'];
        $rep=$_POST['rep'];

        /** @var TYPE_NAME $con */
        $check= $con->prepare("select * from faqs where qsn='qsn'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();

        if($count==1){
            echo"<script>alert('FAQs Déjà Ajoutée')</script>";
            echo"<script>window.open('index.php?faqs','_self')</script>";
        }else{
            $add_cat=$con->prepare("insert into faqs(qsn,rep)values('$qsn','$rep')");
            if($add_cat->execute()){
                echo"<script>alert('FAQs Ajoutée Avec Succès')</script>";
                echo"<script>window.open('index.php?faqs','_self')</script>";
            } else {
                echo"<script>alert('FAQs Non Ajoutée)</script>";
                echo"<script>window.open('index.php?faqs','_self')</script>";
            }
        }
    }
}

    function view_faqs(){
        include ("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_faqs=$con->prepare("select * from faqs");
        $get_faqs->setFetchMode(PDO::FETCH_ASSOC);
        $get_faqs->execute();
        while ($row=$get_faqs->fetch()):
            echo"
                <details>
                    <summary>".$row['qsn']."</summary>
                    <form method='post' enctype='multipart/form-data'>
                        <input type='text' name='up_qsn' value='".$row['qsn']."' placeholder='Entrer La Question Ici'/>
                        <input type='hidden' name='id' value='".$row['q_id']."' />
                        <textarea name='up_rep' placeholder='Entrer Votre Reponse Ici'>".$row['rep']."</textarea>
                        <center><button name='up_faqs'>Mettre A Jour FAQs</button></center>
                    </form>
                </details><br/>";
        endwhile;

        if(isset($_POST['up_faqs'])) {
            $qsn=$_POST['up_qsn'];
            $rep=$_POST['up_rep'];
            $id=$_POST['id'];
            /** @var TYPE_NAME $con */

            $up_faq=$con->prepare("update faqs set qsn='$qsn', rep='$rep' where q_id='$id'");
            if($up_faq->execute()){
                echo"<script>alert('FAQs Mise A Jour Avec Succès')</script>";
                echo"<script>window.open('index.php?faqs','_self')</script>";
            } else {
                echo"<script>alert('FAQs Non Mise A Jour)</script>";
                echo"<script>window.open('index.php?faqs','_self')</script>";
            }
        }

    }

    function apropos(){
        include ("inc/db.php");
        /** @var TYPE_NAME $con */
        $apropos=$con->prepare("select * from apropos");
        $apropos->setFetchMode(PDO::FETCH_ASSOC);
        $apropos->execute();
        $row=$apropos->fetch();

        echo"
            <form method='post'>
                <textarea name='apropos'>".$row['apropos']."</textarea>
                <button name='up_apropos'>Sauvegarder</button>
            </form>";
        if(isset($_POST['up_apropos'])){
            //var_dump($_POST);
            $info=$_POST['apropos'];


            $up_apropos=$con->prepare("update apropos set apropos='$info'");
            //var_dump($up_apropos);

            if ($up_apropos->execute()){
                echo"<script>window.open('index.php?apropos','_self')</script>";
            } else {
                echo"<script>alert('Info Non Mise A Jour)</script>";
                echo"<script>window.open('index.php?apropos','_self')</script>";
            }

        }
    }




?>