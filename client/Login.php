<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <!-- Bootstap -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Vue.js -->
   <script src="https://unpkg.com/vue@next"></script>
   <!-- Font -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@200;400;600;800&display=swap"
      rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,300&display=swap"
      rel="stylesheet">
   <!-- Axios -->
   <script src="js/axios/axios.min.js"></script>
   <!-- SweetAlert2 (CSS) -->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- FontAwesome -->
   <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
   <!-- Custom style -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="container-fluid" id="login">
      <?php include_once "./components/Nav.php" ?>

      <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
         <div>
            <h2><b>Sign in</b> to start your session</h2>
            <div class="card shadow mt-4">
               <div class="card-body p-5 py-4" align="center">
                  <form action="" method="post" @submit="handleSubmit">
                     <div class="text-start mb-2">
                        <label for="#username" class="fw-bold fs-5">Username</label>
                        <div class="input-group ">
                           <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                           <input v-model="form.username" type="text" class="form-control border-start-0"
                              placeholder="Type your username" id="username" name="username" required>
                        </div>
                     </div>
                     <div class="text-start mb-3">
                        <label for="#password" class="fw-bold fs-5">Password</label>
                        <div class="input-group ">
                           <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                           <input v-model="form.password" type="password" class="form-control border-start-0"
                              placeholder="Type your password" id="password" name="password" required>
                        </div>
                     </div>
                     <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary rounded-pill" value="Sign in">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <?php include_once "./components/Footer.php" ?>
   </div>

   <!-- BS Script files. -->
   <script src="js/jquery-3.5.1.slim.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- JS -->
   <script src="./Login.js"></script>

</body>


</html>