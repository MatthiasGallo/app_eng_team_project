<?php 

require 'partials.php';

class User extends Partials{

    function getBanner($firstname){

        return '<div id="user-banner">

                    <div id="user-banner-layer" class="s-inner">

                        <h1>Hello ' . $firstname. '</h1>

                    </div>

                </div>';

    }

    function checkNotification(){

        if(isset($_GET['notification']) && !empty($_GET['notification'])){

            $notification = $_GET['notification'];

            return '<script>alert("' . $notification . '")</script>';

        }

    }


    function getLoginForm(){

        return '<div id="login-form-main">

                    <div id="login-form-layer" class="s-inner">

                        <div id="login-form-container">

                            <h3>Login</h3>

                            <form action="" method="POST">

                                <input type="text" name="username" placeholder="Username" required>

                                <input type="password" name="password" placeholder="Password" required>

                                <input type="submit" value="submit" name="login">

                                <a href="/?p=user&action=register">Want to Register?</a>

                            </form>

                        </div>

                    </div>

                </div>';

    }

    function getRegisterForm(){

        return '<div id="login-form-main">

                    <div id="login-form-layer" class="s-inner">

                        <div id="login-form-container">

                            <h3>Register</h3>

                            <p>Do you want to register as a private lessor? <a href="?p=user&action=register&register=private">click here</a>.<br>If you want to register as a company lessor <a href="?p=user&action=register&register=corporate">click here</a>.</p>

                            <form action="" method="POST">

                                <input type="text" name="firstname" placeholder="Firstname" required>

                                <input type="text" name="lastname" placeholder="Lastname" required>

                                <p>Date of Birth:</p>

                                <input type="date" name="dob" required>

                                <input type="text" placeholder="Address" name="address" required>

                                <input type="number" placeholder="Address Number" name="addressnumber" required>

                                <input type="number" placeholder="ZIP" name="zip" required>

                                <input type="text" placeholder="City" name="city" required>

                                <input type="text" placeholder="Region" name="region" required>

                                <input type="email" name="email" placeholder="E-Mail" required>

                                <input type="text" name="username" placeholder="Username" required>

                                <input type="password" name="password" placeholder="Password" required>

                                <input type="submit" value="submit" name="register">

                                <a href="/?p=user&action=login">Want to Login?</a>

                            </form>

                        </div>

                    </div>

                </div>';

    }

    function getRegisterPrivateLessorForm(){

        return '<div id="login-form-main">

                    <div id="login-form-layer" class="s-inner">

                        <div id="login-form-container">

                            <h3>Register as Private Lessor</h3>

                            <p>If you want to register as a company lessor <a href="?p=user&action=register&register=corporate">click here</a>.</p>

                            <form action="" method="POST">

                                <input type="text" name="firstname" placeholder="Firstname" required>

                                <input type="text" name="lastname" placeholder="Lastname" required>

                                <input type="number" name="phone" placeholder="Phone" required>

                                <p>Date of Birth:</p>

                                <input type="date" name="dob" required>

                                <input type="text" placeholder="Address" name="address" required>

                                <input type="number" placeholder="Address Number" name="addressnumber" required>

                                <input type="number" placeholder="ZIP" name="zip" required>

                                <input type="text" placeholder="City" name="city" required>

                                <input type="text" placeholder="Region" name="region" required>

                                <input type="text" name="ssn" placeholder="SSN" required>

                                <input type="email" name="email" placeholder="E-Mail" required>

                                <input type="text" name="username" placeholder="Username" required>

                                <input type="password" name="password" placeholder="Password" required>

                                <input type="submit" value="submit" name="registerprivate">

                                <a href="/?p=user&action=login">Want to Login?</a>

                            </form>

                        </div>

                    </div>

                </div>';

    }

