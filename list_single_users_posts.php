<?php
require 'partials/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'partials/database.php';
require 'partials/functions.php'; 
    
    $user = $_SESSION["user"]["id"];
    
    $statement = $pdo->prepare("
      SELECT id, title 
      FROM posts 
      WHERE user = :user 
      ORDER BY date DESC"
    );
    $statement->execute(array(
    ":user" => $user
    )); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    ?>
    

<body>

    <?php
        require 'nav.php';
    ?>

    <div class="container">

            <main class="col-xs-12 col-md-12">

            <?php

//            if(isset($_GET["new_post"])){
//                echo "Ditt nya inlägg har skapats.";
//            }
                
            if(isset($_GET["edit_post"])){
                echo "Ditt inlägg har redigerats.";
            }
            
            if(isset($_GET["delete_post"])){
                echo "Inlägget har raderats.";
            }
            ?>

            <h1>Alla blogginlägg </h1>
            <hr class="full-length">
            <form action="partials/delete.php" method="POST">
            
            <table class="table table-striped full-width">
                <thead><tr>
                <th scope="col">Blogginlägg</th>
                <th scope="col">Redigera inlägg</th>
                <th scope="col">Ta bort inlägg</th>
                </thead></tr>
           
                <?php
                    foreach($posts as $blogposts){ ?>
                      <tr><td>
                      <a href="post.php?post=<?=$blogposts["id"];?>"><?php echo $blogposts["title"]; ?></a>
                      </td><td>
                      <a href="edit_post_form.php?posttoedit=<?= $blogposts["id"]; ?>">Redigera</a><br>
                      </td><td>
                      <label for="checkbox"></label>
                      <input id="checkbox" type="checkbox" name="<?= $blogposts["id"]; ?>" value="<?= $blogposts["id"]; ?>">
                      </td>
                      <?php
                    } 
                ?>
                </tr></table>
                <button type="submit" value="Ta bort" name="delete"> Ta bort </button>
           
            </form>
            <br><br>
            <a class="btn button-test btn-block" href="profilepage.php" target="_self">Tillbaka till profilsidan</a>

        </div>

    </div> <!-- END DIV / CONTAINER -->

<?php
require "footer.php";
?>



</body>

</html>