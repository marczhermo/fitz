<?php
/**
 * --------------------------------------------------
 * Fitz PHP API Framework
 * --------------------------------------------------
 * Uses the following:
 * Composer - De facto standard of file management and loading
 * Namespaces - better file encapsulation and inclusion
 * Reflection - Classes inspection API following Dependency Inversion
 * Traits - horizontal code reusability
 * Json - Primary output, use ?format=html for HTML file
 * Filters - List of objects executed in chain before Controller
 * Events - List of objects executed after Controller
 */
require_once('vendor/autoload.php');
//Boot up application framework
$app = new \Fitz\Application;
//End nothing below here