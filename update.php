<?php 

set_time_limit(0);

define('APPLICATION_PATH', realpath(dirname(__FILE__).'/app'));

const DS = DIRECTORY_SEPARATOR;

require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

/* Require Header */

require $config['MODEL_PATH']. 'Stock.php';

$json = file_get_contents('http://localhost/stock.json');

$array = json_decode($json, true);

if (isset($_GET['Key']) && isset($_GET['Update']) && isset($_GET['Stock'])){

    $Key = $_GET['Key'];

    $Update = $_GET['Update'];

    $Stock = $_GET['Stock'];

    $Key = filter_var($Key, FILTER_SANITIZE_STRING);

    $Update = filter_var($Update, FILTER_SANITIZE_STRING);

    if ($Key === 'localisbest'){

        if ($Update === 'CompanyInfo'){
            

        }elseif ($Update === 'DailyStock'){

            $UpdateStock = new Model\Stock($Stock);

            $UpdateStock->updateDailyStockPrice();

        }elseif ($Update === 'MonthlyStock'){

            $UpdateStock = new Model\Stock($Stock);

            $UpdateStock->updateMonthlyStockPrice();

            
        }elseif ($Update === 'QuorterRatio'){

            $UpdateStock = new Model\Stock($Stock);

            $UpdateStock->updateQuorterFinancialRatio();
            
        }elseif ($Update === 'AnnualRatio'){

            $UpdateStock = new Model\Stock($Stock);

            $UpdateStock->updateAnnualFinancialRatio();
      
        }elseif ($Update === 'UpdateCompany'){

            

            foreach ($array as $value){

                $symbol = $value['Symbol'];

                $ModelStock = new Model\Stock($symbol);

                $Statement = $ModelStock->getCompany();

                if ($Statement === false){

                    $setCompany = new Model\Stock($symbol);

                    $setCompany->setCompany();
                    
                }
            
            }
         
        }

    }

}

