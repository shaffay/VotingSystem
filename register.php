
<?php

include("db.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
      .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
  </style>
</head>
  <body>
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 ">

            <form action="register.php" method="post">
      

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter your Details!</p>





       
              <?php 

            if(isset($_GET['msg'])){
              $msg = $_GET['msg'];

              if($msg == "already"){ 
                ?>    

              <!-- //Alert Start -->
            
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Hey There!</strong> This email is already exist.
              </div>

             <!-- //Alert END -->
       
             <?php  } } ?>
              

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Name</label>
                <input type="text"  name="name" class="form-control form-control-lg" />
               
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Gender</label> 
              <select  name="gender" class="form-control form-control-lg">
                <Option></Option>
                <Option>Male</Option>
                <Option>Female</Option>
              </select>
                
                
                
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" />
                
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" />
            
              </div>

              <div class="text-center">

                  <input type="submit"  class="btn btn-outline-light btn-lg px-5" value="Register" name="reg">

              </div>

           

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>
        
            </form>
            <div>
              <p class="mb-0">Do you have an account already? <a href="login.php" class="text-white-50 fw-bold">Login Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php




if(isset($_POST['reg']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];


  $check_email = $con->query("SELECT * FROM `user` WHERE `email`='$email';");

  $data = mysqli_fetch_array($check_email);


  if($data['email'] == $email){
    $msg="already";
    echo("<script>location.href = 'register.php?msg=$msg';</script>");

  }else{
    $insert =  $con->query("INSERT INTO `user`( `name`, `email`, `password`, `gender`) VALUES ('$name','$email','$password','$gender')");

    if($insert){
   
     $msg="register";
   
     echo("<script>location.href = 'login.php?msg=$msg';</script>");
   
    }
   
  }


}

?>

