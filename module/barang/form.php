<?php 

    $barang_id = isset($_GET['barang_id']) ? $_GET['kategori_id'] : false;

    // $kategori = "";
    $status = "";
    $button = "Add";

    // if($kategori_id){
    //     $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
    //     $row =mysqli_fetch_assoc($queryKategori);

    //     $kategori =$row['kategori'];
    //     $status =$row['status'];
    //     $button = "Update";

    // }
?>

<form action="<?php echo BASE_URL."module/kategori/action.php?barang_id=$kategori_id";?>" method="POST">

    <div class="element-form">
        <label>Kategori</label>
        <span>

            <select name="kategori_id">
                <option value="A">Ayam</option>
                <option value="A">Ayam</option>
                <option value="A">Ayam</option>
        </span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on") {echo "checked='true'";} ?> /> On
            <input type="radio" name="status" value="off" <?php if($status == "off") {echo "checked='true'";} ?> /> off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
    </div>


</form>