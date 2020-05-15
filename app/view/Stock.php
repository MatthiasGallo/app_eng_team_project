<?php 

namespace View;

require 'Partials.php';

class Stock extends Partials {

    public $array_content;

    function __construct($array_content){

        $this->array_content = $array_content;

    }

    function getCompanyInformation($array_parameter){

        $information_request = $array_parameter['Information'];

        $array_company_information = $this->array_content['Company'];

        if (array_key_exists('Raw', $array_parameter)){

            $company_information = $array_company_information[$information_request];

            if (!empty($company_information)){

                return $company_information;

            }

        }else {

            foreach ($array_company_information  as $key => $value){

                if ($key === $information_request){
    
                    if (!empty($value)){
    
                        if ($information_request === 'Company Name'){
        
                            return '<h1 id="stock-name">'.$value.'</h1>';
                
                        }elseif ($information_request === 'Company Logo') {
                
                            return '<img src="'.$value.'" class="stock-company-logo">';
                
                        }else {
        
                            return '<h3 class="s-text-upper">'.$key.'</h3><p>'.$value.'</p><br>';
        
                        }
        
                    }
    
                }
    
            }

        }

    }

    // Daily Stock Price
    function getDailyStockPrice($array_parameter){

        $information_request = $array_parameter['Information'];

        $array_daily_stock_price = $this->array_content['DailyStockPrice'];

        if (empty($array_daily_stock_price)){

            return false;

        }else {

            if($information_request === 'Labels'){

                ob_start();

                foreach ($array_daily_stock_price as $key => $value){

                    echo '"'.$key.'",';

                }

                $output = ob_get_clean();

                return $output;

            }elseif ($information_request === 'Dataset') {

                ob_start();

                foreach ($array_daily_stock_price as $key => $value){

                    echo '"'.$value['4. close'].'",';

                }

                $output = ob_get_clean();

                return $output;

            }else {

                $array_daily_stock_price_length = count($array_daily_stock_price);

                $array_key_1 = $array_daily_stock_price_length - 1;

                $array_key_2 = $array_daily_stock_price_length - 2;

                $array_key_value = array_keys($array_daily_stock_price);

                $day_value_1 = $array_key_value[$array_key_1];

                $day_value_2 = $array_key_value[$array_key_2];

                $difference_stock_value = $array_daily_stock_price[$day_value_1]['4. close'] - $array_daily_stock_price[$day_value_2]['4. close'];

    
                if ($difference_stock_value < 0){

                    switch ($information_request){

                        case 'Color Fill':
    
                            return 'rgba(255, 99, 132,0.8)';

                            break;

                        case 'Color Line':

                            return '#ff6384';

                            break;

                        case 'Difference Percent';

                            $difference_percent = $array_daily_stock_price[$day_value_1]['4. close']/$array_daily_stock_price[$day_value_2]['4. close'] * 100 - 100;
        
                            return '<span style="color:#ef6666;" id="span-stock-price-change">'.round($difference_percent,3).' %</span>';

                            break;

                    }

    
                }else {
    
                    switch ($information_request){

                        case 'Color Fill':
    
                            return 'rgba(14, 255, 0,0.8)';

                            break;

                        case 'Color Line':

                            return '#089000';

                            break;

                        case 'Difference Percent';

                            $difference_percent = $array_daily_stock_price[$day_value_1]['4. close']/$array_daily_stock_price[$day_value_2]['4. close'] * 100 - 100;
        
                            return '<span style="color:#00ee00;">+ '.round($difference_percent,3).' %</span>';

                            break;

                    }
    
                }

            }

        }

    }

