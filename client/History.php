<?php
session_start();
$sessUsername = $_SESSION["username"];
$sessLogIn = $_SESSION["isLoggedIn"];

if (!isset($_SESSION['username'])) {
   header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>History Page</title>
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
   <div class="container-fluid" id="history">
      <?php include_once "./components/NavWithLink.php" ?>

      <div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
         <div class="card shadow-sm" style="height: 85vh; width: 95vw">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h3 class="fw-bold">History Table</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12 col-sm-5 mb-2 ">
                     <!-- Search -->
                     <div class="row">
                        <div class="col-4">
                           <input v-model="form.search" class="form-control form-control-sm" type="text"
                              placeholder="Search" id="Search" aria-label="Search" />
                        </div>
                        <div class="col-4">
                           <input v-model="form.datetime" class="form-control form-control-sm" type="date"
                              id="dateSearch" aria-label="dateSearch" />
                        </div>
                        <div class="col-4">
                           <button class="btn btn-secondary btn-sm me-2" @click="getInfo()">
                              <i class="fas fa-search"></i>
                           </button>
                           <button type="reset" class="btn btn-danger btn-sm"
                              @click="form.search = '', form.datetime = '',getInfo() ">
                              <i class="far fa-trash-alt"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <?php include_once "./components/HistoryPage/TableHistory.php" ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php include_once "./components/Footer.php" ?>

      <?php include_once "./components/HistoryPage/ModalHistory.php" ?>
   </div>

   <!-- BS Script files. -->
   <script src="js/jquery-3.5.1.slim.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- JS -->
   <script src="./History.js"></script>

</html>