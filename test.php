<?php

function cleanNewsData($parameter_array){

    $source_name = $parameter_array['Source Name'];

    $article_content = $parameter_array['Content'];

    $array_words_not_want = [$source_name, 'Sign up', 'sign up', 'you', 'You'];

    $is_clean_text = true;

    foreach ($array_words_not_want as $value){

        if (strpos($article_content, $value) !== false ){

            $is_clean_text = false;

        }

    }

    if ($is_clean_text === true){

        $position_cut_content = strpos($article_content, '[');

        $article_content_new = substr($article_content, 0, $position_cut_content);

        if (str_word_count($article_content_new) > 30){

            $sanitized_content = filter_var($article_content_new, FILTER_SANITIZE_STRING);

            return $sanitized_content;

        }else {

            return false;

        }

    }else {

        return false;

    }

}

function updateBusinessNews(){

    $json_url = 'https://newsapi.org/v2/top-headlines?category=business&country=us&pageSize=30&apiKey=40bc964207b84414acd37715eb8944f3';

    $json = file_get_contents($json_url);

    if ($json !== false){

        $array_news = json_decode($json, TRUE);

        if ($array_news['status'] === 'ok'){

            $array_storing_information = array();

            $array_news = $array_news['articles'];

            foreach($array_news as $index){

                $source_name = $index['source']['name'];

                $article_name = $index['title'];

                $article_url = $index['url'];

                $article_image = $index['urlToImage'];

                $article_content = $index['content'];

                $array_parameter_clean_data = ['Source Name' => $source_name, 'Content' => $article_content];

                $article_content_clean = $this->cleanNewsData($array_parameter_clean_data);

                if (isset($source_name, $article_name, $article_url, $article_image,$article_content) && $article_content_clean !== false){

                    $array_single_article = ['Source Name' => $source_name, 'Title' => $article_name, 'Url' => $article_url, 'Image Url' => $article_image, 'Content' => $article_content_clean ];

                    array_push($array_storing_information,$array_single_article);

                }

            }

            $json_to_store = json_encode($array_storing_information);

            $sql = "UPDATE News SET InformationObject = ? WHERE Id = 1";

            $statement = $this->connect()->prepare($sql);

            $statement->execute(array($json_to_store));

        }

    }

}

function updateCompanyNews($array_parameter){

    $company_name = $array_parameter['Company Name'];

    $company_symbol = $array_parameter['Company Symbol'];

    $company_name_url = urlencode($company_name);

    $url_to_parse = 'https://news.google.com/rss/search?q='.$company_name_url.'&hl=en-US&gl=US&ceid=US:en';

    $array_content = simplexml_load_file($url_to_parse);

    if ($array_content !== false){

        $array_title = array();

        $i = 0;

        while($i <= 10){

            $title = $array_content->channel->item[$i]->title;

            if (!empty($title)){

                $title_sanitized = filter_var($title, FILTER_SANITIZE_STRING);

                array_push($array_title, $title);
                
                $i++;

            }

        }

        return $array_title;

    }

}









