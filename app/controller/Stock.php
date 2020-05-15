<?php

namespace Controller;


class Stock
{

    public $array_company_information;

    function __construct($rows){

        $this->array_company_information = $rows->fetch();
        
    }

    function getDailyStockPrice(){

        $json_daily_stock_price = $this->array_company_information['DailyStockPrice'];

        $array_daily_stock_price = json_decode($json_daily_stock_price, TRUE);

        return $array_daily_stock_price;


    }

    function getMonthlyStockPrice(){

        $json_monthly_stock_price = $this->array_company_information['MonthlyStockPrice'];

        $array_monthly_stock_price = json_decode($json_monthly_stock_price, TRUE);

        return $array_monthly_stock_price;

    }

    function getQuorterFinancialRatio(){

        $json_quorter_financial_ratio = $this->array_company_information['QuorterFinancialRatio'];

        $array_quorter_financial_ratio = json_decode($json_quorter_financial_ratio, TRUE);

        return $array_quorter_financial_ratio;

    }

    function getContentArray(){

        $ContentArray = [

            'Company' => [

                'Symbol' => $this->array_company_information['CompanySymbol'],

                'Company Name' => $this->array_company_information['CompanyName'],

                'Information' => $this->array_company_information['CompanyDescription'],

                'CEO' => $this->array_company_information['CompanyCEO'],

                'Exchange' => $this->array_company_information['CompanyExchange'],

                'Industry' =>  $this->array_company_information['CompanyIndustry'],

                'Industry Image' => $this->array_company_information['ImageSource'],

                'Company Update' =>$this->array_company_information['CompanyUpdate']

            ], 

            'DailyStockPrice' => $this->getDailyStockPrice(),

            'MonthlyStockPrice' => $this->getMonthlyStockPrice(),

            'QuorterFinancialRatio' => $this->getQuorterFinancialRatio()

        ];

        return $ContentArray;

    }

}