    function getRegisterCorporateLessorForm(){

        return '<div id="login-form-main">

                    <div id="login-form-layer" class="s-inner">

                        <div id="login-form-container">

                            <h3>Register as Corporate Lessor</h3>

                            <p>If you want to register as a private lessor <a href="?p=user&action=register&register=private">click here</a>.</p>

                            <form action="" method="POST">

                                <input type="text" name="firstname" placeholder="Firstname" required>

                                <input type="text" name="lastname" placeholder="Lastname" required>

                                <input type="number" name="phone" placeholder="Phone" required>

                                <p>Date of Birth:</p>

                                <input type="date" name="dob" required>

                                <input type="text" name="companyname" placeholder="Company Name" required>

                                <input type="text" placeholder="Address" name="address" required>

                                <input type="number" placeholder="Address Number" name="addressnumber" required>

                                <input type="number" placeholder="ZIP" name="zip" required>

                                <input type="text" placeholder="City" name="city" required>

                                <input type="text" placeholder="Region" name="region" required>

                                <textarea name="companydescription" placeholder="Company Description"></textarea>

                                <input type="text" name="vat" placeholder="VAT" required>

                                <input type="email" name="email" placeholder="E-Mail" required>

                                <input type="text" name="username" placeholder="Username" required>

                                <input type="password" name="password" placeholder="Password" required>

                                <input type="submit" value="submit" name="registercorporate">

                                <a href="/?p=user&action=login">Want to Login?</a>

                            </form>

                        </div>

                    </div>

                </div>';

    }

    function getProductForm(){

        return '<div id="register-product">
                
                    <div id="register-product-inner" class="s-inner">

                        <h2>Register a new product</h2>

                        <form action="" method="POST">

                            <div class="s-grid-4">

                                <input type="text" placeholder="Productname" name="productname" required>

                                <input type="number" placeholder="Fix Price" name="fixprice" required>

                                <input type="number" placeholder="Daily Fee" name="dailyprice" required>

                                <input type="text" placeholder="Category" name="category" required>

                            </div>

                            <h4>Pick Up Information</h4>

                            <div class="s-grid-4">

                                <input type="text" placeholder="Address" name="address" required>

                                <input type="number" placeholder="Address Number" name="addressnumber" required>

                                <input type="number" placeholder="ZIP" name="zip" required>

                                <input type="text" placeholder="City" name="city" required>

                                <input type="text" placeholder="Region" name="region" required>

                            </div>

                            <h4>Rent Description</h4>

                            <textarea type="text" placeholder="Rent Terms" name="rentterms" required></textarea>

                            <textarea type="text" placeholder="Product Description" name="productdescription" required></textarea>

                            <textarea placeholder="Technical Description" name="technicaldescription" required></textarea>

                            <input type="submit" value="submit" name="registerproduct">

                        </form>
                    
                    </div>

                </div>';

    }

    function getAllOffers($username){

        $sql_offer_product = "SELECT * FROM `offer` WHERE `User` = ?";

        $statement_offer_product = $this->connect()->prepare($sql_offer_product );
    
        $statement_offer_product->execute(array($username));

        $data_array = $statement_offer_product->fetchAll(PDO::FETCH_ASSOC);

        ob_start();

        echo '<div id="offers-products" class="s-inner"><h2>All Offers send</h2>';

        foreach($data_array as $single_array){

            $date = $single_array['Date'];

            $duration = $single_array['Duration'];

            $product_id = $single_array['Product'];

            echo    '<div id="single-offer" class="s-flex">

                        <div class="s-flex-1">

                            <h5>Date of Pick Up: <b>' .$date . '</b></h5>

                        </div>

                        <div class="s-flex-1">

                            <h5> ' .$duration . ' days of duration</h5>

                        </div>

                        <div class="s-flex-1">

                            <a href="/?p=product&id=' . $product_id . '">Product</a>

                        </div>

                    </div>';

        }

        echo '</div>';

        $output = ob_get_contents();

        ob_end_clean();

        return $output;

    }

