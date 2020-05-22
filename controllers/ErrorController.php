<?php

class errorController{
    
    public function index(){
        echo "<div class='col-md-12 text-center'>";
        echo "<h1> Error 404 </h1>";
        echo "<img class='img-fluid error-oops' src='".base_url."img/OOPS.png'>";
        echo "</div>";
        header("Location:".base_url."");
    }
    
}
