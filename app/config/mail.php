<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "log"
	|
	*/
	'driver' => 'smtp',
	'host' => 'sunrockresortscom1.ipage.com',
	'port' => 587,
	'from' => array('address' => 'no-reply@doneresort.com', 'name' => "D'One resort"),
	'encryption' => 'tls',
	'username' => 'no-reply@doneresort.com',
	'password' => 'BarasRizal2016',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,

);
