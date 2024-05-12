<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ADMIN</title>
        <!-- base:css -->
        <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../images/favicon.png" />
        <style>
        /* Custom CSS for CKEditor container */
        .ck-editor__editable_inline {
            min-height: 300px; /* Chiều cao tối thiểu */
            width: 100%; /* Chiều rộng */
        }
    </style>
    </head>
    <?php include('../../../db/connect.php') ?>
    <?php session_start() ?>
    <body>
        <div class="row" id="proBanner">
        <div class="col-12" style="display: none">
            <span class="d-flex align-items-center purchase-popup">
            <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
            <a href="#" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
            <i class="typcn typcn-delete-outline" id="bannerClose"></i>
            </span>
        </div>
        </div>
        <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include('../../components/navbar.php') ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <?php include('../../components/setting-panel.php') ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                <!-- Form search -->
                <form action="" method="POST">
                    <div class="row"> 
                        <div class="col-lg-12 d-flex grid-margin stretch-card">
                            <div class="input-group">
                                <input type="text" name="search-info" class="form-control" placeholder="Enter product ID, name, description, price,..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button name="btn-search" class="btn btn-sm btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- end -->
                <!-- alert -->
                <?php include('../../components/alert.php'); ?>
                <!-- tiếp -->
                <div class="row">
                    <?php
                    // Số lượng dòng trên mỗi trang
                    $rows_per_page = 48;

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ((isset($_POST['search-info']) && $_POST['search-info'] != '') OR isset($_POST['btn-search'])) {
                        // Xác định trang hiện tại
                        $page = 1;
                        // Tính toán offset (vị trí bắt đầu của dòng trong kết quả)
                        $offset = ($page - 1) * $rows_per_page;
                            $query = $_POST['search-info'];
                            // Thực hiện truy vấn để lấy số lượng dòng
                            $count_query = "SELECT COUNT(*) AS total FROM products WHERE ID LIKE '%$query%' OR product_name LIKE '%$query%' OR product_info LIKE '%$query%' OR product_price LIKE '%$query%'";
                            $count_result = mysqli_query($conn, $count_query);
                            $count_row = mysqli_fetch_assoc($count_result);
                            $total_rows = $count_row['total'];
                        }
                    } else {
                        // Xác định trang hiện tại
                        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        // Tính toán offset (vị trí bắt đầu của dòng trong kết quả)
                        $offset = ($page - 1) * $rows_per_page;
                        // Thực hiện truy vấn để lấy số lượng dòng
                        $count_query = "SELECT COUNT(*) AS total FROM products";
                        $count_result = mysqli_query($conn, $count_query);
                        $count_row = mysqli_fetch_assoc($count_result);
                        $total_rows = $count_row['total'];
                    }
                    

                    // Tính toán số trang
                    $total_pages = ceil($total_rows / $rows_per_page);

                    // Hiển thị liên kết "Previous" và "Next" nếu cần
                    $prev_page = $page - 1;
                    $next_page = $page + 1;


                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ((isset($_POST['search-info']) && $_POST['search-info'] != '') OR isset($_POST['btn-search'])) {
                            // Thực hiện truy vấn dữ liệu với phân trang
                            $sql = "SELECT * FROM products WHERE ID LIKE '%$query%' OR product_name LIKE '%$query%' OR product_info LIKE '%$query%' OR product_price LIKE '%$query%' LIMIT $offset, $rows_per_page";
                        }
                    } else {
                        // Thực hiện truy vấn dữ liệu với phân trang
                        $sql = "SELECT * FROM products LIMIT $offset, $rows_per_page";
                    }
                    $result = mysqli_query($conn, $sql);


                    // Kiểm tra và xử lý kết quả
                    if (mysqli_num_rows($result) > 0) {
                        // Lặp qua các dòng kết quả và hiển thị
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sqlCategory = "SELECT * FROM categories WHERE id =".$row['category_ID'];
                            $resultCategory = mysqli_query($conn, $sqlCategory);
                            $category_name = mysqli_fetch_assoc($resultCategory);
                            ?>
                            <div class="col-xl-3 d-flex grid-margin stretch-card">
                                <div class="card shadow-lg" style="border-radius: 10px">
                                    <div class="position-relative">
                                        <!-- Badge -->
                                        <span class="badge bg-primary p-2 position-absolute text-white" style="font-weight: bold; font-size: 16px; right:5px; top: 5px">15%</span>
                                    </div>
                                    <div class="d-flex justify-content-center pt-1">
                                        <img src="<?= $row['product_image'] ?>" class="card-img-top" alt="<?= $row['product_name'] ?>" style="width: 60%">
                                    </div>                            
                                    <div class="card-body">
                                        <p class="card-title" style="margin-bottom: 2px; font-size: 14px"><?= $row['product_name'] ?></p>
                                        <div class="pt-2 pb-2 d-flex bd-highlight">
                                            <div class="flex-fill">
                                                <p class="card-text">#<?= $category_name['category_name']; ?></p>
                                            </div>
                                            <div class="flex-fill">
                                                <p class="card-text"><?= $row['product_quantity'] ?> left</p>
                                            </div>
                                        </div>
                                        <p class="card-text">$<?= $row['product_price'] ?></p>
                                        <div class="d-flex bd-highlight">
                                            <div class="pt-2 flex-fill">
                                                <a href="update.php?ID=<?= $row['ID'] ?>" class="btn btn-primary">Edit</a>
                                            </div>
                                            <div class="pt-2 flex-fill">
                                                <a href="#" class="btn btn-light">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        $_SESSION['warning'] = 'Không tìm thấy sản phấm';
                    }

                    ?>
                    
                </div>
                <!-- end -->
                <?php include('../../components/alert.php'); ?>
                <!-- Pagination -->
                <?php
                    // Hiển thị phân trang
                    echo "<ul class='pagination justify-content-center'>";
                    if ($prev_page > 0) {
                        echo "<li class='page-item'><a class='page-link' href='?page=$prev_page' style='font-size: 16px; padding: 10px 13px'>Previous</a></li>";
                    }
                    // Hiển thị các liên kết trang gần đó
                    $start_page = max($page - 2, 1);
                    $end_page = min($page + 2, $total_pages);
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        $active = ($page == $i) ? "active" : "";
                        echo "<li class='page-item $active'><a class='page-link' href='?page=$i' style='font-size: 16px; padding: 10px 13px'>$i</a></li>";
                    }

                    if ($next_page <= $total_pages) {
                        echo "<li class='page-item'><a class='page-link' href='?page=$next_page'style='font-size: 16px; padding: 10px 13px'>Next</a></li>";
                    }
                    echo "</ul>";
                ?>
                <!-- end -->
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include('../../components/footer.php') ?>
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php 
        // Đóng kết nối
        mysqli_close($conn);
    ?>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        // Khởi tạo CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- End CKEditor -->
    <!-- base:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../../vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>