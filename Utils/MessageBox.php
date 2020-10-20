<?php if (isset($_SESSION['message'])){ 
        $qwerty = $_SESSION['message']; ?>   
        <div class="alert alert-dismissible fade show" role="alert">
        <strong><?php echo $qwerty; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>   
<?php        $_SESSION['message'] = null;
} ?>