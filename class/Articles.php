<?php

class Articles
{
  public $id;
  public $date;
  public $titre;
  public $chapo;
  public $contenu;

  public static function afficher(){
    $instance = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $articleList =$instance->query("SELECT * FROM articles")->fetchAll();
    
    for ($i=0 ; $i<count($articleList) ; $i++) {

      $id = $articleList[$i]['id'];
      $date = $articleList[$i]['date'];
      $titre = $articleList[$i]['title'];
      $chapo = $articleList[$i]['chapo'];
      $contenu = $articleList[$i]['content'];

      echo "<h3>".$titre."</h3>";
      echo "<h5>".$chapo."</h5>";
      echo "<p>".$contenu."</p>";
      echo "<span> Publié le : ".$date."</span>";
      echo "<hr>";
    }
  }

  public static function modifier(){

  }

  public static function poster(){
    $instance = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $query = $instance->prepare("INSERT INTO articles (id, date, title, chapo, content) VALUES (:id, :date, :title, :chapo, :content)");
    $insertSuccess = $query->execute(array(
      "id" => NULL,
      "date" => $posttime = date("Y-m-d h:i:s"),
      "title" => "Toto le héros des codeurs",
      "chapo" => "Une fierté nationale qui intrigue le monde",
      "content" => "Toto est connu pour sa formule magique qui code tout seul une application le Lorem en voici un extrait : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
    ));

    if (!$insertSuccess) {
      $e = "L'article n'a pas été ajouté";
      Log::writeCSV($e);
    }
  }

}


?>
