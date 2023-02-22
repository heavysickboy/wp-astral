<?php
/**
 * Plugin Name: CF7 Form SMS
 * Plugin URI: https://www.kwebmaker.com
 * Author: Kwebmaker Digital Agency
 * Author URI: https://www.kwebmaker.com
 * Description: Get CF7 API Integration and send SMS TEXT SPEED. Develop By JS   
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: cf7-form-sms
*/

// defined( 'ABSPATH' ) or die( 'Unauthorized access!' );

function after_sent_mail( $wpcf7 ) {
    $submission = WPCF7_Submission::get_instance();
    $wpcf = WPCF7_ContactForm::get_current();
    if($wpcf->id == 356 || $wpcf->id == 86 || $wpcf->id == 89 || $wpcf->id == 1749){
    	    $posted_data = $submission->get_posted_data();
    	    $key = "gBvxmaGdNMlaxigY";	
            $mbl = $posted_data['phone'];	 
            $message_content=urlencode("Thank you for the enquiry & your valued interest. Our team will connect with you shortly. Astral Bathware.");
            
            $senderid="ASTRAL";
            $route= 1;
            $templateid="1707165899762223108";
            $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$key&senderid=$senderid&templateid=$templateid&number=$mbl&message=$message_content";
            			
            $output = file_get_contents($url);
            
            return $wpcf;
          }
    }
add_action('wpcf7_mail_sent', 'after_sent_mail');