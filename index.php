<?php
    // Header 
    require './views/header.php' ;

    // Phần main

    if(isset($_GET['action'])) {
        $action = $_GET['action'] ;
        switch($action) {
            case 'product' : {
                require './views/product.php' ;
                break ;
            }
            case 'admin' : {
                require './views/admin/home.php' ;
                break ;
            }
            case 'users' : {
                require './views/admin/users.php' ;
                break ;
            }
            case 'createUser' : {
                require './views/admin/createUser.php' ;
                break ;
            }
            case 'updateAcount' : {
                require './views/admin/updateAcount.php' ;
                break ;
            }
            case 'sectors' : {
                require './views/admin/sectors.php' ;
                break ;
            }
            case 'addSector' : {
                require './views/admin/addSector.php' ;
                break ;
            }
            case 'updateSector' : {
                require './views/admin/updateSector.php' ;
                break ;
            }
            case 'products' : {
                require './views/admin/products.php' ;
                break ;
            }
            case 'addProduct' : {
                require './views/admin/addProduct.php' ;
                break ;
            }
            case 'updateProduct' : {
                require './views/admin/updateProduct.php' ;
                break ;
            }
            case 'productDetails' : {
                require './views/productDetails.php' ;
                break ;
            }
            case 'search' : {
                require './views/search.php' ;
                break ;
            }
            case 'searchProduct' : {
                require './views/searchProduct.php' ;
                break ;
            }
            case 'comments' : {
                require './views/admin/comments.php' ;
                break ;
            }
            case 'detailsComment' : {
                require './views/admin/detailsComment.php' ;
                break ;
            }
            case 'changePassword' : {
                require './views/user/changePassword.php' ;
                break ;
            }
            case 'update_acc' : {
                require './views/user/update_acc.php' ;
                break ;
            }
            case 'statistical' : {
                require './views/admin/statistical.php' ;
                break ;
            }
            case 'chart' : {
                require './views/admin/chart.php' ;
                break ;
            }
            case 'myCart' : {
                require './views/myCart.php' ;
                break ;
            }
            case 'listshopping' : {
                require './views/admin/listShopping.php' ;
                break ;
            }
            case 'posts' : {
                require './views/posts.php' ;
                break ;
            }
            case 'postDetails' : {
                require './views/postDetails.php' ;
                break ;
            }
            case 'listPosts' : {
                require './views/admin/listPosts.php' ;
                break ;
            }
            case 'addPost' : {
                require './views/admin/addPost.php' ;
                break ;
            }
            case 'updatePost' : {
                require './views/admin/updatePost.php' ;
                break ;
            }
            case 'bought' : {
                require './views/bought.php' ;
                break ;
            }
            case 'contact' : {
                require './views/contact.php' ;
                break ;
            }
            default : 
                require './views/home.php' ;
                break ;
        }
    }else {
        require './views/home.php' ;
    }


    // Phần footer
    
    require './views/footer.php' ;
?>