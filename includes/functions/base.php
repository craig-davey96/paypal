<?php

function cleanPageInput($page)
{
    return str_replace(".", "", $page);
}

function redirect ($url) {
	
	$redirect = header("Location:" . $url);
	
	return $redirect;
};

function createRandomPassword($char_length = 7) {

    $chars = "abcdefghjkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= $char_length) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

function message ($result , $msg , $url) {
	$message = $_SESSION['message'] = "<div class=\"notify " .$result. "\">" . $msg. "</div>";
	$message = header("Location:" . $url);	
	return $message;
	
}
echo $_SESSION['message'];
unset($_SESSION['message']);


function sendEmail ($subject , $to , $from , $message_include){
	
	$sendEmail = require('../libs/swiftmailer/lib/swift_required.php');
	$sendEmail = $transport= Swift_MailTransport::newInstance();
	$sendEmail = $mailer = Swift_Mailer::newInstance($transport);
	
	
	$sendEmail = $message = Swift_Message::newInstance($subject);
	$sendEmail = $message->setFrom($siteContact[$from]);
	$sendEmail = $message->setTo(array($siteContact[$to]));
	
	
    $sendEmail = ob_start();
    $sendEmail = include($message_include);
    $sendEmail = $body = ob_get_clean();
	
    $sendEmail = $message->setBody($body, 'text/html');
    $sendEmail = $mailer->send($message);
	
	return $sendEmail;
		
}

function initJS()
{
    return ob_start();
}

function terminateJS()
{
    if(!isset($GLOBALS['js']))
    {
        $GLOBALS['js'] = array();
    }

    $GLOBALS['js'][] = ob_get_clean();
}

function softTrim($text, $count, $wrapText = '...')
{
    if (strlen($text) > $count) {
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    } else {
        $wrapText = '';
    }
    return $text . $wrapText;
}

function ADMIN_LOGGEDIN (){

	if(isset($_SESSION['ADMIN_LOGGEDIN_USERNAME_'.SESSION_NAME])){

		return true;

	}else{

		return false;

	}

}

?>