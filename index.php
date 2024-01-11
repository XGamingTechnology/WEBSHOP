<?php 

session_start();


include_once("function/helper.php");
include_once("function/koneksi.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop | Barang - barang elektronik</title>
    <link href="<?php echo BASE_URL."css/style.css";?>" type="text/css" rel="stylesheet" />

    <script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

</head>

<body>

    <div id="container">
        <div id="header">
            <a href="<?php echo BASE_URL."index.php";?>">
                <img src="<?php echo BASE_URL."images/logo.png"; ?>" />
            </a>
            <div id="menu">
                <div id="user">
                    <?php
                    if($user_id){
                        echo "Hi <b>$nama</b>,
                              <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                              <a href='".BASE_URL."logout.php'>logout</a>";
                    }else{
                        echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
                             <a href='".BASE_URL."index.php?page=register'>Register</a>";
                    }
                    ?>
                </div>
                <a href="<?php echo BASE_URL."index.php?page=kerajang";?>" id="button-kerajang">
                    <img src="<?php echo BASE_URL."images/cart.png"; ?>" />
                </a>
            </div>

            <div id="content">

                <?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
            </div>

            <div id="footer">
                <p>copy right webshop 2023</p>
            </div>

</body>

</html>