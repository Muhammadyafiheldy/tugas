<?php
include '../koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Article</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" /> -->
<!-- <link rel="apple-touch-icon" href="images/apple-touch-icon.png"> -->

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="css/version/tech.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand " href="headerr.php?page=home "><img src="../img/logo.jpeg"  class="rounded-circle" style="width: 50px;" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="headerArtikel.php?page=home">Home</a>
                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="container">
                                            <div class="mega-menu-content clearfix">

                                                <div class="tab">
                                                    <button class="tablinks active" onclick="openCategory(event, 'cat01')">Info</button>
                                                    <button class="tablinks" onclick="openCategory(event, 'cat02')">Tips and trik</button>
                                                    <button class="tablinks" onclick="openCategory(event, 'cat03')">Tutorial</button>
                                                    <button class="tablinks" onclick="openCategory(event, 'cat04')">Olahraga</button>
                                                    <button class="tablinks" onclick="openCategory(event, 'cat05')">Nutrisi</button>
                                                </div>

                                                <div class="tab-details clearfix">
                                                    <!-- info -->
                                                    <div id="cat01" class="tabcontent active">
                                                        <div class="row">
                                                            <?php
                                                            $data = mysqli_query($koneksi, "SELECT * from artikel WHERE kategori = 'info' ");
                                                            while ($row = mysqli_fetch_array($data)) {
                                                            ?>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="blog-box">
                                                                        <div class="post-media">
                                                                            <a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title="">
                                                                                <img src="../gambar/<?php echo $row['foto']; ?>" alt="" class="img-fluid">
                                                                                <div class="hovereffect">
                                                                                </div><!-- end hover -->
                                                                                <span class="menucat"><?php echo $row['kategori']; ?></span>
                                                                            </a>
                                                                        </div><!-- end media -->
                                                                        <div class="blog-meta">
                                                                            <h4><a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title=""><?php echo $row['judul']; ?></a></h4>
                                                                        </div><!-- end meta -->
                                                                    </div><!-- end blog-box -->
                                                                </div>
                                                            <?php
                                                            } ?>
                                                        </div><!-- end row -->

                                                    </div>

                                                    <!-- tips and trik -->
                                                    <div id="cat02" class="tabcontent">
                                                        <div class="row">
                                                            <?php
                                                            $data = mysqli_query($koneksi, "SELECT * from artikel WHERE kategori = 'tips and trik' ");
                                                            while ($row = mysqli_fetch_array($data)) {
                                                            ?>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="blog-box">
                                                                        <div class="post-media">
                                                                            <a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title="">
                                                                                <img src="../gambar/<?php echo $row['foto']; ?>" alt="" class="img-fluid">
                                                                                <div class="hovereffect">
                                                                                </div><!-- end hover -->
                                                                                <span class="menucat"><?php echo $row['kategori']; ?></span>
                                                                            </a>
                                                                        </div><!-- end media -->
                                                                        <div class="blog-meta">
                                                                            <h4><a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title=""><?php echo $row['judul']; ?></a></h4>
                                                                        </div><!-- end meta -->
                                                                    </div><!-- end blog-box -->
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div><!-- end row -->
                                                    </div>


                                                    <!-- tutorial -->
                                                    <div id="cat03" class="tabcontent">
                                                        <div class="row">
                                                            <?php
                                                            $data = mysqli_query($koneksi, "SELECT * from artikel WHERE kategori = 'tutorial' ");
                                                            while ($row = mysqli_fetch_array($data)) {
                                                            ?>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                    <div class="blog-box">
                                                                        <div class="post-media">
                                                                            <a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title="">
                                                                                <img src="../gambar/<?php echo $row['foto']; ?>" alt="" class="img-fluid">
                                                                                <div class="hovereffect">
                                                                                </div><!-- end hover -->
                                                                                <span class="menucat"><?php echo $row['kategori']; ?></span>
                                                                            </a>
                                                                        </div><!-- end media -->
                                                                        <div class="blog-meta">
                                                                            <h4><a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title=""><?php echo $row['judul']; ?></a></h4>
                                                                        </div><!-- end meta -->
                                                                    </div><!-- end blog-box -->
                                                                </div>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </div><!-- end row -->

                                                    <!-- olahraga -->
                                                    <div id="cat04" class="tabcontent">
                                                        <div class="row">
                                                        <?php
                                                            $data = mysqli_query($koneksi, "SELECT * from artikel WHERE kategori = 'olahraga' ");
                                                            while ($row = mysqli_fetch_array($data)) {
                                                            ?>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title="">
                                                                            <img src="../gambar/<?php echo $row['foto']; ?>" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            <span class="menucat"><?php echo $row['kategori']; ?></span>

                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title=""><?php echo $row['judul']; ?></a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>    
                                                            <?php 
                                                            }?>
                                                        </div><!-- end row -->
                                                    </div>


                                                    <!-- nutrisi -->
                                                    <div id="cat05" class="tabcontent">
                                                        <div class="row">
                                                        <?php
                                                            $data = mysqli_query($koneksi, "SELECT * from artikel WHERE kategori = 'nutrisi' ");
                                                            while ($row = mysqli_fetch_array($data)) {
                                                            ?>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title="">
                                                                            <img src="../gambar/<?php echo $row['foto']; ?>" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            <span class="menucat"><?php echo $row['kategori']; ?></span>
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="learnMore.php?id=<?php echo $row['id_artikel']; ?>" title=""><?php echo $row['judul']; ?></a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>
                                                                <?php
                                                            }?>
                                                        </div><!-- end row -->
                                                    </div>
                                                </div><!-- end tab-details -->
                                            </div><!-- end mega-menu-content -->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                        
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <div class="wrapper">
        <?php
                    //  include '../admin.php';
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {
                            case 'home':
                                include 'artikel.php';
                                break;
                         

                            default:
                             include 'artikel.php';
                                break;
                        }
                    }
                    ?>
        </div>
     



     
        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>