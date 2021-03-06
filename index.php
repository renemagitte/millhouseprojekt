<?php
require 'partials/session.php';
?>


<!DOCTYPE html>

<html lang="en">

<?php
require 'head.php';
require 'partials/database.php';
require 'partials/print_posts.php';
require 'partials/index_statements.php'; 
?>

<body>

    <!-- NAVIGATION -->

    <?php
        require 'nav.php';
        require 'jumbotron.php'
    ?>

    <!-- HERO IMAGE -->

    <div class="blue-line"></div>

    <main class="container">

        <div class="row">              
            <div class="col-xs-12, col-md-8">
                <div>
                    <h1>Våra blogginlägg</h1>
                    <hr>
                </div>
                <div class="right-align">
                    <span class="filter">Filtrera efter:</span>
                       
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori: <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="blog.php">Allt</a></li>
                            <li><a href="blog.php?cat_glasses=true">Solglasögon</a></li>
                            <li><a href="blog.php?cat_watches=true">Klockor</a></li>
                            <li><a href="blog.php?cat_interior=true">Inredning</a></li>
                          </ul>
                        </div>
                </div>
                   
                <div>
                    <?php
                first_image_category($first_post);
                    ?>
                </div>     
            </div>
            
            <div class="hidden-xs hidden-sm col-md-4">
                <div>
                    <h1 class="text-center">Användare</h1>
                    <hr>
                </div>
                <div>
                    <?php
                        require 'index_login.php';
                    ?>
                </div>
            </div>
        </div>
             
        <div class="row">
               
          <?php
        // FUNCTION FOR PRINTING OUT BLOG POST
            if(isset($_GET["cat_watches"])){
                image_category($post_info_watches);
            }elseif(isset($_GET["cat_glasses"])){
               image_category($post_info_glasses);
            }elseif(isset($_GET["cat_interior"])){
                image_category($post_info_interior);               
            }else{
                image_category($post_info);
            } ?>
        </div>
            

       

        <a class="btn button-green btn-lg btn-block" href="blog.php">Läs alla inlägg här</a>    
   
    <!--main End-->
    </main>
    

 
   
    <?php
        require "footer.php";
    ?>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>