<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- <link rel="stylesheet" href="css/morris.css"> -->
</head>

<?php
    //kiem tra phai dang nhap moi vao dc trang index
    session_start();
    if (!isset($_SESSION['dangnhap'])) {
        header("Location:login.php");
    }
?>

<body>
   <div class="container-scroller">
    <!-- Trang logo -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="http://thegioiphukiendidong.com/webphukien/admincp">
            <img src="../images/logo.png" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="http://thegioiphukiendidong.com/webphukien/admincp">
            <img src="../images/logo.png" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Day, <span class="text-black fw-bold"><?php echo $_SESSION['dangnhap']; ?></span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <!--Lich hien tai-->
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <div id="settings-trigger"><i class="ti-settings"></i></div>
          <!-- <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li> -->

          <!-- Thong tin admin -->
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../images/adminicon.png" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="../images/adminicon.png" height="50px" width="50px" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['dangnhap']; ?></p>
                <p class="fw-light text-muted mb-0"><?php echo $_SESSION['dangnhap']; ?>@gmail.com</p>
              </div>
             
              <a class="dropdown-item"  href="index.php?dangxuat=1"><i class="dropdown-item-icon mdi mdi-power text-primary me-2" ></i>Sign Out <?php if (isset($_SESSION['dangnhap'])) {
                  echo $_SESSION['dangnhap'];
              } ?></a>
            </div>
          </li>
        </ul>
        <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button> -->
      </div>
    </nav>
 
    <div class="container-fluid page-body-wrapper">
      <!-- Sida bar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="http://thegioiphukiendidong.com/webphukien/admincp/">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Danh mục</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Danh mục</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=quanlylienhe&query=capnhat">Quản lý liên hệ</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">

                  <div class="col-md-12">
                  <?php
                  include("config/config.php");
                  include("modules/header.php");
                //   include("modules/menu.php");
                  include("modules/main.php");
                  include("modules/footer.php");
                    //   include("modules/quanlydanhmucsp/them.php");
                     ?>
                  </div>

              </div>
            </div>

          </div>
        </div>
  <!-- container-scroller -->
    

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>

    <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
    <script type="text/javascript" src="../js/raphael-min.js"></script>
    
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
    <script type="text/javascript" src="../js/morris.min.js"></script>

    <script>
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
        CKEDITOR.replace('thongtinlienhe');
    </script>
    <!-- <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2008', value: 20 },
                { year: '2009', value: 10 },
                { year: '2010', value: 5 },
                { year: '2011', value: 5 },
                { year: '2012', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });
    </script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            thongke();
            var char = new Morris.Area({
                // hiển thị dựa trên thành phần id
                element: 'chart',

                // trục hoành
                xkey: 'date',
                // trục tung
                ykeys: ['date', 'order', 'sales', 'quantity'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Ngày đặt','Đơn hàng','Doanh thu','Số lượng bán ra']
            });

            $('.select-date').change(function() {
                var thoigian = $(this).val();
                if (thoigian == '7ngay') {
                    var text = '7 ngày qua';
                } else if(thoigian == '28ngay') {
                    var text = '28 ngày qua';
                } else if(thoigian == '90ngay') {
                    var text = '90 ngày qua';
                } else {
                    var text = '365 ngày qua';
                }
                
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data) {
                        // day bien data vao bieu do morris
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            
            });
            

            function thongke() {
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",

                    success:function(data) {
                        // day bien data vao bieu do morris
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            }
        });
    </script>
    <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <!-- <script src="js/hoverable-collapse.js"></script> -->
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  
  <!-- hien thi truoc khi up hinh anh truoc khi them vao quan ly san pham -->
  <script>
    function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
    }
    $("#image").change(function () {
        imagePreview(this);
    });
  </script>
</body>
</html>