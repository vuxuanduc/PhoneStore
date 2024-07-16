<style>
    .list-posts {
        list-style: none;
        padding: 0;
        border: none;
    }
    .list-posts li {
        padding: 5px 5px;
        border-radius: 3px;
        
    }
</style>

<main>
    <div>
        <h3>Danh sách bài viết</h3>
        <ul class="list-posts">
            <?php foreach($listPosts as $posts => $post) : ?>
                <li class="d-flex">
                    <img src="<?php echo $post -> image ?>" width="250px" height="150px" alt="Lỗi tải ảnh">
                    <div class="mx-2">
                        <h4><a style="text-decoration: none;color:black;" href="?action=postDetails&&idpost=<?php echo $post -> idpost ?>"><?php echo $post -> title ?></a></h4>
                        <p><?php echo substr($post -> content , 0 , 190) .'...' ?></p>
                        <p style="margin-top: -7px; font-size: 15px;">Số lượt xem : <?php echo $post -> views ?></p>
                    </div>
                </li>
            <?php endforeach ; ?>
        </ul>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>