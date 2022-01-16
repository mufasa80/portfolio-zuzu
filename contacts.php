<!DOCTYPE html>
<html lang="en">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  


    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="contacts.css">
    <title>portfolio nieuw</title>
    </head>

    <body>
      <header>
        <a href="voorblad.html" class="logo"> START</a>
        <ul>
          <li><a href="aboutMe.html">About me</a></li>
          <li><a href="contacts.php">Contacts</a></li>
          <li><a href="myHobbies.html">My hobbies</a></li>
          <li><a href="myProjects.html">My projects</a></li>
        </ul>
        
      </header>
      
      <section class="banner"></section>
      <script>type="text/javascript">
      window.addEventListener("scroll", function(){
        let header =document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0) } )</script>;
     <div class="container">

<div class=contact name="contact">
     <?php
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=portfolio","root", "");
                        $query = $db->prepare ("SELECT * FROM contactgegevens");
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table>";
                        foreach ($result as &$data) {
                            echo "<td>" . $data ["account"] . " ";
                            echo "<td>" . $data ["volgers"] . "<br>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } catch(PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                ?>
</div>
      <div class="text"></div>
    </head>
    <div class="contactForm">
      <form class="form_1" action="contactform.php" method="post">
        <h2>Stuur een mail</h2>
        
        <div class="form_2" class="inputBox">
          <input type="text" name="name">
          <br>
          <span>Naam</span>
          <br>
          <br>
          <br>
        </div>
        <div class="inputBox">
          <input type="text" name="mail">
          <br>
          <span>E-mail</span>
          <br>
          <br>
          
        </div>
        <div class="inputBox">
        <br>
          <input type="text" name="subject">
          <br>
          

          <span>Onderwerp</span>
          <br>
          <br>
          <br>
          <br>

        </div>
        <div class="inputBox">
          
          <textarea class="Text1" name="message"></textarea>
          <br>
          <span>Jouw bericht</span>
        </div>
        <button class="btn1" type="submit" name="submit">Verstuur bericht</button>
      </form>
    </div>
  </div>
    </h1>
    <body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />