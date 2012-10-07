<?php

/*
 * Laravel Environment checker Language file
 *
 * for English(en)
 *
 */

return array(
	/*
	 * Display name in language selector
	 */
	'display' => 'English',

	/*
	 * Titile & description
	 */
	'Laravel Environment Checker' => 'Laravel Environment Checker',
	'Welcome to Laravel Environment Checker' => 'Welcome to Laravel comminity. If you meet a troble to install Laravel, read the following instructions. And when you feel hard to understand, ask in <a href="http://forums.laravel.com/">Laravel Forum</a>.',

	/*
	 * Requirements
	 */
	'Requirements' => 'Requierments',
	'PHP Version' => 'PHP Version',
	'Web server' => 'Web Server',
	'Web server caution' => 'Your Web server is :arg1.<br>Laravel work on Apache or Apache compatible web servers.This checker is not able to judge that your server is Apache compatible. So please make sure by your self.<br>Also your server is not compatible with Apache, there are possible to work Laravel when you set properly PHP and extensions, and URL rewrite function on your server.',
	'Low PHP version' => 'PHP version is :arg1. Laravel requires PHP 5.3.0 or newer. You need to update PHP version to work Laravel.<br>If you use a shared hosting service or PaaS, ask with your server manager.',

	// Fileinfo
	'Fileinfo extension' => 'Fileinfo extension',
	'Fileinfo loaded' => 'Fileinfo PHP extension loaded.',
	'No Fileinfo' => 'Fileinfo PHP extension is not loaded.<br>When you use Windows, edit your php.ini file, and set active Fileinfo.<br>On Linux/unix, nomally just install PHP5 Fileinfo package with a package manager.<br>If you use Paas or shared server, ask with server manager.',

	// Mcrypt
	'Mcrypt extension' => 'Mcrypt extension',
	'Mcrypt loaded' => 'Mcrypt PHP extension loaded.',
	'No Mcrypt' => 'Mcrypt PHP extension is not loaded.<br>When you use Windows, edit your php.ini file, and set active Mcrypt.<br>On Linux/unix, nomally just install PHP5 Mcrypt package with a package manager.<br>If you use Paas or shared server, ask with server manager.',

	// Application key
	'Application Key' => 'Application Key',
	'Application key set' => 'Set Application key correctly.',
	'No Application key set' => 'Not Set Application key correctly.',

	// View cache
	'View cache' => 'View cache direcotry',
	'View cache not exist' => "No directory : <code>:arg1</code><br>View cache directory don't exist. So please make views directory under storage directory.",
	'View cache no writable' => "No write permission : <code>:arg1</code><br>No permission to write with view cache.<br>When you user Linux/unix file system, please check and set directory permission. Normally no write access permission from 'other' users. If so, add write permission. Sometime owner set to like root user unintentionally.If so, change owner to you, and set write permission for 'other' users.<br>When you use Windows, check ACL with this directory.",
	'View chace writable' => 'Directory writeable : <code>:arg1</code>',

	// Result
	'No fullfilled all requirements' => 'No fullfilled all requirements.<br>You need :arg1 more setting to work Laravel perfectlly. Please check/correct your setting by following instructions.',
	'Fulfilled Requirements' => 'Congratulations!<br>No problem on your environment. Please enjoy Larave!',
	/*
	 * Optional Tests
	 */
	'Optional Tests' => 'Optional Tests',
	// Strage
	// PHP Modules
	// Mod Rewrite
	// Suggestions
);