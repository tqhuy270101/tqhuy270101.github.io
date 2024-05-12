<?php include('../../db/connect.php') ?>
<!-- search product -->
<?php 
    session_start();
    if (isset($_POST['btn-product-update'])) {
        $product_ID = $_GET['ID'];
        $product_name = $_POST['product-name'];
        $product_price = $_POST['product-price'];
        $product_category = $_POST['product-category'];
        $product_quantity = $_POST['product-quantity'];
        $product_image = $_POST['product-image'];
        $product_info = $_POST['product-info'];
        // get timezone
        date_default_timezone_set('Australia/Sydney');
        $current_datetime = date('Y-m-d H:i:s');

        $update_query = "UPDATE products SET product_name='$product_name', product_info='$product_info', product_price='$product_price', category_ID='$product_category', product_quantity='$product_quantity', updated_at='$current_datetime' WHERE ID=$product_ID";

        // Thực hiện truy vấn
        if (mysqli_query($conn, $update_query)) {
            $_SESSION['success'] = "Cập nhật thông tin sản phẩm thành công!";
        } else {
            $_SESSION['warning'] = "Cập nhật thông tin sản phẩm thất bại!";
        }
        // header("Location: ../pages/product-management/update.php?ID=$product_ID");
        header("Location: ../pages/product-management/products.php");
        
    }
?>