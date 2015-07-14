<?php
	require_once(dirname(__FILE__).'/../../../../wp-load.php');
	require_once('../includes/mailchimp.php');

	$MailChimp = new MailChimp('77ec9bdaf12b844dbc576c1aeb41c07f-us7');

	$result = $MailChimp->call('lists/subscribe', array(
        'id'                => '5b568bad0b',
        'email'             => array('email'=> $_REQUEST['email']),
        //'merge_vars'        => array('FNAME'=>'Davy', 'LNAME'=>'Jones'),
        'double_optin'      => false,
        'update_existing'   => true,
        'replace_interests' => false,
        'send_welcome'      => false,
    ));

	print_r($result['status']);
?>