    function getMonthlyStockPrice($array_parameter){

        $information_request = $array_parameter['Information'];

        $array_monthly_stock_price = $this->array_content['MonthlyStockPrice'];

        if (empty($array_monthly_stock_price)){

            return false;

        }else {

            if($information_request === 'Labels'){

                ob_start();

                foreach ($array_monthly_stock_price as $key => $value){

                    echo '"'.$key.'",';

                }

                $output = ob_get_clean();

                return $output;

            }elseif ($information_request === 'Dataset') {

                ob_start();

                foreach ($array_monthly_stock_price as $key => $value){

                    echo '"'.$value['4. close'].'",';

                }

                $output = ob_get_clean();

                return $output;

            }else {

                $array_monthly_stock_price_length = count($array_monthly_stock_price);

                $array_key_1 = $array_monthly_stock_price_length - 1;

                $array_key_2 = $array_monthly_stock_price_length - 2;

                $array_key_value = array_keys($array_monthly_stock_price);

                $day_value_1 = $array_key_value[$array_key_1];

                $day_value_2 = $array_key_value[$array_key_2];

                $difference_stock_value = $array_monthly_stock_price[$day_value_1]['4. close'] - $array_monthly_stock_price[$day_value_2]['4. close'];

    
                if ($difference_stock_value < 0){

                    switch ($information_request){

                        case 'Color Fill':
    
                            return 'rgba(255, 99, 132,0.8)';

                            break;

                        case 'Color Line':

                            return '#ff6384';

                            break;

                    }

    
                }else {
    
                    switch ($information_request){

                        case 'Color Fill':
    
                            return 'rgba(14, 255, 0,0.8)';

                            break;

                        case 'Color Line':

                            return '#089000';

                        break;

                    }
    
                }


            }

        }

    }

    function getQuorterFinancialRatio($array_parameter){

        $information_request = $array_parameter['Information'];

        $ratio_request = $array_parameter['Ratio'];

        $array_quorter_financial_ratio = $this->array_content['QuorterFinancialRatio'];

        if (empty($array_quorter_financial_ratio)){

            return false;

        }else {

            if($information_request === 'Labels'){

                ob_start();

                foreach ($array_quorter_financial_ratio as $key){

                    echo '"'.$key['date'].'",';

                }

                $output = ob_get_clean();

                return $output;

            }elseif ($information_request === 'Dataset') {

                ob_start();

                foreach ($array_quorter_financial_ratio as $key => $value){

                    echo '"'.$value[$ratio_request].'",';

                }

                $output = ob_get_clean();

                return $output;

            }

        }

    }

    // Graph Daily Stock Price
    function GraphDailyStockPrice(){

        if (!empty($this->getDailyStockPrice(array('Information' => 'Dataset')))){

            return '
                <div class="s-halfpage graph-halfpage" id="DailyStockPriceContainer">
                    <canvas id="DailyStockPrice"></canvas>
                </div>
                <script>
                
                Chart.defaults.global.defaultFontColor = "whitesmoke";

                Chart.defaults.global.defaultFontFamily = "Open Sans, sans-serif";

                    new Chart("DailyStockPrice", {
                            type: "line",
                            data: {
                                labels: ['.$this->getDailyStockPrice(array('Information' => 'Labels')).'],
                                datasets: [{
                                    label: "Daily Closing Price",
                                    data: ['.$this->getDailyStockPrice(array('Information' => 'Dataset')).'],
                                    backgroundColor: "'.$this->getDailyStockPrice(array('Information' => 'Color Fill')).'",
                                    borderColor: "'.$this->getDailyStockPrice(array('Information' => 'Color Line')).'",
                                    type: "line",
                                    lineTension: 0,
                                    borderWidth: 2
                                }],
                            },
                            options : {
                            maintainAspectRatio: false,
                            spanGaps: false,
                            elements: {
                                line: {
                                    tension: 0.1
                                }
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            },
                            legend: {
                                labels: {
                                    fontSize: 15
                                }
                            },                            

                        }
                        });

                    </script>';

        }

    }

    function GraphMonthlyStockPrice(){

        if (!empty($this->getMonthlyStockPrice(array('Information' => 'Labels')))){

            return '
                    <div class="s-halfpage graph-halfpage s-inner" id="MonthlyStockPriceContainer">
                        <canvas id="MonthlyStockPrice"></canvas>
                    </div>
                </div>
                <script>

                    new Chart("MonthlyStockPrice", {
                            type: "bar",
                            data: {
                                labels: ['.$this->getMonthlyStockPrice(array('Information' => 'Labels')).'],
                                datasets: [{
                                    label: "Monthly Closing Price",
                                    data: ['.$this->getMonthlyStockPrice(array('Information' => 'Dataset')).'],
                                    backgroundColor: "'.$this->getMonthlyStockPrice(array('Information' => 'Color Fill')).'",
                                    borderColor: "'.$this->getMonthlyStockPrice(array('Information' => 'Color Line')).'"
                                }],
                            },
                            options : {
                            maintainAspectRatio: false,
                            spanGaps: false,
                            elements: {
                                line: {
                                    tension: 0.1
                                }
                            },
                            legend: {
                                labels: {
                                    fontSize: 15
                                }
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            }
                        }
                        });

                    </script>';

        }

    }

