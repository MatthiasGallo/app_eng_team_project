<?php

require 'db.php';

class Partials extends Db{

    function getHeader($header_information_array){

        $head_title = $header_information_array['Title'];

        $head_content = $header_information_array['Content'];

        $header_html = '<!doctype html>

                        <html lang="en">

                        <head>

                            <meta charset="utf-8">

                            <title>' . $head_title . '</title>

                            <meta name="viewport" content="width=device-width, initial-scale=1.0">

                            <meta name="description" content="' . $head_content . '">

                            <meta property="og:title" content="' . $head_title . '">

                            <meta property="og:description" content="' . $head_content . '">

                            <link rel="stylesheet" href="/assets/css/style.css">

                            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Open+Sans&display=swap" rel="stylesheet">

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                            <script src="/assets/js/main.js"></script>

                        </head>

                        <body>

                        <header>

                            <ul id="top-menu">

                                <li><a href="/">Home</a></li>

                                <li><a href="/?p=product">Items</a></li>

                                <li><a href="/?p=user">User</a></li>

                                ' . $this->getHeaderLogout() . '

                            </ul>

                        </header>';

        return $header_html;

    }

    function getHeaderLogout(){

        if ($this->getUser() != false) {

            return '<li><a href="/?p=user&action=logout">Logout</a></li>';

        }

    }



    function getFooter(){

        $footer_html = 
        
        '<footer class="s-inner"></footer>

        </body>

        </html>';

        return $footer_html;

    }

}