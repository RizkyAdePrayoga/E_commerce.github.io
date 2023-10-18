<?php
session_start();

// Fungsi untuk membuat koneksi ke database
function createConnection() {
    $servername = "localhost";  // Ganti dengan alamat server MySQL Anda
    $username = "root";     // Ganti dengan username MySQL Anda
    $password = "";     // Ganti dengan password MySQL Anda
    $dbname = "penjualan_codebrew";  // Ganti dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $stok = $_POST['stok'];
    $jumlah = $_POST['jumlah'];

    // Membuat koneksi
    $conn = createConnection();

    // Persiapkan query untuk menyimpan data ke tabel keranjang_belanja
    $sql = $conn->prepare("INSERT INTO keranjang_belanja (nama_barang, haga_barang, jumlah, id_pelanggan) VALUES (?, ?, ?, ?)");
    $sql->bind_param("siii", $nama_barang, $harga_barang, $jumlah, $_SESSION['id_pelanggan']); // Anda perlu sesuaikan dengan id pengguna

    // Jalankan query
    if ($sql->execute()) {
        echo "Produk berhasil ditambahkan ke keranjang. <a href='cart.php'>Lihat Keranjang</a>";
    } else {
        echo "Penambahan produk ke keranjang gagal. Silakan coba lagi.";
    }

    // Tutup koneksi
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECommerce-ShoppingCart | Korsat X Parmaga</title>

    <!-- box icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- styles  -->
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="index.js">
</head>

<body>
    <!-- HEADER  -->
    <header>
        <!-- NAV  -->
        <nav>
            <div class="nav container">
                <a href="#" class="logo"><span>CODE</span>BREW</a>
                <button><a href="login.php" class="logo">Logout</a></button>
                <!-- CART ICON  -->
                <i class='bx bx-shopping-bag' id="cart-icon"></i>
    
                <!-- CART  -->
                <div class="cart" id="cart">
                    <h2 class="cart-title">Your Cart</h2>
                
                    <!-- CONTENT -->
                    <div class="cart-content">
                        <!-- Your cart content here -->
                    </div>
                
                    <!-- TOTAL   -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">$0</div>
                    </div>
                    <!-- BUY BUTTON  -->
                    <a href="order_loading.php">
                        <button type="button" class="btn-buy">Buy Now</button>
                    </a>
                    <!-- CART CLOSE  -->
                    <i class='bx bx-x' id="cart-close"></i>
                </div>
            </div>
        </nav>
    </header>


    <!-- SHOP SECTION  -->
    <section class="shop container">

        <h1 class="section-title">Selamat datang <?php echo $_SESSION['nama'];?>, silahkan memesan menu kami</h1>
        <h2 class="section-title">Shop Products</h2>

        <div>
            <button></button>
        </div>

        <!-- CONTENT  -->
        <div class="shop-content">
            <!-- BOX 1 -->
            <div class="product-box" name="makanan1">
                <img src="assets/img/product1.jpg" alt="" class="product-img">
                <h2 class="product-title">Nike Shoes</h2>
                <span class="product-price">$79.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 2 -->
            <div class="product-box" name="makanan">
                <img src="assets/img/product2.jpg" alt="" class="product-img">
                <h2 class="product-title">BACKPACK</h2>
                <span class="product-price">$59.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 3 -->
            <div class="product-box" name="makanan3">
                <img src="assets/img/product3.jpg" alt="" class="product-img">
                <h2 class="product-title">METAL BOTTLE</h2>
                <span class="product-price">$29.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 4 -->
            <div class="product-box" name="makanan4">
                <img src="assets/img/product4.jpg" alt="" class="product-img">
                <h2 class="product-title">METAL SUNGLASSES</h2>
                <span class="product-price">$105</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 5 -->
            <div class="product-box" name="minuman1">
                <img src="assets/img/product5.jpg" alt="" class="product-img">
                <h2 class="product-title">PS5 Controller</h2>
                <span class="product-price">$95</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 6 -->
            <div class="product-box" name="minuman2">
                <img src="assets/img/product6.jpg" alt="" class="product-img">
                <h2 class="product-title">Galaxy Z Fold</h2>
                <span class="product-price">$1400</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 7 -->
            <div class="product-box" name="minuman3">
                <img src="assets/img/product7.jpg" alt="" class="product-img">
                <h2 class="product-title">Nokon Camera</h2>
                <span class="product-price">$1700</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 8 -->
            <div class="product-box" name="minuman4">
                <img src="assets/img/product8.jpg" alt="" class="product-img">
                <h2 class="product-title">Apple Watch</h2>
                <span class="product-price">$110.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
        </div>
    </section>

    <!-- link js  -->
    <script src="assets/js/main.js"></script>
</body>
</html>