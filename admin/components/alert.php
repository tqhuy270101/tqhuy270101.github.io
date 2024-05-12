<?php 
if (isset($_SESSION['warning']) && $_SESSION['warning'] != '') {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>'.$_SESSION['warning'].'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    unset($_SESSION['warning']);
} else if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$_SESSION['success'].'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    unset($_SESSION['success']);
}
?>