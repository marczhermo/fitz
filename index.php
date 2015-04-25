<?php
/**
 * --------------------------------------------------
 * FITZ Application Framework
 * --------------------------------------------------
 * Uses the following:
 * Composer - De facto standard of file management and loading
 * Namespaces - better file encapsulation and inclusion
 * Reflection - Classes inspection API following Dependency Inversion
 * Traits - Abstracts\Properties\*.php - Class property definitions
 * Abstracts\*.php - List of Abstract and/or Interface classes to follow
 * Abstracts\Properties\*.php - Convention to follow for code reuse too
 * Json - Primary output, use ?format=html for HTML file
 * Configuration Files - Located in Configs folder
 * Filters - List of objects executed in chain before Controller
 * Todo: Create an Event system after Controller
 */
require_once('vendor/autoload.php');
//Boot up application framework
$app = new \Fitz\Application();
//End nothing below here