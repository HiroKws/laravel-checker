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
	'No Application key set' => 'Set wrong Application key.<br>Edit <code>application/config/application.php</code>, and set about 32 characters rundom string to `key` key.<br>If you set empty string, it will make error. When you don\' change it, it will look going well, but it became security resk in future.',

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
	'They are optional'=> 'From here, optional checking. For example, if you will not use Cache class, <code>storage/cache</code> directory is not needed. But you use the class, you must make it writeable.',
	// Strage
	'Storage' => 'storage Directory',
	'Cache directory' => 'cache Directory',
	'Cache directory not exist' => '<code>:arg1</code> is not exist.<br>This directory is used by Cache class.<br>Please make it if you needed.',
	'Cache directory no writable' => '<code>:arg1</code> directory is not writeable.<br>This directory is used by Cache class.<br>On Linux/unix environment, most of times, it cause from write permission for \'other\' users. Sometime unintendly owner of the directory changed to like \'root\'<br>On Windows environmet, check ACL setting. When you installed like XAMMP/WAMP type softwear into non accessable directory from Web server user or group, it will be happen.',
	'Cache directory writable' => 'Writeable : <code>:arg1</code>',
	'Database directory' => 'database Directory',
	'Database directory not exist' => '<code>:arg1</code> is not exist.<br>This directory will be used when you use SQLite as database.<br>Please make it if you needed.',
	'Database directory no writable' => '<code>:arg1</code> directory is not writeable.<br>This directory will be used when you use SQLite as database.<br>On Linux/unix environment, most of times, it cause from write permission for \'other\' users. Sometime unintendly owner of the directory changed to like \'root\'<br>On Windows environmet, check ACL setting. When you installed like XAMMP/WAMP type softwear into non accessable directory from Web server user or group, it will be happen.',
	'Database directory writable' => 'Writeable : <code>:arg1</code>',
	'Logs directory' => 'logs Directory',
	'Logs directory not exist' => '<code>:arg1</code> is not exist.<br>This directory will keep your logs by Laravel.<br>Please make it if you needed.',
	'Logs directory no writable' => '<code>:arg1</code> directory is not writeable.<br>This directory will keep your logs by Laravel.<br>On Linux/unix environment, most of times, it cause from write permission for \'other\' users. Sometime unintendly owner of the directory changed to like \'root\'<br>On Windows environmet, check ACL setting. When you installed like XAMMP/WAMP type softwear into non accessable directory from Web server user or group, it will be happen.',
	'Logs directory writable' => 'Writeable : <code>:arg1</code>',
	'Sessions directory' => 'sessions Directory',
	'Sessions directory not exist' => '<code>:arg1</code> is not exist.<br>As the name said, this will be used when keep sessions for file system.<br>Please make it if you needed.',
	'Sessions directory no writable' => '<code>:arg1</code> directory is not writeable.<br>As the name said, this will be used when keep sessions for file system.<br>On Linux/unix environment, most of times, it cause from write permission for \'other\' users. Sometime unintendly owner of the directory changed to like \'root\'<br>On Windows environmet, check ACL setting. When you installed like XAMMP/WAMP type softwear into non accessable directory from Web server user or group, it will be happen.',
	'Sessions directory writable' => 'Writeable : <code>:arg1</code>',
	'Work directory' => 'work Directory',
	'Work directory not exist' => '<code>:arg1</code> is not exist.<br>This directory will be used by Bundle class when install or update.<br>Please make it if you needed.',
	'Work directory no writable' => '<code>:arg1</code> directory is not writeable.<br>This directory will be used by Bundle class when install or update.<br>On Linux/unix environment, most of times, it cause from write permission for \'other\' users. Sometime unintendly owner of the directory changed to like \'root\'<br>On Windows environmet, check ACL setting. When you installed like XAMMP/WAMP type softwear into non accessable directory from Web server user or group, it will be happen.',
	'Work directory writable' => 'Writeable : <code>:arg1</code>',

	// PHP Modules
	'PHP Modules' => 'PHP modules',
	'Multibyte String extension' => 'Multibyte String extension',
	'Multibyte String loaded' => 'Multibyte String extension loaded.<br>ロードされていても設定がされていないと正しく動作しません。正しく動作しない場合は、PHPの設定を確認してください。<br>この拡張はマルチバイト関数の使用時に必要ですが、LaravelのStrクラスでも使用されています。いくつかのメソッドでUTF-8を使用するために使用されます。',
	'No Multibyte String' => 'Multibyte String extension is not loaded.<br>この拡張はマルチバイト関数の使用時に必要ですが、LaravelのStrクラスでも使用されています。いくつかのメソッドでUTF-8を使用するために使用されます。',
	'Memcached extension' => 'Memcached拡張',
	'Memcached loaded' => 'Memcached拡張ロード済み<br>ロードされていても、正しく設定されていない場合は動作しません。動作しない場合は、設定を見直してください。<br>この拡張はキャッシュやセッションにMemcachedを使用する場合、必要となります。',
	'No Memcached'=> 'Memcached拡張はロードされていません。<br>この拡張はLaravelでキャッシュやセッションにMemcachedを使用したい場合のみ必要となります。',
	'APC extension' => 'APC拡張',
	'APC loaded' => 'APC拡張ロード済み<br>ロードされていても、正しく設定されていない場合は動作しません。動作しない場合は、設定を見直してください。<br>この拡張はキャッシュやセッションにAPCを使用する場合、必要となります。',
	'No APC'=> 'APC拡張はロードされていません。<br>この拡張はLaravelでキャッシュやセッションにAPCを使用したい場合のみ必要となります。',
	'PDO extension' => 'PDO拡張',
	'PDO loaded' => 'PDO拡張ロード済み',
	'No PDO' => 'PDO拡張はロードされていません',
	'SQLite extension' => 'SQLite拡張',
	'SQLite loaded' => 'SQLite拡張ロード済み<br>この結果は動作を保証するものではありません。PHP拡張がロードされていることを知らせるものです。本体がインストールされていなかったり、設定を正しくおこなっていなかったりする場合は、動作しないことでしょう。',
	'No SQLite' => 'SQLite拡張はロードされていません',
	'MySQL extension' => 'MySQL拡張',
	'MySQL loaded' => 'MySQL拡張ロード済み<br>この結果は動作を保証するものではありません。PHP拡張がロードされていることを知らせるものです。本体がインストールされていなかったり、設定を正しくおこなっていなかったりする場合は、動作しないことでしょう。',
	'No MySQL' => 'MySQL拡張はロードされていません',
	'PostgreSQL extension' => 'PostgreSQL拡張',
	'PostgreSQL loaded' => 'PostgreSQL拡張ロード済み<br>この結果は動作を保証するものではありません。PHP拡張がロードされていることを知らせるものです。本体がインストールされていなかったり、設定を正しくおこなっていなかったりする場合は、動作しないことでしょう。',
	'No PostgreSQL' => 'PostgreSQLはロードされていません。',

	// Mod Rewrite
	'Rewrite module' => 'Apacheリライトモジュール',
	'Rewrite module loaded' => 'リライトモジュールロード済み<br>この結果はモジュールのロードを確認するもので、実際に動作しているかをテストしていません。ロードされていても動作しない場合は、リライトを設定できる許可が与えられているか確認してください。',
	'No Rewrite module'=> 'リライトモジュールはロードされていません<br>この結果はApacheか、互換サーバーにおいてPHPがモジュールモードで動作している場合に意味があります。非互換サーバーや、CGIモードで動作している場合は、意味を持ちません。<br>モジュールモードで動作しているPHPがApacheか互換サーバーで動作している場合、このモジュールが存在しないとURIのリライトはできません。',
	'Rewrite test' => 'リライトテスト',
	'Rewrite Success' => 'URIリライトは動作しています',
	'Rewrite faild' => 'URIリライトは動作していません<br>この動作テストはapacheと互換サーバーに対するものです。互換性のないサーバーの場合、この結果は意味を持ちません。',
	'Application Index' => 'Application Index',
	'Empty Application index' => 'Application indexは空文字列です',
	'Specified Application index' => '現在のApplication index: <code>:arg1</code><br>URIのリライトが動作しています。<code>application/config/application.php</code>の<code>index</code>項目は、空文字列にしてください。この項目はリンクやアドレスの生成時にベースURLの後に付加されます。通常はindex.phpです。<br>リライトが動作しない場合は、index.phpのままにしてください。',

	// Suggestions
	'Suggestion' => 'Suggestions',
	'Suggestions for beginers' => 'Those suggestions are there for green users to avoid getting a trap in.',
	'Cookie driver' => 'You use \'cookie\' as session driver.<br>In Laravel programing, form data and messages to display on a page are passed by session normally. A browse cookie just keep 4k byte data. So sometime session data will be overflow from cookie maximam size, and  you will get a error.For begginer, it is hard to find the why. So I suggest set other dirver, like \'file\' for it.<br>To change session driver, edit <code>application/config/session.php</code>.',
	'No Cookie driver' => 'Session driver : <code>:arg1</code>',
);