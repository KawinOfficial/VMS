<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Visitor Management System</title>
   <link rel="icon" type="image/svg+xml" href="./img/pandemic.svg" />
   <!-- Bootstap -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Vue.js -->
   <script src="js/vue/vue.min.js"></script>
   <!-- Font -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@200;400;600;800&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
   <!-- Axios -->
   <script src="js/axios/axios.min.js"></script>
   <!-- SweetAlert2 (CSS) -->
   <link rel="stylesheet" href="css/sweetalert2/sweetalert2.min.css">
   <!-- FontAwesome -->
   <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
   <!-- Custom style -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class=" container-fluid">
      <div class="d-grid justify-content-center align-items-center pb-5" style="height: 97vh;">
         <div align="center">
            <img src="./img/logo.png" alt="SNClogo" style="height: 20vh;">
            <div class="row mt-3 ">
               <div class="col-6">
                  <a href="Visitor.php" role="button" class="btn border-dark font-thai w-75">
                     <i class="fas fa-user-edit px-1"></i>
                     ผู้มาติดต่อ (Visitor)
                  </a>
               </div>
               <div class="col-6">
                  <a href="Login.php" role="button" class="btn border-dark text-dark font-thai w-75">
                     <i class="fas fa-sign-in-alt px-1"></i>
                     ผู้อนุมัติ (Approver)
                  </a>
               </div>
            </div>
         </div>
      </div>
      <?php include_once "./components/Footer.php" ?>
   </div>


   <!-- BS Script files. -->
   <script src="js/jquery-3.5.1.slim.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>