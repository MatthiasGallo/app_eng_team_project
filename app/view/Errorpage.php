<?php

namespace View;

class Errorpage extends Partials{

    function getNoPageFound(){

        $array_header = ['Pagename' => 'Page not found', 'Description' => 'The page you’re looking for does not exist.'];

        echo 
        
        $this->getHeader($array_header)
        .'<div class="s-fullpage s-center-content" id="page-not-found-page">
            <div class="s-inner content-container">
                <div id="page-not-found-content">
                    <h1 >404</h1>
                    <h4>The page you’re looking for does not exist.</h4>
                </div>
            </div>
        </div>';

    }

}