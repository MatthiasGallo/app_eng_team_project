<?php

require 'partials.php';

class Product extends Partials{

    function getBanner(){

        return '<div id="product-banner">

                    <div id="product-banner-layer" class="s-inner">

                        <h1>All Products</h1>

                    </div>

                </div>';

    }

    function getSingleProductReviewForm(){

        return  '<div id="single-product-write-review" class="s-inner product-feature">

                    <h3>Write a Review</h3>

                    <form action="" method="POST">

                        <textarea type="text" name="content" required placeholder="Content"></textarea>

                        <label for="cars">Vote:</label>

                        <select id="vote" name="vote">

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="4">4</option>

                            <option value="5" selected>5</option>

                        </select>

                        <input type="submit" value="submit" name="productreview">

                    </form>
                
                </div>';

    }

    function getSingleProductOfferForm(){

        return '<div id="single-product-offer" class="s-inner product-feature">

                    <h3>Request Item</h3>

                    <form action="" method="POST">

                        <p>Pick up date:</p>

                        <input type="date" name="date" required>

                        <input type="number" name="duration" placeholder="Number of Days">

                        <input type="submit" value="submit" name="productoffer">

                    </form>
                    
                </div>';

    }

    function getSingleProductReportForm(){

        return '<div id="single-product-report" class="product-feature s-inner">

                    <h3>Report Item</h3>

                    <form action="" methode="POST">

                        <textarea name="content" required placeholder="Reason to report this product ..."></textarea>

                        <input type="submit" value="submit" name="productreport">

                    </form>
                    
                </div>';

    }

    function getSingleProduct($product_information_array){

        $product_title = $product_information_array['Title'];

        $product_description = $product_information_array['Product Descrption'];

        $product_technical_description = $product_information_array['Technical Descrption'];

        $product_rent_terms = $product_information_array['Rent Terms'];

        $fix_price = $product_information_array['Fix Price'];

        $daily_fee = $product_information_array['Daily Fee'];

        $product_category = $product_information_array['Product Category'];

        $product_pickup_city = $product_information_array['Pick Up City'];

        $product_pickup_region = $product_information_array['Pick Up Region'];

        $product_pickup_address = $product_information_array['Pick Up Address'];

        $product_pickup_address_number = $product_information_array['Pick Up Address Number'];

        $product_pickup_zip = $product_information_array['Pick Up ZIP'];

        return '<div id="single-product-banner">

                    <div id="single-product-banner-layer" class="s-inner">

                        <h1> ' . $product_title . '</h1>

                        <h3> ' . $product_category . '</h3>

                        <h5>Fixed: ' . $fix_price . ' $ | Daily Fee: ' . $daily_fee . ' $</h5>

                    </div>

                </div>
                
                <div id="single-product-description" class="s-inner">

                    <h2>Product Description</h2>

                    <p> ' . $product_description . '</p>

                </div>

                <div id="single-product-technical-description" class="s-inner">

                    <h2>Technical Description</h2>

                    <p> ' . $product_technical_description . '</p>

                </div>
                
                <div id="single-product-rent-terms" class="s-inner">

                    <h2>Rent Terms</h2>

                    <p> ' . $product_rent_terms . '</p>

                </div>
                
                <div id="singe-product-pickup-table" class="s-inner">

                    <h2>Pick Up</h2>

                    <table>

                        <thead>

                        <tr>

                            <th>Region</th>

                            <th>City</th>

                            <th>Address</th>

                            <th>Address Number</th>

                            <th>ZIP</th>

                        </tr>

                        </thead>

                        <tbody>
                    
                        <tr>

                            <td> ' . $product_pickup_region . ' </td>

                            <td> ' . $product_pickup_city . ' </td>

                            <td> ' . $product_pickup_address . ' </td>

                            <td> ' . $product_pickup_address_number . ' </td>
                            
                            <td> ' . $product_pickup_zip . ' </td>
                        
                        </tr>

                        </tbody>

                    </table>
                
                </div>';

    }

    function getSingleProductReviews($product_id){

        $sql_reviews = "SELECT * FROM `review` WHERE `Product` = ?";

        $statement_reviews = $this->connect()->prepare($sql_reviews);
    
        $statement_reviews->execute(array($product_id));

        $data_array = $statement_reviews->fetchAll(PDO::FETCH_ASSOC);

        if ($statement_reviews->rowCount() != 0){

            ob_start();

            echo '<div id="reviews-product" class="s-inner">
                    <h2>Reviews</h2>';
    
            foreach($data_array as $single_array){
    
                $vote = $single_array['Vote'];
    
                $content = $single_array['Content'];
    
                echo    '<div id="single-review-product" class="s-flex">
    
                            <div id="first-box" class="s-flex-1">
    
                                <h3>' .$vote . '</h3>
    
                            </div>
    
                            <div id="second-box" class="s-flex-4">
    
                                <p>' . $content . '</p>
    
                            </div>
                
                        </div>';
    
            }
    
            echo '</div>';
    
            $output = ob_get_contents();
    
            ob_end_clean();
    
            return $output;
    

        }

    }

