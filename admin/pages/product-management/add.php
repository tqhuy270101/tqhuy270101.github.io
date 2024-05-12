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
                <!-- tiếp -->
                    <div class="row">
                        <div class="col-lg-12 d-flex grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add product</h4>
                                    <!-- <p class="card-description">
                                        Basic form elements
                                    </p> -->
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Price</label>
                                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Category</label>
                                            <select class="form-control" id="exampleSelectGender">
                                                <option>Xương khớp</option>
                                                <option>Mắt</option>
                                                <option>Da</option>
                                                <option>Não</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Quantity</label>
                                            <input type="number" min=0 class="form-control" id="exampleInputCity1" placeholder="Quantity">
                                        </div>
                                        <div class="form-group">
                                            <label>Image upload</label>
                                            <input type="file" name="img[]" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="editor">Textarea</label>
                                            <textarea class="form-control" rows="4" name="editor" id="editor"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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