    function GraphQuorterFinancialRatio(){

        if (!empty($this->getQuorterFinancialRatio(array('Information' => 'Dataset', 'Ratio' => 'cashRatio')))){

            return '
                <div id="FinancialRatiosImage" class="s-backimg">
                    <div class="s-fullpage s-inner" id="FinancialRatiosLayer">
                        <div id="QuorterFinancialRatioContainer">
                            <canvas id="QuorterFinancialRatioStockPrice"></canvas>
                        </div>
                    </div>
                </div>
                <script>
                    new Chart("QuorterFinancialRatioStockPrice", {
                            type: "bar",
                            data: {
                                labels: ['.$this->getQuorterFinancialRatio(array('Information' => 'Labels', 'Ratio' => 'cashRatio')).'],
                                datasets: [{
                                    label: "Cash Ratio",
                                    data: ['.$this->getQuorterFinancialRatio(array('Information' => 'Dataset', 'Ratio' => 'cashRatio')).'],
                                    backgroundColor: "#dabcff",
                                    borderColor: "#dabcff"
                                }, 
                                {
                                    label: "Quick Ratio",
                                    data: ['.$this->getQuorterFinancialRatio(array('Information' => 'Dataset', 'Ratio' => 'quickRatio')).'],
                                    backgroundColor: "#EE82EE",
                                    borderColor: "#EE82EE"
                                },
                                {
                                    label: "Debt Ratio",
                                    data: ['.$this->getQuorterFinancialRatio(array('Information' => 'Dataset', 'Ratio' => 'debtRatio')).'],
                                    backgroundColor: "#E64C94",
                                    borderColor: "#E64C94"
                                }
                            ],
                            },
                            options : {
                            maintainAspectRatio: false,
                            spanGaps: false,
                            elements: {
                                line: {
                                    tension: 0.1
                                }
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            }
                        }
                        });

                    </script>';

        }

    }

    function content(){

        $image_source_industry = $this->getCompanyInformation(array('Information' => 'Industry Image', 'Raw' => true));

        $page_name = $this->getCompanyInformation(array('Information' => 'Company Name', 'Raw' => true));

        $page_description = $this->getCompanyInformation(array('Information' => 'Information', 'Raw' => true));

        $change_in_stock_value = $this->getDailyStockPrice(array('Information' => 'Difference Percent'));

        $array_information_header = ['Pagename' => $page_name, 'Description' => $page_description, 'Stock Value Change' => $change_in_stock_value ];

        $Content =  

        $this->getHeader($array_information_header)
        .'<div class="content-container" id="stock-page">'
        .'<div class="s-backimg" id="stock-first-sector">
                <div class="s-inner" id="stock-first-sector-layer">'
                    .$this->getCompanyInformation(array('Information' => 'Company Name'))
                    .$this->GraphDailyStockPrice()
        .'</div></div>
        <div class="s-backimg" id="company-info-sector" style="background-image:url(\''.$image_source_industry.'\')"><div class="s-fullpage s-center-vertical" id="company-info-sector-layer"><div class="s-inner">'
        .$this->getCompanyInformation(array('Information' => 'CEO'))
        .$this->getCompanyInformation(array('Information' => 'Symbol'))
        .$this->getCompanyInformation(array('Information' => 'Exchange'))
        .$this->getCompanyInformation(array('Information' => 'Industry'))
        .$this->getCompanyInformation(array('Information' => 'Information'))
        .$this->getCompanyInformation(array('Information' => 'Company Update'))
        .'</div></div></div>'
        .$this->GraphMonthlyStockPrice()
        .$this->GraphQuorterFinancialRatio()
        .'</div></div>'
        .$this->getFooter();

        echo $this->minify_output($Content);


    }

}