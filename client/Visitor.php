<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Visitor Page</title>
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
   <div class="container-fluid" id="visitor">
      <?php include_once "./components/Nav.php" ?>
      <div class="d-flex justify-content-center align-items-center mb-2 pt-3" style="height: 88vh;">
         <div class="card shadow-sm overflow-auto h-100" style="height: 90vh; width: 96vw">
            <div class="card-header d-flex justify-content-between align-items-center">
               <div>
                  <h4 class="font-thai fw-bold">บันทึกข้อมูลการเดินทางสำหรับผู้มาติดต่อบริษัท</h4>
                  <h5 class="fw-bold">(TRAVEL HISTORY FORM FOR VISITOR)</h5>
               </div>

            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12 col-sm-5 mb-3 border-end border-2">
                     <?php include_once "./components/visitorPage/Information.php" ?>
                  </div>
                  <div class="col-12 col-sm-7 mb-2 overflow-auto" style="height: 70vh;">
                     <?php include_once "./components/visitorPage/Timeline.php" ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include_once "./components/Footer.php" ?>
      <?php include_once "./components/visitorPage/ModalVisit.php" ?>
   </div>

   <!-- BS Script files. -->
   <script src="js/jquery-3.5.1.slim.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- JS -->
   <script src="./Visitor.js"></script>
</body>

</html>