    function getAllProducts(){

        $sql_check_products = "SELECT * FROM `product`";

        $statement_check_products = $this->connect()->prepare($sql_check_products);
    
        $statement_check_products->execute();

        $data_array = $statement_check_products->fetchAll(PDO::FETCH_ASSOC);

        ob_start();

        echo '<div id="uploaded-products" class="s-inner">';

        foreach($data_array as $single_array){

            $name = $single_array['Name'];

            $id = $single_array['ID'];

            $fixprice = $single_array['FixPrice'];

            $description_short = $single_array['Description'];

            echo    '<a id="sing-uploaded-product" class="s-flex" href="/?p=product&id=' . $id . '">

                        <div id="first-box" class="s-flex-2">

                            <h3>' .$name . '</h3>

                            <h5>Starting at ' .$fixprice . ' $</h5>

                        </div>

                        <div id="second-box" class="s-flex-4">

                            <p>' . $description_short . '</p>

                        </div>
            
                    </a>';

        }

        echo '</div>';

        $output = ob_get_contents();

        ob_end_clean();

        return $output;

    }

    function getSingleProductFeatures(){

        if($this->getUser() != false){

            return 

                    '<div class="s-inner s-grid-2">' . 

                        $this->getSingleProductReviewForm() . 

                        $this->getSingleProductOfferForm() . 

                        $this->getSingleProductReportForm() .
                    
                    '</div>';

        }else {

            return 

                    '<div class="s-inner">
                        <p>Do you want to leave a review or make an offer? <a href="/?p=user">Login here!</a></p>
                    </div>';

        }

    }

    function checkContent(){

        if(isset($_GET['id'])){

            $id = htmlspecialchars($_GET['id']);

            $sql_check_products = "SELECT * FROM `product` WHERE ID = ?";

            $statement_check_products = $this->connect()->prepare($sql_check_products);
        
            $statement_check_products->execute(array($id));

            $number_of_id = $statement_check_products->rowCount();

            if($number_of_id == 1){

                $data_array = $statement_check_products->fetch(PDO::FETCH_ASSOC);

                $this->checkDataOperation($id);

                return
                
                            $this->getHeader(array('Title' => 'All Products', 'Content' => 'See all our Products')) . 

                            $this->getSingleProduct(array('Title' => $data_array['Name'], 'Product Descrption' => $data_array['Description'], 'Technical Descrption' => $data_array['TechnicalDescription'], 'Rent Terms' => $data_array['Terms'], 'Fix Price' => $data_array['FixPrice'], 'Daily Fee' => $data_array['DailyFee'], 'Product Category' => $data_array['Category'], 'Pick Up Address' => $data_array['Street'],'Pick Up Address Number' => $data_array['StreetNumber'], 'Pick Up ZIP' => $data_array['ZIP'], 'Pick Up City' => $data_array['City'], 'Pick Up Region' => $data_array['Region'])) . 

                            /* ONLY FOR LOGIN USER */

                            $this->getSingleProductFeatures() . 

                            $this->getSingleProductReviews($id);

            }


        }else {

            return 

                    $this->getHeader(array('Title' => 'All Products', 'Content' => 'See all our Products')) . 

                    $this->getBanner() . 

                    $this->getAllProducts();

        }

    }

    function content(){

        echo 

            $this->getHeader(array('Title' => 'All Products', 'Content' => 'See all our Products')) . 
            
            $this->checkContent();

    }

    function checkDataOperation($product_id){

        if(isset($_POST['productreview'])){

            if(!empty($_POST['content']) && !empty($_POST['vote']) && $this->getUser() != false){

                $content = htmlspecialchars($_POST['content']);

                $date = date("Y-m-d");

                $vote = htmlspecialchars($_POST['vote']);

                $user_id = $_COOKIE["username"];

                $prepared_data_array = array($content, $vote, $date, $user_id, $product_id);

                $sql_user_insert = "INSERT INTO `review` (`Content`, `Vote`, `Date`, `User`, `Product`) VALUE (?, ?, ?, ?, ?)";

                $statement_user = $this->connect()->prepare($sql_user_insert);
    
                $statement_user->execute($prepared_data_array);

            }else{

                die();

            }

        }elseif(isset($_POST['productoffer'])){

            if(!empty($_POST['date']) && !empty($_POST['duration']) && $this->getUser() != false){

                $date_of_rent = htmlspecialchars($_POST['date']);

                $number_of_days = htmlspecialchars($_POST['duration']);

                $user_id = $_COOKIE["username"];

                $prepared_data_array = array($date_of_rent, $number_of_days, $user_id, $product_id);

                $sql_offer_insert = "INSERT INTO `offer` (`Date`, `Duration`, `User`, `Product`) VALUE (?, ?, ?, ?)";

                $statement_offer = $this->connect()->prepare($sql_offer_insert);
    
                $statement_offer->execute($prepared_data_array);
                
                $header_string = 'Location: /?p=user';

                header($header_string);

            }else {

                die('Problem sending the offer');

            }

        }elseif(isset($_POST['productreport'])){

            if(!empty($_POST['content']) && $this->getUser() != false){

                $content = htmlspecialchars($_POST['content']);

                $date = date("Y-m-d");

                $user_id = $_COOKIE["username"];

                $prepared_data_array = array($content, $date, $user_id);

            }else {

                die();

            }

        }


    }

}