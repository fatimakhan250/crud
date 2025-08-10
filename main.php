
<!-- html work -->
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100 bg-success">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5 bg-warning">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 ">CONTACT US</p>

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="text" id="name" name="name" class="form-control" />
                      <label class="form-label" for="name">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="email" id="email" name="email" class="form-control" />
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="password" id="password" name="password" class="form-control" />
                      <label class="form-label" for="password" >Your Password</label>
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="number" id="number" name="number" class="form-control" />
                      <label class="form-label" for="number" >Your Number</label>
                    </div>
                  </div>
                       <button type="submit" class="btn btn-primary">submit</button> 
                 
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php

$servername = "localhost";
$username= "root";
$password = "";
$db_name= "forms";

$conn= mysqli_connect($servername, $username, $password,  $db_name );
// if ($conn) {
//     echo"connected succesfully <br>";}
//     else{
//         echo "not connected <br>";
//     }

    // creating database

    $sql = "CREATE DATABASE IF NOT EXISTS forms";
    $result = mysqli_query($conn, $sql);

    // if($result){
    //     echo"database created  <br>";
    // }
    // else{
    //     echo"database not created <br>";
    // }

    // creating tables

    $sql = "CREATE TABLE IF NOT EXISTS tourist(
    id int not null primary key auto_increment,
    name varchar (255),
    email varchar(255),
    password varchar(255),
    number int not null
)";
    $result = mysqli_query($conn, $sql);
    // if($sql){
    //    echo"table created";
    // }
    // else{
    //     echo "table not created";
    // }


    // data inserting 
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];  
        // yh name jo likha hai yh wo hai jo form me id ya name diya hai variable
        $email = $_POST["email"];
        $password = $_POST["password"];
        $number = $_POST["number"];

        $sql= "INSERT INTO tourist (name , email , password, number) VALUE ('$name', '$email','$password', '$number' ) ";
        $result = mysqli_query($conn, $sql);
   
  //  if ($result) {
  //    echo "data insert successfully throw the form";
  //  }else{
  //    echo "error";
  //  }
    }

// delete the data from table 

if(isset($_GET["delete"])){
$id = $_GET["delete"];

$sql = "DELETE FROM tourist WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if($result){
  echo "console.log(data delete successfully)";
}else{
  echo "error";
}
}

    ?>





   
<!-- for showing the data we have to create the table as well  -->
   <div class="table">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>NUMBER</th>
          <th>UPDATE AND DELETE</th>
        </tr>
        </thead>
       
        <tbody>
          <?php
          $sql = "SELECT *FROM tourist";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>"; 
            echo "<td>" . $row['email'] . "</td>"; 
            echo "<td>" . $row['password'] . "</td>"; 
            echo "<td>" . $row['number'] . "</td>"; 
            echo "<td>
            <a href='?edit=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
            <a href='?delete=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
            </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
    </div>
  </div>
    


</body>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

