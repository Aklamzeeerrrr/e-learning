<?php 
        try{
                $con = new PDO("mysql:host=localhost;dbname=e_learning", "root","");
        }
        catch(Exception $e){
                die('ERROR : '.$e->getMessage());
        }
?>