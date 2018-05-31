<?php

namespace polakjan\mvc\routing;

/**
 * have a look at the URL, return the name of the controller
 * to use
 */
function getControllerFromUrl()
{
    // look for the parameter page in the URL address
    if (isset($_GET['page'])) {
        // if it finds it, it will return it's value
        return $_GET['page'];
    } 
    
    // if it does not find it, it will return the string 'index'
    return 'index';
}