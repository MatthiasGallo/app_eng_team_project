<?php 

if(isset($_GET['p'])){

    $required_page = $_GET['p'];

    $required_page_sanitized = htmlspecialchars($required_page);

    switch($required_page){

        case ('product'): 

            require 'app/product.php';

            $product = new Product();
        
            $product->content();
    

        break;

        case ('user'): 

            require 'app/user.php';

            $product = new User();

            $product->makeDataOperation();
        
            $product->content();

        break;

    }

} else {

    require 'app/home.php';

    $home = new Home();

    $home->content();

}

