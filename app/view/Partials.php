<?php 

namespace View;

class Partials{

    function minify_output($buffer) {

        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
    
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
    
        $buffer = preg_replace($search, $replace, $buffer);
    
        return $buffer;
        
    }

    function checkKeyArray($array_key, $array){

        if (array_key_exists($array_key, $array)){

            return $array[$array_key];

        }else {

            return ' ';

        }

    }
    
    

    function getHeader($InformationArray){

        $html = 
        '<!doctype html>
        <html lang="de">
          <head>
            <meta charset="utf-8">
            <title>'.$this->checkKeyArray('Pagename', $InformationArray).'</title>
            <meta name="description" content="'.$this->checkKeyArray('Description', $InformationArray).'">
            <link rel="stylesheet" href="/assets/css/style.css">
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
            <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
            <script src="/assets/js/main.js"></script>
          </head>
          <header>
            <div id="menu-bar">
                <div class="menu-button-container" id="open-menu">
                    <svg width="30px" height="30px" enable-background="new 0 0 341.333 341.333" version="1.1" viewBox="0 0 341.33 341.33" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" id="menu-icon"> <g fill="#fff"> <rect class="active-path" x="128" y="128" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" x="128" y="256" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" y="128" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" y="256" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" x="256" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" x="128" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" x="256" y="128" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> <rect class="active-path" x="256" y="256" width="85.333" height="85.333" data-old_color="#000000" data-original="#000000"/> </g></svg>
                </div>
                <div class="s-none menu-button-container" id="close-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" width="30px" viewBox="0 0 365.696 365.696" width="512px"><g><path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/></g> </svg>
                </div>
                <div id="pagename-container">
                    <p id="header-pagename">'.$this->checkKeyArray('Pagename', $InformationArray).'   '.$this->checkKeyArray('Stock Value Change', $InformationArray).'</p>
                </div>
            </div>
            <div class="s-fullpage" id="menu-page">
                <div class"s-inner">
                </div>
            </div>
          </header>
          <body>';

        return $html;

    }

    function getFooter(){

        $html = 
        '<footer>
        </footer>';

        return $html;

    }

}