<?php 

require 'partials.php';

class Home extends Partials{

    function getBanner(){

        return '<div id="welcome-banner">

                    <div id="welcome-banner-layer" class="s-inner">

                        <h1>Welcome to Rent Plattform</h1>

                        <h2>Rent everything</h2>

                    </div>

                </div>';

    }

    function getLatestProducts(){

        $sql_check_products = "SELECT * FROM `product` ORDER BY `ID` DESC LIMIT 10";

        $statement_check_products = $this->connect()->prepare($sql_check_products);
    
        $statement_check_products->execute();

        $data_array = $statement_check_products->fetchAll(PDO::FETCH_ASSOC);

        ob_start();

        echo '<div id="uploaded-products" class="s-inner">
                
                <h2>See the latest products</h2>';

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

    function getLatestReviews(){ 

        $sql_reviews = "SELECT * FROM `review` ORDER BY `ID` DESC LIMIT 15";

        $statement_reviews = $this->connect()->prepare($sql_reviews);
    
        $statement_reviews->execute();

        $data_array = $statement_reviews->fetchAll(PDO::FETCH_ASSOC);

        ob_start();

            echo '<div id="reviews-product" class="s-inner"><h2>Latests Reviews</h2>';
    
            foreach($data_array as $single_array){
    
                $vote = $single_array['Vote'];
    
                $content = $single_array['Content'];

                $product_id = $single_array['Product'];
    
                echo    '<a id="single-review-product" href="/?p=product&id=' . $product_id . '" class="s-flex">
    
                            <div id="first-box" class="s-flex-1">
    
                                <h3>' .$vote . '</h3>
    
                            </div>
    
                            <div id="second-box" class="s-flex-4">
    
                                <p>' . $content . '</p>
    
                            </div>
                
                        </a>';
    
            }
    
            echo '</div>';
    
            $output = ob_get_contents();
    
            ob_end_clean();
    
            return $output;

    }

    function content(){

        echo 

            $this->getHeader(array('Title' => 'Home Page', 'Content' => 'Welcome to this new Rent-Plattform')) . 

            $this->getBanner() . 

            $this->getLatestProducts() . 
            
            $this->getLatestReviews();

    }

}