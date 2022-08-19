<?php

if(isset($_SESSION['success'])) {
    echo '<div class="notification success">';   
            echo '<span class="title">Success</span>'. $_SESSION['success'] .'<span class="close">X</span>'; 
    echo '</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])) {
    echo '<div class="notification error">';   
            echo '<span class="title">Error</span>'. $_SESSION['error'] .'<span class="close">X</span>'; 
    echo '</div>';
    unset($_SESSION['error']);
}
