<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to AskVilla - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php'?>
    <?php include 'partials/_header.php'?>

    

    <div class="container my-3">
        <h1 class="py-3">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
        <?php 
        $noresults=true;
        $query=$_GET['search'];
        $sql = "select * from thread where match (thread_title,thread_desc) against ('$query')"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
         $title = $row['thread_title'];
         $desc = $row['thread_desc'];
         $thread_id=$row['thread_id'];
         $url="thread.php?threadid=".$thread_id;
         
        echo '<div class="result">
              <h3><a href="'. $url. '" class="text-dark">' . $title. '</a> </h3>
                <p>'. $desc .'</p></div>  ';

        }
        if($noresults){
            echo '<div class="jumbotron-fluid">
                     <div class="container">
                      <p class="display-4">No Results Found</p>
                      <p class="lead">Suggestions: <ul>
                            <li> Make sure that all words are spelled correctly.</li>
                             <li>Try different keywords.</li>
                             <li>Try more general keywords.</li></ul>
                       </p>
                       </div>
                       </div>';
        }
        ?>
    

    </div>

   
    <?php include 'partials/_footer.php'?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>