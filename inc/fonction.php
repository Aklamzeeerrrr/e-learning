<?php
    function head_lien(){
        include ("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_lien=$con->prepare("select * from contact");
        $get_lien->setFetchMode(PDO::FETCH_ASSOC);
        $get_lien->execute();
        $row=$get_lien->fetch();

        echo"<ul>
                <li>
                    <a href='https://www.facebook.com/".$row['fb']."' target='_blank'><i class='fab fa-facebook-f'></i></a>
                </li>
                <li>
                    <a href='https://www.twitter.com/".$row['tw']."'target='_blank'><i class='fab fa-twitter'></i></a>
                </li>
                <li>
                    <a href='https://www.google.com/".$row['gp']."'target='_blank'><i class='fab fa-google-plus'></i></a>
                </li>
                <li>
                    <a href='https://www.youtube.com/".$row['yt']."'target='_blank'><i class='fab fa-youtube'></i></a>
                </li>
                <li>
                    <a href='https://www.linkedin.com/".$row['link']."'target='_blank'><i class='fab fa-linkedin'></i></a>
                </li>
            </ul>";
    }

    function cat_menu(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        while($row=$get_cat->fetch()):
            echo " <li>
                        <a href='#'>".$row['cat_icone']." ".$row['cat_name']."</a>
                   </li>";
        endwhile;
    }

    function home_cat(){
        include("inc/db.php");
        /** @var TYPE_NAME $con */
        $get_cat=$con->prepare("select * from cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        while($row=$get_cat->fetch()):
            echo "<li>
                      <a href='#'>
                            <center>
                                ".$row['cat_icone']."
                                <h4>".$row['cat_name']."</h4>
                                <p>2</p>
                            </center>
                      </a>
                 </li>";
        endwhile;
    }

    function panier(){
        include ("inc/db.php");
        echo "<div id='wrap'>
                    <div id='crumb'>
                            <span><a href='index.php'>Home</a></span> <b>></b>
                            <span>Mon Panier</span>
                    </div>
                    <div id='panier'>
                        <table cellspacing='0'>
                            <tr>
                                <th id='panier_f'>Nom</th>
                                <th>Formateur</th>
                                <th>Langue</th> 
                                <th>Lectures</th>
                                <th>Prix</th>
                            </tr>
                            <tr>
                                <td id='panier_f'>
                                    <img src='imgs/cours/2.jpg'>
                                    <span><a href='#'>Développement d'un site web de réseau social Avec PHP </a></span>
                                    <b><a href='#'><i class='fas fa-trash-alt'></i>Supprimer</a></b>
                                </td>
                                <td>Armel Kragba</td>
                                <td>Français</td>
                                <td>100</td>
                                <td>10900FCA</td>
                            </tr>
                            <tr>
                                <td id='panier_f'>
                                    <img src='imgs/cours/2.jpg'>
                                    <span><a href='#'>Développement d'un site web de réseau social Avec PHP </a></span>
                                    <b><a href='#'><i class='fas fa-trash-alt'></i>Supprimer</a></b>
                                </td>
                                <td>Armel Kragba</td>
                                <td>Français</td>
                                <td>100</td>
                                <td>10900FCA</td>
                            </tr>
                            <tr>
                                <td>
                                    <button><a href='index.php'>Garder Ce Cours</a></button>
                                    <button><a href='#'>Commander</a></button>
                                </td>
                                <td></td><td></td>
                                <td style='text-align: right'>Montant A Payer :</td>
                                <td>10900FCFA</td>
                            </tr>
                        </table>
                    </div><br clear='all'>
              </div>";
    }

    function cours_details(){
        include("inc/db.php");
        echo "<div id='crumb'>
                  <span><a href='index.php'>Home</a></span> <b>></b>
                  <span>Mon Panier</span>
              </div>
              <div id='cours_left'>
                    <img src='imgs/cours/1.png'>
                    <div id='cours_partager'>
                        <center>
                            <button id='fb'><a href='#'><i class='fab fa-facebook-f'></i>Partager</a></button>
                            <button id='gp'><a href='#'><i class='fab fa-google-plus'></i>Partager</a></button>
                            <button id='tw'><a href='#'><i class='fab fa-twitter'></i>Partager</a></button>
                            <button id='w'><a href='#'><i class='fab fa-whatsapp'></i>Partager</a></button>
                        </center>
                    </div>
              </div>
              <div id='cours_right'>
                   <h2>COURS DE NODEJS POUR DÉBUTANTS</h2> 
                   <table>
                        <tr>
                            <td>Formateur</td>
                            <td>Armel Kragba</td>
                        </tr>
                   </table>
                   <table>
                        <tr>
                            <td>Inscris</td>
                            <td>9 Etudiants</td>
                        </tr>
                   </table>
                   <table>
                        <tr>
                            <td>Niveau</td>
                            <td>Niveau Expert</td>
                        </tr>
                   </table>
                   <table>
                        <tr>
                            <td>Langue</td>
                            <td>Français</td>
                        </tr>
                   </table>
                   <table>
                        <tr>
                            <td>Lectures</td>
                            <td>52</td>
                        </tr>
                   </table>
                   <div id='prix'>
                        <h3>Prix : 21000FCA <span>70%</span> <b>70%</b> Economies 49000FCA</h3>
                   </div>
                   <form>
                       <center>
                            <button><i class='fas fa-shopping-cart'></i> Ajouter Au Panier</button>
                            <button><a href='#'><i class='fas fa-bolt'></i> Acheter Maintenant</a></button>
                       </center>                         
                   </form>
              </div><br clear='all'>
              <div id='c_desc'>
                    <h2>Détails Du Cours</h2>
                    <p>Rejoignez le cours le plus complet de Node.js sur Scolar et apprenez Node de façon pratique et théorique !

Node.js est probablement LE langage de programmation côté serveur le plus populaire et le plus moderne dans lequel vous pouvez vous plonger de nos jours !

Les développeurs de Node.js sont très demandés et le langage est utilisé pour tout, des applications web traditionnelles avec des vues rendues côté serveur aux API REST, en passant par les API GraphQL et les services web en temps réel. Sans oublier ses applications dans les flux de construction pour des projets de toutes tailles.

Ce cours vous apprendra tout cela ! En partant de zéro, sans aucune connaissance préalable. Mais si vous apportez quelques connaissances, vous pourrez bien sûr sauter rapidement dans les modules de cours qui vous intéressent le plus.</p>
                    <h2>Qu'est-ce que Vous Apprendrez Dans Ce Cours</h2>
                    <p>Travailler avec l'un des langages de programmation de développement web les plus demandés.<br>
Construire des applications web modernes, rapides et évolutives côté serveur avec NodeJS, des bases de données comme SQL ou MongoDB et bien d'autres.<br>
Comprendre l'écosystème NodeJS et créer des applications rendues côté serveur, des API REST et des API GraphQL.</p>
                    <h2>Prérequis</h2>
                    <p>AUCUNE connaissance de Node.js n'est requise !<br>

AUCUNE connaissance d'un autre langage de programmation (en dehors de JavaScript, voir le point suivant) n'est requise <br>

Des connaissances de base en JavaScript sont toutefois requises - vous devez au moins être prêt à les acquérir pendant le cours. Un module de mise à jour JS existe pour vous permettre de vous familiariser rapidement avec la dernière syntaxe <br>

Des connaissances de base en HTML + CSS sont utiles, mais ne sont PAS nécessaires</p> 
                    <h2>Formateur</h2>  
                    <img src='imgs/cours/aklam.jpg'>
                    <p>Je suis Armel Kragba, Développeur Professionel Fullstack</p>
                    <div id='cours_partager'>
                        <button id='fb'><a href='#'><i class='fab fa-facebook-f'></i></a></button>
                        <button id='gp'><a href='#'><i class='fab fa-google-plus'></i></a></button>
                        <button id='tw'><a href='#'><i class='fab fa-twitter'></i></a></button>
                        <button id='w'><a href='#'><i class='fab fa-whatsapp'></i></a></button>
                    </div>
              </div>
              <div id='c_rel'>
              
              </div><br clear='all'>";
    }
?>
