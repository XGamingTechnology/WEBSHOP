<?php
    define("BASE_URL", "http://localhost/webshop/");

    $arrayStatusPesanan[0] ="Menunggu Pembayaran";
    $arrayStatusPesanan[1] ="Pembayaran Sedang Di Validasi";
    $arrayStatusPesanan[2] ="Lunas";
    $arrayStatusPesanan[3] ="Pembayaran Di Tolak";

    function rupiah($nilai = 0) {
        $string = "Rp," . number_format($nilai);
        return $string;
    }

    function kategori ($kategori_id = false) {
        global $koneksi;

        $string = "<div id='menu-kategori'>";

        $string .= "<ul>";
 
                $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
                
                while($row=mysqli_fetch_assoc($query)) {
                    if($kategori_id== $row['kategori_id']){
                    $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
                    }else {
                        $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
                    }
                }

        $string .= "</ul>";

    $string .= "</div>";

    return $string;

    }

    function admin_only($module, $level) {
        if($level != "superadmin") {
            $admin_pages = array ("kategori", "barang", "kota", "user", "banner");
            if(in_array($module, $admin_pages)) {
                header("location: ".BASE_URL);
            }
        }
    }

    function pagination($query_or_result, $data_per_halaman, $pagination, $url, $module) {
        global $koneksi;
    
        // Jika yang diberikan adalah query SQL, eksekusi query dan ambil hasilnya
        if (is_string($query_or_result)) {
            $result = mysqli_query($koneksi, $query_or_result);
            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }
        } 
        // Jika yang diberikan adalah objek mysqli_result, gunakan langsung
        else {
            $result = $query_or_result;
        }
    
        $total_data = mysqli_num_rows($result);
        $total_halaman = ceil($total_data / $data_per_halaman);
    
        echo "<ul class='pagination'>";
        for ($i = 1; $i <= $total_halaman; $i++) {
            if ($pagination == $i) {
                echo "<li><a class='active' href='" . BASE_URL . "$url&pagination=$i'>$i</a></li>";
            } else {
                echo "<li><a href='" . BASE_URL . "$url&pagination=$i'>$i</a></li>";
            }
        }
        echo "</ul>";
    }
    
    
    


   