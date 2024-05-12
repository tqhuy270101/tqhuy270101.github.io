<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CelestialUI Admin</title>
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
    <body>
        <?php include('../../../db/connect.php') ?>
        <?php session_start(); ?>
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
                <!-- check warning -->
                <?php
                include('../../components/alert.php')
                ?>
                <!-- tiếp -->
                <!-- select -->
                <?php
                // ID của sản phẩm bạn muốn hiển thị
                    $product_id = $_GET['ID']; // Thay đổi ID sản phẩm tùy theo nhu cầu của bạn
                    // Truy vấn SQL để lấy thông tin của sản phẩm dựa trên ID
                    $sql = "SELECT * FROM products WHERE ID =".$product_id;
                    $result = mysqli_query($conn, $sql);

                    // Truy vấn SQL category
                    $sql_categories = "SELECT * FROM categories";
                    $result_categories = mysqli_query($conn, $sql_categories);

                    // Kiểm tra và hiển thị thông tin của sản phẩm
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <!-- Form update -->
                        <div class="row">
                            <div class="col-lg-12 d-flex grid-margin stretch-card">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update product</h4>
                                        <!-- <p class="card-description">
                                            Basic form elements
                                        </p> -->
                                        <form class="forms-sample" action="../../handle/product.php?ID=<?= $_GET['ID'] ?>" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputName1" value="<?= $row['product_name'] ?>" name="product-name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary text-white">$</span>
                                                    </div>
                                                    <input type="number" class="form-control" id="exampleInputEmail3" value="<?= $row['product_price'] ?>" name="product-price" placeholder="Price" aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Category</label>
                                                <select class="form-control" id="exampleSelectGender" name="product-category">
                                                <?php
                                                while ($row_category = mysqli_fetch_assoc($result_categories)) {
                                                    $selected = ($row_category['ID'] == $row['category_ID']) ? 'selected' : '';
                                                    echo '<option value="' . $row_category['ID'] . '" ' . $selected . '>' . $row_category['category_name'] . '</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCity1">Quantity</label>
                                                <input type="number" min=0 class="form-control" id="exampleInputCity1" value="<?= $row['product_quantity'] ?>" name="product-quantity" placeholder="Quantity" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Image upload</label>
                                                <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="file" class="form-control file-upload-info" name="product-image" placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="editor">Description</label>
                                                <textarea class="form-control" name="product-info" id="editor" required><?= $row['product_info'] ?></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2" name="btn-product-update">Submit</button>
                                            <a class="btn btn-light" onclick="goBack()">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        <?php
                    } else {
                        $_SESSION['warning'] = 'Không tìm thấy sản phấm';
                    }
                ?>
                <!-- end -->
                <!-- check warning -->
                <?php
                include('../../components/alert.php')
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
    <!-- back page -->
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
    <!-- end -->
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