<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Movie Ratings</title>

    <link rel="stylesheet" href="../test/bulma.css" />
  </head>

  <body>
  
      <center><h1><strong>Search for a Movie</strong></h1></center>      <br>

      
<div class="input">  
    
    <form method="post">
      <label for="search">Search for a movie</label>
      <input type="text" name="search" id="search">
      <input type="submit" name="submit" value="Submit">    
    </form>
    
       
</div>

      
<?php 
    if (isset($_POST['submit'])) {  
    require "../test/config.php";
    require "../test/common.php";
      

    $search = $_POST["search"];

    $search = str_replace(' ', '_',$search);


    $details=file_get_contents("http://www.omdbapi.com/?apikey=5d8197a9&t=$search&r=json");
      
      
    $details=json_decode($details);
      
    $title = $details->{'Title'};
    $year = $details->{'Year'};
    $rated = $details->{'Rated'};
    $released = $details->{'Released'};
    $runtime = $details->{'Runtime'};
    $genre = $details->{'Genre'};
    $director = $details->{'Director'};
    $writer = $details->{'Writer'};
    $actors = $details->{'Actors'};
    $plot = $details->{'Plot'};
    $language = $details->{'Language'};
    $country = $details->{'Country'};
    $awards = $details->{'Awards'};
    $poster = $details->{'Poster'};  
        
    
    $released = date("Y-m-d", strtotime($released));
    $date = date("Y-m-d h:i:s");
        
      
   $new_movie = array(
      //"user_id"  => ,
      "content_title"     => $title,
      "content_description"       => $plot,
      "content_release_date"  => $released,
      //"content_avg_rating"     => ,
      "content_created"       => $date,
      "content_updated"  => $date,
              
    );   


      
 try{
     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

$sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"content",
implode(", ", array_keys($new_movie)),
":" . implode(", :", array_keys($new_movie))
    );

$statement = $conn->prepare($sql);
    $statement->execute($new_movie);

     echo "New Record created";
    }
 catch(PDOException $e)
    {
     echo $sql . "<br>" . $e->getMessage();
    }
  
$conn = null;
    
    
echo "<br>"; 
        
$poster = base64_encode(file_get_contents($poster));
echo '<img src="data:image/jpeg;base64,'.$poster.'".';
    }
?>


    
  </body>
</html>
