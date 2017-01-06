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
      echo '<form action="index.php" method="post">';
      echo '<input type="hidden" name="articleId" value="'.$id.'">';
      echo '<input type="submit" name="modifArticle" value="Modifier">';
      echo '</form>';
      echo "<hr>";
    }
  }

  public static function modifier(){
    $instance = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $sql = "SELECT * FROM articles WHERE id = ".$_POST['articleId'];
    $article = $instance->query($sql)->fetch();
    echo '<form method="post" action="index.php">';
    echo '<label for="title">Title</label><input type="text" name="title" value="'.$article['title'].'" ><br>';
    echo '<label for="chapo">Chapo</label><input type="text" name="chapo" value="'.$article['chapo'].'"><br>';
    echo '<label for="content">Content</label><textarea cols="50" rows="10" name="content">'.$article['content'].'</textarea><br>';
    echo '<input name="modifier" type="submit">';
    echo '</form>';
    if (isset($_POST['modifier'])) {
      echo "tutu";
      $sql = "UPDATE articles SET title='".$_POST['title']."',chapo='".$_POST['chapo']."',content='".$_POST['content']."' WHERE id=".$_POST['articleId'];
      $updateSuccess = $instance->exec($sql);
      if (!$updateSuccess) {
        $e = "Article non modifié !";
        Log::writeCSV($e);
      }
    }
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
