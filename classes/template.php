<?php
// template class where all the metadata and libraries are stored
class template{

   var $title = '';

   static function getMeta(){
        echo '
			 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  			 <meta charset="UTF-8">
  			 <meta http-equiv="X-UA-Compatible" content="ie-edge"></meta>
        ';

    }

    static function getLibs(){
        echo '
			 <link href="css/style.css" type="text/css" rel="stylesheet">
             <link href="css/bootstrap.min.css" rel="stylesheet">
			';
    }

    static function getJsLibs(){
        echo '        
			<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
			<script type="text/javascript" src="js/functions.js"></script>
            <script src="js/bootstrap.min.js"></script>
        ';
    }
}