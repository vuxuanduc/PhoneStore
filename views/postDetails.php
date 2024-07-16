<main>
    <div style="padding: 0 5px;">
        <h3><?php echo $postId -> title ?></h3>
        <img src="<?php echo $postId -> image ?>" width="100%" height="auto" alt=""> 
        <p class="text-center"><?php echo $postId -> illustration ?></p>
        <br>
        <p style="text-align: justify;font-family: Arial, Helvetica, sans-serif;"><?php echo $postId -> content ?></p> 
        <?php
            if(isset($postId -> idproduct)) {
        ?>
            <a style="text-decoration: none;" href="?action=productDetails&&idproduct=<?php echo $postId -> idproduct ?>">Xem sản phẩm >></a>
        <?php
            }
        ?>
    </div>
    <?php
        require './views/main_login_category.php';
    ?>
</main>