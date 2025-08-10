
<!-- php work  -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name  = "tourism";

$conn = mysqli_connect($servername, $username, $password, $db_name);

// if($conn){
//   echo "connected";
// }
// else{
//   echo "not connected";
// }

$sql = "CREATE DATABASE IF NOT EXISTS tourism";
$result = mysqli_query($conn, $sql);

// if($result){
//   echo "created";
// }
// else{
//   echo "not created";
// }

$sql ="CREATE TABLE IF NOT EXISTS travellers(

id int not null primary key auto_increment,
name varchar(255),
email varchar(255),
password varchar (255),
number int not null
)"; 
$result = mysqli_query($conn, $sql);
// if($sql){
//   echo "created";
// }
// else{
//   echo "not created";
// }
// inserting the data

if($_SERVER["REQUEST_METHOD"] == "POST"){

         $name = $_POST["name"];  
        $email = $_POST["email"];
        $password = $_POST["password"];
        $number = $_POST["number"];

        $sql = "INSERT INTO travellers(name , email , password, number) VALUES( '$name',  '$email', '$password', '$number')";
        $result = mysqli_query($conn, $sql);

        // if($result){
        //   echo "successfully";
        // }
        // else{
        //   echo "not successfully";
        // }
}
// delete the data from table 

if(isset($_GET["delete"])){
$id = $_GET["delete"];

$sql = "DELETE FROM travellers WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// if($result){
//   echo "console.log(data delete successfully)";
// }else{
//   echo "error";
// }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>TravelTime</title>
</head>

<body>




    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100" style="z-index: 1000;">
        <div class="container-fluid ">
            <a class="navbar-brand fw-bold text-dark" href="#" style="font-size: 25px;">TRAVELTime</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="#" style="font-size: 20px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="#" style="font-size: 20px;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="#" style="font-size: 20px;">Contact</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- image rows -->
    <div class="hero-section text-white d-flex align-items-center"
        style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNsS1x6kPd4KR0VIiqXrtq-5RkOrvvZPuDwA&s'); background-size: cover; background-position: center; height: 600px; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h1 style="color: black; font-weight: 900;">Discover The World <br>With Us</h1>
                    <i style="color: #e30510; font-size: 25px;">Explore breathing destinations and create unforgettable
                        memories with our experted crafted tours</i>
                    <br><br>
                    <button type="button" class="btn btn-warning rounded-pill">start exploring</button>

                    <button type="button" class="btn btn-outline-warning rounded-pill">View Tours</button>
                </div>


                <div class="col-md-6 mx-auto text-dark">
      <div class="container" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid black; border-radius: 8px;">
  <form method="post">
    <div class="form-group fw-bold">
      <label for="name ">NAME:</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
     <div class="form-group fw-bold">
      <label for="email ">EMAIL:</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
     <div class="form-group fw-bold">
      <label for="password ">PASSWORD:</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
    </div>
     <div class="form-group fw-bold">
      <label for="number">PHONE NUMBER:</label>
      <input type="number" class="form-control" id="number" name="number" aria-describedby="emailHelp">
    </div>
<br><br>
   <div class="text-center">
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
    </div>


    <!-- showing the data  -->
     <div class="table">
      <table class="table">
        <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>NUMBER</th>
          <th>UPDATE AND DELETE</th>
        </tr>
        </thead>
       
        <tbody>
          <?php
          $sql = "SELECT *FROM travellers";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>"; 
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
    <!-- inage work ended over here -->

    <div class="container">
        <div class="row align-items-md-stretch my-5">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-secondary rounded-3">
                    <button class="btn text-white rounded-pill" style="background-color: rgb(185, 61, 82);">About Us</button>
                    <h3> Creating Unforgettable Travel Experiences</h3>
                    <ul style="color: black;">
                        <li>Your Next Adventure Awaits</li>
                        <li>Unforgettable Journeys, Just a Click Away</li>
                        <li>Experience Nature Like Never Before</li>

                    </ul>

                </div>
            </div>
            <div class="col-md-6">
                    <img src="b1.webp" alt="">
                </div>
            </div>
        </div>
    </div>
<div class="text-center ">
     <button class="btn text-white rounded-pill" style="background-color: rgb(185, 61, 82); font-size: 20px;">why choose us</button>
       <h1 class="mt-4" style="font-family: 'Times New Roman', Times, serif;">What Make Us Different</h1>
    </div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-5 border-bottom"></h2>
    <div class="row g-4 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon ">
<div class="text-center">
  <i class="bi bi-compass" 
     style="font-size: 40px; color: rgb(117, 4, 4);">
  </i>
</div>
        </div>
        <h2 class="text-center" style="font-style: italic;">Expert Navigation</h2>
       <p>Explore the world with confidence. Our expert navigation ensures you reach every destination smoothly — from bustling cities to hidden gems. Let us guide your path and make your travel dreams come true.</p>
      </div>

       <div class="feature col">
        <div class="feature-icon ">
<div class="text-center">
<i class="bi bi-heart-pulse-fill" style="font-size: 40px; color: hotpink;"></i>
    
  </i>
</div>
        </div>
        <h2 class="text-center" style="font-style: italic;">Personalized Care</h2>
        <p>Every traveler is unique — and so is every journey we design. From tailored itineraries to dedicated support, our personalized care ensures your travel experience matches your style, needs, and dreams</p>
      </div>
       <div class="feature col">
        <div class="feature-icon ">
<div class="text-center">
  <i class="bi bi-globe2" style="font-size: 40px; color: #007bff;"></i>
</div>
        </div>
        <h2 class="text-center" style="font-style: italic;">Worldwide Coverage</h2>
       <p>From iconic landmarks to hidden wonders, our world coverage ensures you can explore any corner of the globe with ease. Wherever your dreams take you, we’ve got the routes, partners, and expertise to get you there</p>

  </div>
  </div>
 </div>
<!-- Footer -->
<footer class="text-lg-start text-dark mt-5" style="background-color: #ECEFF1">
  
  <!-- Section: Social media -->
  <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
    <!-- Left -->
    <div>
      <span>Get connected with us on social networks:</span>
    </div>

    <!-- Right -->
    <div>
      <a href="" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
      <a href="" class="text-white me-4"><i class="fab fa-twitter"></i></a>
      <a href="" class="text-white me-4"><i class="fab fa-google"></i></a>
      <a href="" class="text-white me-4"><i class="fab fa-instagram"></i></a>
      <a href="" class="text-white me-4"><i class="fab fa-linkedin"></i></a>
      <a href="" class="text-white me-4"><i class="fab fa-github"></i></a>
    </div>
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links -->
  <section class="">
    <div class="container-fluid text-md-start mt-5 px-5">
      <div class="row mt-3">
        
        <!-- Company -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
          <h6 class="text-uppercase fw-bold">TRAVELTime</h6>
          <hr class="mb-4 mt-0" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p>
            Your trusted partner for unforgettable travel experiences. From breathtaking destinations to personalized itineraries, we make your journey seamless and memorable. Explore the world with us and create stories worth sharing.
          </p>
        </div>

        <!-- Products -->
        <div class="col-md-2 col-lg-2 col-xl-2 mb-4">
          <h6 class="text-uppercase fw-bold">Products</h6>
          <hr class="mb-4 mt-0" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><a href="#!" class="text-dark">Holiday Packages</a></p>
          <p><a href="#!" class="text-dark">Luxury Cruises</a></p>
          <p><a href="#!" class="text-dark">Adventure Trips</a></p>
          <p><a href="#!" class="text-dark">Weekend Getaways</a></p>
        </div>

        <!-- Useful links -->
        <div class="col-md-3 col-lg-2 col-xl-2 mb-4">
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><a href="#!" class="text-dark">Travel Blog</a></p>
          <p><a href="#!" class="text-dark">Booking Terms & Conditions</a></p>
          <p><a href="#!" class="text-dark">Privacy Policy</a></p>
          <p><a href="#!" class="text-dark">Customer Support</a></p>
        </div>

        <!-- Contact -->
        <div class="col-md-4 col-lg-3 col-xl-3 mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p><i class="fas fa-envelope me-3"></i> info@example.com</p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>

      </div>
    </div>
  </section>
  <!-- Section: Links -->

  <!-- Copyright -->
  <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2025 Copyright: tourism
  </div>

</footer>

<!-- Footer -->

     














    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

<!-- GSAP Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>


<script>
 // Navbar Animation
    gsap.from("nav", {
        duration: 1,
        y: -100,
        opacity: 0,
        ease: "power3.out"
    });

    // Hero Section Animation
    gsap.from(".hero-section h1", {
        duration: 1.2,
        y: 50,
        opacity: 0,
        delay: 0.5,
        ease: "power2.out"
    });

    gsap.from(".hero-section i", {
        duration: 1.2,
        y: 30,
        opacity: 0,
        delay: 1,
        ease: "power2.out"
    });

    gsap.from(".hero-section button", {
        duration: 0.8,
        scale: 0.8,
        opacity: 0,
        delay: 1.5,
        stagger: 0.2,
        ease: "back.out(1.7)"
    });

    // Section Scroll Animations
    gsap.utils.toArray(".container").forEach(section => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none reverse"
            },
            opacity: 0,
            y: 50,
            duration: 1
        });
    });

    // Icon Bounce Animation on Scroll
    gsap.utils.toArray(".feature-icon i").forEach(icon => {
        gsap.from(icon, {
            scrollTrigger: {
                trigger: icon,
                start: "top 85%"
            },
            y: -20,
            opacity: 0,
            duration: 0.8,
            ease: "bounce.out"
        });
    });

    // Button Hover Animation
    document.querySelectorAll("button").forEach(btn => {
        btn.addEventListener("mouseenter", () => {
            gsap.to(btn, { scale: 1.05, duration: 0.2 });
        });
        btn.addEventListener("mouseleave", () => {
            gsap.to(btn, { scale: 1, duration: 0.2 });
        });
    });

</script>
</body>
</html>