    function getProducts($username){

        $sql_check_products = "SELECT * FROM `product` WHERE `Lessor` = ?";

        $statement_check_products = $this->connect()->prepare($sql_check_products);
    
        $statement_check_products->execute(array($username));

        $data_array = $statement_check_products->fetchAll(PDO::FETCH_ASSOC);

        ob_start();

        echo '<div id="uploaded-products" class="s-inner">
              <h2>Uploaded Products for Rent</h2>';

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

    function checkContent(){

        if ($this->getUser() != false){

            $username = $_COOKIE["username"];

            $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

            $statement_check_username = $this->connect()->prepare($sql_check_username);
    
            $statement_check_username->execute(array($username));

            $data_array = $statement_check_username->fetch();

            $firstname = $data_array['Firstname'];

            if(isset($_GET['action']) && $_GET['action'] == 'logout'){

                $this->doLogout();

                $header_string = 'Location: /?p=user';

                header($header_string);


            }elseif($this->getUser() == 'User'){

                return 
                
                        $this->getBanner($firstname) . 

                        $this->getAllOffers($username);

            }elseif($this->getUser() == 'Lessor'){

                return 

                        $this->getBanner($firstname) .
                
                        $this->getProductForm() .

                        $this->getProducts($username) . 

                        $this->getAllOffers($username);

            }

        }else {


            if (isset($_GET['action'])){

                if ($_GET['action'] == 'register'){
    
                    if (isset($_GET['register'])) {
    
                        if ($_GET['register'] == 'private'){
    
                            return $this->getRegisterPrivateLessorForm();
    
                        }elseif ($_GET['register'] == 'corporate'){
    
                            return $this->getRegisterCorporateLessorForm();
    
                        }else {
    
                            return $this->getRegisterPrivateLessorForm();
    
                        }
    
                    } else {
    
                        return $this->getRegisterForm();
    
                    }
    
                }else {
    
                    return $this->getLoginForm();
    
                }
    
            }else {
    
                return $this->getLoginForm();
    
            }

        }

    }

    function content(){

        echo 

            $this->getHeader(array('Title' => 'User', 'Content' => 'Here you can see all the Userinformation')) . 

            $this->checkNotification() .

            $this->checkContent();

    }

    function makeDataOperation(){

        if(isset($_POST['registerproduct'])){

            if($this->getUser('Lessor') != false){ 

                if(!empty($_POST['productname']) && !empty($_POST['fixprice']) && !empty($_POST['dailyprice']) && !empty($_POST['category']) && !empty($_POST['address']) && !empty($_POST['addressnumber']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['region']) && !empty($_POST['rentterms']) && !empty($_POST['productdescription']) && !empty($_POST['technicaldescription'])){

                    $product_name = htmlspecialchars($_POST['productname']);

                    $fixprice = htmlspecialchars($_POST['fixprice']); 

                    $daily_price = htmlspecialchars($_POST['dailyprice']); 

                    $category = htmlspecialchars($_POST['category']);

                    $address = htmlspecialchars($_POST['address']);

                    $address_number = htmlspecialchars($_POST['addressnumber']);

                    $zip = htmlspecialchars($_POST['zip']);

                    $city = htmlspecialchars($_POST['city']);

                    $region = htmlspecialchars($_POST['region']);

                    $rent_terms = htmlspecialchars($_POST['rentterms']);

                    $product_description = htmlspecialchars($_POST['productdescription']);

                    $technical_description = htmlspecialchars($_POST['technicaldescription']);

                    $lessor = $_COOKIE["username"];

                    /* Check and INSERT Address */

                    $prepared_data_array_address = array($address, $address_number, $zip, $city, $region);

                    $sql_address = "SELECT * FROM `address` WHERE `Street` = ? AND `Number` = ? AND `ZIP` = ? AND `City` = ? AND `Region` = ? ";

                    $statement_address = $this->connect()->prepare($sql_address);
        
                    $statement_address->execute($prepared_data_array_address);

                    $number_rows = $statement_address->rowCount();

                    if ($number_rows == 0){

                        $sql_address_insert = "INSERT INTO `address` (`Street`, `Number`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?)";

                        $statement_address = $this->connect()->prepare($sql_address_insert);
        
                        $statement_address->execute($prepared_data_array_address);

                    }

                    /* INSERT INTO Product */

                    $prepared_data_array = array($product_name, $product_description, $technical_description, $rent_terms, $fixprice, $daily_price, $category, $address, $address_number, $zip, $city, $region, $lessor);

                    $sql = "INSERT INTO `product` (`Name`, `Description`, `TechnicalDescription`, `Terms`, `FixPrice`, `DailyFee`, `Category`, `Street`, `StreetNumber`, `ZIP`, `City`, `Region`, `Lessor`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    
                    $statement = $this->connect()->prepare($sql);
        
                    $statement->execute($prepared_data_array);

                }

            } else {

                $header_string = 'Location: /?p=user&notification=' . urlencode('Please Check All Fields') . '';

                header($header_string);

            }

        }elseif (isset($_POST['registerprivate'])){

            if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['dob']) && !empty($_POST['ssn']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['addressnumber']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['region'])){

                $firstname = htmlspecialchars($_POST['firstname']);

                $lastname = htmlspecialchars($_POST['lastname']);

                $phone = htmlspecialchars($_POST['phone']);

                $dob = htmlspecialchars($_POST['dob']);

                $ssn = htmlspecialchars($_POST['ssn']);

                $email = htmlspecialchars($_POST['email']);

                $username = htmlspecialchars($_POST['username']);

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $address = htmlspecialchars($_POST['address']);

                $address_number = htmlspecialchars($_POST['addressnumber']);

                $zip = htmlspecialchars($_POST['zip']);

                $city = htmlspecialchars($_POST['city']);

                $region = htmlspecialchars($_POST['region']);

                /* Check and INSERT Address */

                $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

                $statement_check_username = $this->connect()->prepare($sql_check_username);
        
                $statement_check_username->execute(array($username));

                $number_rows_check_username = $statement_check_username->rowCount();

                /* Check Address Table */

                $prepared_data_array_address = array($address, $address_number, $zip, $city, $region);

                $sql_address = "SELECT * FROM `address` WHERE `Street` = ? AND `Number` = ? AND `ZIP` = ? AND `City` = ? AND `Region` = ? ";

                $statement_address = $this->connect()->prepare($sql_address);
    
                $statement_address->execute($prepared_data_array_address);

                $number_rows_check_address = $statement_address->rowCount();

                if ($number_rows_check_address === 0){

                    /* INSERT INTO ADDRESS */

                    $sql_address_insert = "INSERT INTO `address` (`Street`, `Number`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?)";

                    $statement_address_insert = $this->connect()->prepare($sql_address_insert);
    
                    $statement_address_insert ->execute($prepared_data_array_address);

                }

                if ($number_rows_check_username == 0){

                    /* INSERT INTO USER */

                    $prepared_data_array_user = array($username, $firstname, $lastname, $email, $dob, $password, $address, $address_number, $zip, $city, $region);

                    $sql_user_insert = "INSERT INTO `user` (`Username`, `Firstname`, `Lastname`, `Email`, `DOB`, `Password`, `Street`, `StreetNumber`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $statement_user = $this->connect()->prepare($sql_user_insert);
        
                    $statement_user->execute($prepared_data_array_user);

                    /* INSERT INTO LESSOR */

                    $prepared_data_array_lessor = array($username);

                    $sql_lessor_insert = "INSERT INTO `lessor` (`User`) VALUE (?)";

                    $statement_lessor = $this->connect()->prepare($sql_lessor_insert);
        
                    $statement_lessor->execute($prepared_data_array_lessor);

                    /* CHECK TELEPHONE */

                    $prepared_data_array_check_telephone = array($phone);

                    $sql_check_telephone_insert = "SELECT * FROM `telephone` WHERE `Number` = ?";

                    $statement_check_telephone = $this->connect()->prepare($sql_check_telephone_insert);
        
                    $statement_check_telephone->execute($prepared_data_array_check_telephone);

                    $number_rows_check_telephone = $statement_check_telephone->rowCount();

                    if($number_rows_check_telephone == 0){

                        /* INSERT INTO TELEPHONE */

                        $prepared_data_array_telephone = array($phone, $username);

                        $sql_telephone_insert = "INSERT INTO `telephone` (`Number`, `Lessor`) VALUE (?, ?)";

                        $statement_telephone = $this->connect()->prepare($sql_telephone_insert);
            
                        $statement_telephone->execute($prepared_data_array_telephone);

                        /* SET LOGIN COOKIE */
                    
                        setcookie("username", $username, time() + (86400 * 30), "/");
                    
                        setcookie("password", $_POST['password'], time() + (86400 * 30), "/");  

                        $header_string = 'Location: /?p=user';

                        header($header_string);


                    }else {

                        /* IF TELEPHONE EXISTS */

                        $header_string = 'Location: /?p=user&notification=' . urlencode('Phonenumber already exists') . '';

                        header($header_string);

                    }

                    /* INSERT INTO PRIVATE LESSOR */

                    $prepared_data_array_private_user = array($username, $ssn);

                    $sql_private_lessor_insert = "INSERT INTO `privatelessor` (`Lessor`, `SSN`) VALUE (?, ?)";

                    $statement_private_lessor = $this->connect()->prepare($sql_private_lessor_insert);
        
                    $statement_private_lessor->execute($prepared_data_array_private_user);

                }else {

                    /* IF USERNAME EXISTS */

                    $header_string = 'Location: /?p=user&notification=' . urlencode('Username already exists') . '';

                    header($header_string);

                }

            }

        }elseif (isset($_POST['registercorporate'])){

            if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['dob']) && !empty($_POST['companyname']) && !empty($_POST['companydescription']) && !empty($_POST['vat']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['addressnumber']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['region'])){

                $firstname = htmlspecialchars($_POST['firstname']);

                $lastname = htmlspecialchars($_POST['lastname']);

                $phone = htmlspecialchars($_POST['phone']);

                $dob = htmlspecialchars($_POST['dob']);

                $company_name = htmlspecialchars($_POST['companyname']);

                $company_description = htmlspecialchars($_POST['companydescription']);

                $vat = htmlspecialchars($_POST['vat']);

                $email = htmlspecialchars($_POST['email']);

                $username = htmlspecialchars($_POST['username']);

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $address = htmlspecialchars($_POST['address']);

                $address_number = htmlspecialchars($_POST['addressnumber']);

                $zip = htmlspecialchars($_POST['zip']);

                $city = htmlspecialchars($_POST['city']);

                $region = htmlspecialchars($_POST['region']);

                /* Check and INSERT Address */

                $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

                $statement_check_username = $this->connect()->prepare($sql_check_username);
        
                $statement_check_username->execute(array($username));

                $number_rows_check_username = $statement_check_username->rowCount();

                /* Check Address Table */

                $prepared_data_array_address = array($address, $address_number, $zip, $city, $region);

                $sql_address = "SELECT * FROM `address` WHERE `Street` = ? AND `Number` = ? AND `ZIP` = ? AND `City` = ? AND `Region` = ? ";

                $statement_address = $this->connect()->prepare($sql_address);
    
                $statement_address->execute($prepared_data_array_address);

                $number_rows_check_address = $statement_address->rowCount();

                if ($number_rows_check_address === 0){

                    /* INSERT INTO ADDRESS */

                    $sql_address_insert = "INSERT INTO `address` (`Street`, `Number`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?)";

                    $statement_address_insert = $this->connect()->prepare($sql_address_insert);
    
                    $statement_address_insert ->execute($prepared_data_array_address);

                }

                if ($number_rows_check_username == 0){

                    /* INSERT INTO USER */

                    $prepared_data_array_user = array($username, $firstname, $lastname, $email, $dob, $password, $address, $address_number, $zip, $city, $region);

                    $sql_user_insert = "INSERT INTO `user` (`Username`, `Firstname`, `Lastname`, `Email`, `DOB`, `Password`, `Street`, `StreetNumber`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $statement_user = $this->connect()->prepare($sql_user_insert);
        
                    $statement_user->execute($prepared_data_array_user);

                    /* INSERT INTO LESSOR */

                    $prepared_data_array_lessor = array($username);

                    $sql_lessor_insert = "INSERT INTO `lessor` (`User`) VALUE (?)";

                    $statement_lessor = $this->connect()->prepare($sql_lessor_insert);
        
                    $statement_lessor->execute($prepared_data_array_lessor);

                    /* CHECK TELEPHONE */

                    $prepared_data_array_check_telephone = array($phone);

                    $sql_check_telephone_insert = "SELECT * FROM `telephone` WHERE `Number` = ?";

                    $statement_check_telephone = $this->connect()->prepare($sql_check_telephone_insert);
        
                    $statement_check_telephone->execute($prepared_data_array_check_telephone);

                    $number_rows_check_telephone = $statement_check_telephone->rowCount();

                    if($number_rows_check_telephone == 0){

                        /* INSERT INTO TELEPHONE */

                        $prepared_data_array_telephone = array($phone, $username);

                        $sql_telephone_insert = "INSERT INTO `telephone` (`Number`, `Lessor`) VALUE (?, ?)";

                        $statement_telephone = $this->connect()->prepare($sql_telephone_insert);
            
                        $statement_telephone->execute($prepared_data_array_telephone);

                        /* SET LOGIN COOKIE */
                    
                        setcookie("username", $username, time() + (86400 * 30), "/");
                    
                        setcookie("password", $_POST['password'], time() + (86400 * 30), "/");    
                        
                        $header_string = 'Location: /?p=user';

                        header($header_string);


                    }else {

                        /* IF TELEPHONE EXISTS */

                        $header_string = 'Location: /?p=user&notification=' . urlencode('Phonenumber already exists') . '';

                        header($header_string);

                    }

                    /* INSERT INTO CORPORATE LESSOR */

                    $prepared_data_array_private_user = array($username, $company_name, $company_description, $vat);

                    $sql_private_lessor_insert = "INSERT INTO `corporatelessor` (`Lessor`, `Name`, `CompanyDescription`, `VAT`) VALUE (?, ?, ?, ?)";

                    $statement_private_lessor = $this->connect()->prepare($sql_private_lessor_insert);
        
                    $statement_private_lessor->execute($prepared_data_array_private_user);

                }else {

                    /* IF USERNAME EXISTS */

                    $header_string = 'Location: /?p=user&notification=' . urlencode('Username already exists') . '';

                    header($header_string);

                }

            }

        }elseif (isset($_POST['register'])){

            if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['dob']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['addressnumber']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['region'])){

                $firstname = htmlspecialchars($_POST['firstname']);

                $lastname = htmlspecialchars($_POST['lastname']);

                $dob = htmlspecialchars($_POST['dob']);

                $email = htmlspecialchars($_POST['email']);

                $username = htmlspecialchars($_POST['username']);

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $address = htmlspecialchars($_POST['address']);

                $address_number = htmlspecialchars($_POST['addressnumber']);

                $zip = htmlspecialchars($_POST['zip']);

                $city = htmlspecialchars($_POST['city']);

                $region = htmlspecialchars($_POST['region']);

                 /* Check and INSERT Address */

                $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

                $statement_check_username = $this->connect()->prepare($sql_check_username);
        
                $statement_check_username->execute(array($username));

                $number_rows_check_username = $statement_check_username->rowCount();

                /* Check Address Table */

                $prepared_data_array_address = array($address, $address_number, $zip, $city, $region);

                $sql_address = "SELECT * FROM `address` WHERE `Street` = ? AND `Number` = ? AND `ZIP` = ? AND `City` = ? AND `Region` = ? ";

                $statement_address = $this->connect()->prepare($sql_address);
    
                $statement_address->execute($prepared_data_array_address);

                $number_rows_check_address = $statement_address->rowCount();

                if ($number_rows_check_address === 0){

                    /* INSERT INTO ADDRESS */

                    $sql_address_insert = "INSERT INTO `address` (`Street`, `Number`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?)";

                    $statement_address_insert = $this->connect()->prepare($sql_address_insert);
    
                    $statement_address_insert ->execute($prepared_data_array_address);

                }

                if ($number_rows_check_username == 0){

                    /* INSERT INTO USER */

                    $prepared_data_array_user = array($username, $firstname, $lastname, $email, $dob, $password, $address, $address_number, $zip, $city, $region);

                    $sql_user_insert = "INSERT INTO `user` (`Username`, `Firstname`, `Lastname`, `Email`, `DOB`, `Password`, `Street`, `StreetNumber`, `ZIP`, `City`, `Region`) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $statement_user = $this->connect()->prepare($sql_user_insert);
        
                    $statement_user->execute($prepared_data_array_user);

                    /* SET LOGIN COOKIE */
                    
                    setcookie("username", $username, time() + (86400 * 30), "/");
                    
                    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");

                    $header_string = 'Location: /?p=user';

                    header($header_string);

                }else {

                    /* IF USERNAME EXISTS */

                    $header_string = 'Location: /?p=user&notification=' . urlencode('Username already exists') . '';

                    header($header_string);

                }

            }

        }elseif (isset($_POST['login'])){

            if (!empty($_POST['username']) && !empty($_POST['password'])){

                $username = htmlspecialchars($_POST['username']);

                $password = htmlspecialchars($_POST['password']);

                $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

                $statement_check_username = $this->connect()->prepare($sql_check_username);
        
                $statement_check_username->execute(array($username));
    
                $number_rows_check_username = $statement_check_username->rowCount();
    
                if($number_rows_check_username == 1){
    
                    $data_array = $statement_check_username->fetch();
    
                    $password_hash = $data_array["Password"];
    
                   if (password_verify($password, $password_hash)){

                        setcookie("username", $username, time() + (86400 * 30), "/");
                        
                        setcookie("password", $_POST['password'], time() + (86400 * 30), "/");

                        $header_string = 'Location: /?p=user';

                        header($header_string);

                    }
                   
                }

            }

        }

    }

    function doLogout(){

                /* UNSET COOKIE IF USERNAME NOT IN DB */

                setcookie("username", "", time() - 3600);

                setcookie("password", "", time() - 3600);

    }

}