<?php
/**
 * All Message Display Tool for Laravel Environment Checker
 */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', "1");

define('LANG_DIR', 'languages/');

/*
 * Clearing file status cache.
 */

if ( version_compare(PHP_VERSION, '5.3', '<') ) {
	clearstatcache();
}
else {
	// clear realpath, from 5.3
	clearstatcache(TRUE);
}

/*
 * Read language file from browser language setting.
 */

// As default fallback language, read en.php.
$current_lang = 'en';
if ( is_file(LANG_DIR.'en.php') ) {
	$strings = include LANG_DIR.'en.php';
}
else {
	$strings = array( );
}

if ( isset($_GET['lang'] )) {
	// Get language code from GET data
	$lang = $_GET['lang'];

	// read language file
	if ( is_file(LANG_DIR.$lang.'.php') ) {
		$strings = include LANG_DIR.$lang.'.php';
		$current_lang = $lang;
	}
} else {
	// Check the function if exist, because INIT extension is optional.
	if ( function_exists('locale_accept_from_http') ) {
		// Get language code
		$lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);

		// read language file
		if ( is_file(LANG_DIR.$lang.'.php') ) {
			$strings = include LANG_DIR.$lang.'.php';
			$current_lang = $lang;
		}
	}
}

/*
 * Read all language files to make language selector
 */
$languages = array();
foreach (glob(LANG_DIR."*.php") as $filename) {
	if($filename != 'checker.php') {
		$lang_data = include $filename;
		$pathinfo = pathinfo($filename);
		// $languages[langauge code] = 'display language name'
		$languages[$pathinfo['filename']] = $lang_data['display'];
	}
}

/*
 * Localization string getting helper
 */

function __($key, $args = array( ))
{
	global $strings;

	if ( array_key_exists($key, $strings) ) {
		$search = array( );
		$replace = array( );
		$i = 1;

		foreach ( $args as $arg ) {
			$search[] = ':arg'.$i++;
			$replace[] = $arg;
		}

		return str_replace($search, $replace, $strings[$key]);
	}
	else {
		return $key;
	}
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo __('Messages Checker'); ?></title>
		<meta name="viewport" content="width=device-width">
		<style type="text/css">
			body { width: 42em; margin: 0 auto 2.0em auto;
				   font-family: sans-serif; background: #fff; font-size: 1em; }
			h1 { letter-spacing: -0.04em; }
			code { font-family: monaco, monospace; }
			table { border-collapse: collapse; width: 100%; border: 3px #eee solid; }
			table th,
			table td { padding: 0.4em; text-align: left; vertical-align: top; }
			table th { width: 12em; font-weight: normal; }
			table tr:nth-child(odd) { background: #eee; }
			.pass { color: #171; }
			.fail { color: #d11; }
			.caution { color: #861; }
			.result { font-size: 1.2em; padding: 0.5em;}
			div#lang_selector { padding: 1.0em 1.0em 0 0; float: right;}
		</style>
	</head>
	<body>

		<div id="lang_selector">
			<form action="#" id="lang_select">
				<select onchange="blur(); location.href = options[this.selectedIndex].value;">
					<?php foreach( $languages as $code => $display ) : ?>
						<option
							value="<?php echo $_SERVER['SCRIPT_NAME']."?lang=".$code ?>"
							<?php echo $code == $current_lang ? 'selected' : ''; ?>
						>
							<?php echo $display ?>
						</option>
					<?php endforeach; ?>
				</select>
			</form>
		</div>
		<div style="clear: both;"></div>

		<h1><?php echo __('Laravel Environment Checker'); ?></h1>

		<p><?php echo __('Welcome to Laravel Environment Checker'); ?></p>

		<h2><?php echo __('Requirements'); ?></h2>

		<table>

			<tr>
				<th><?php echo __('Web server'); ?></th>
					<td class="pass"><?php echo '<< Server Name >>'; ?></td>
			</tr>
			<tr>
				<th><?php echo __('Web server'); ?></th>
					<td class="caution">
						<?php echo __('Web server caution', array( '<< Server Name >>' )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('PHP Version'); ?></th>
					<td class="pass"><?php echo PHP_VERSION ?></td>
			</tr>
			<tr>
				<th><?php echo __('PHP Version'); ?></th>
					<td class="fail">
						<?php echo __('Low PHP version',
							array( PHP_VERSION )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('Fileinfo extension'); ?></th>
					<td class="pass"><?php echo __('Fileinfo loaded') ?></td>
			</tr>
			<tr>
				<th><?php echo __('Fileinfo extension'); ?></th>
					<td class="fail"><?php echo __('No Fileinfo'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('Mcrypt extension'); ?></th>
					<td class="pass"><?php echo __('Mcrypt loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Mcrypt extension'); ?></th>
					<td class="fail"><?php echo __('No Mcrypt'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('Application Key'); ?></th>
					<td class="pass"><?php echo __('Application key set'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Application Key'); ?></th>
					<td class="caution"><?php echo __('No Application key set'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('View cache'); ?></th>
					<td class="fail">
						<?php echo __('View cache not exist', array( 'Install-Directory/storage/cache/views' ) ); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('View cache'); ?></th>
					<td class="fail">
						<?php echo __('View cache no writable',	array( 'Install-Directory/storage/cache/views' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('View cache'); ?></th>
					<td class="pass">
						<?php echo __('View cache writable', array( 'Install-Directory/storage/cache/views' )); ?>
					</td>
			</tr>

		</table>

			<p class="result fail">
				<?php echo __('No fullfilled all requirements', array( '999' )); ?>
			</p>

			<p class="result pass"><?php echo __('Fulfilled Requirements'); ?></p>

		<h2><?php echo __('Optional Tests'); ?></h2>

		<p><?php echo __('They are optional') ?></p>

		<h3><?php echo __('Storage') ?></h3>

		<table>

			<tr>
				<th><?php echo __('Cache directory'); ?></th>
					<td class="caution">
						<?php echo __('Cache directory not exist', array( 'Install-Directory/storage/cache/cache' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Cache directory'); ?></th>
					<td class="caution">
						<?php echo __('Cache directory no writable', array( 'Install-Directory/storage/cache/cache' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Cache directory'); ?></th>
					<td class="pass">
						<?php echo __('Cache directory writable', array( 'Install-Directory/storage/cache/cache' )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('Database directory'); ?></th>
					<td class="caution">
						<?php echo __('Database directory not exist', array( 'Install-Directory/storage/cache/database' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Database directory'); ?></th>
					<td class="caution">
						<?php echo __('Database directory no writable', array( 'Install-Directory/storage/cache/database' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Database directory'); ?></th>
					<td class="pass">
						<?php echo __('Database directory writable', array( 'Install-Directory/storage/cache/database' )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('Logs directory'); ?></th>
					<td class="caution">
						<?php echo __('Logs directory not exist', array( 'Install-Directory/storage/cache/logs' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Logs directory'); ?></th>
					<td class="caution">
						<?php echo __('Logs directory no writable', array( 'Install-Directory/storage/cache/logs' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Logs directory'); ?></th>
					<td class="pass">
						<?php echo __('Logs directory writable', array( 'Install-Directory/storage/cache/logs' )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('Sessions directory'); ?></th>
					<td class="caution">
						<?php echo __('Sessions directory not exist', array( 'Install-Directory/storage/cache/sessions' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Sessions directory'); ?></th>
					<td class="caution">
						<?php echo __('Sessions directory no writable', array( 'Install-Directory/storage/cache/sessions' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Sessions directory'); ?></th>
					<td class="pass">
						<?php echo __('Sessions directory writable', array( 'Install-Directory/storage/cache/sessions' )); ?>
					</td>
			</tr>

			<tr>
				<th><?php echo __('Work directory'); ?></th>
					<td class="caution">
						<?php echo __('Work directory not exist', array( 'Install-Directory/storage/cache/work' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Work directory'); ?></th>
					<td class="caution">
						<?php echo __('Work directory no writable', array( 'Install-Directory/storage/cache/work' )); ?>
					</td>
			</tr>
			<tr>
				<th><?php echo __('Work directory'); ?></th>
					<td class="pass">
						<?php echo __('Work directory writable', array( 'Install-Directory/storage/cache/work' )); ?>
					</td>
			</tr>

		</table>


		<h3><?php echo __('PHP Modules'); ?></h3>

		<table>

			<tr>
				<th><?php echo __('Multibyte String extension'); ?></th>
					<td class="pass"><?php echo __('Multibyte String loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Multibyte String extension'); ?></th>
					<td class="caution"><?php echo __('No Multibyte String'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('Memcached extension'); ?></th>
					<td class="pass"><?php echo __('Memcached loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Memcached extension'); ?></th>
					<td class="caution"><?php echo __('No Memcached'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('APC extension'); ?></th>
					<td class="pass"><?php echo __('APC loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('APC extension'); ?></th>
					<td class="caution"><?php echo __('No APC'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('PDO extension'); ?></th>
					<td class="pass"><?php echo __('PDO loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('PDO extension'); ?></th>
					<td class="caution"><?php echo __('No PDO'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('SQLite extension'); ?></th>
					<td class="pass"><?php echo __('SQLite loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('SQLite extension'); ?></th>
					<td class="caution"><?php echo __('No SQLite'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('MySQL extension'); ?></th>
					<td class="pass"><?php echo __('MySQL loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('MySQL extension'); ?></th>
					<td class="caution"><?php echo __('No MySQL'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('PostgreSQL extension'); ?></th>
					<td class="pass"><?php echo __('PostgreSQL loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('PostgreSQL extension'); ?></th>
					<td class="caution"><?php echo __('No PostgreSQL'); ?></td>
			</tr>

		</table>

		<h3><?php echo __('Mod Rewrite'); ?></h3>

		<table>

			<tr>
				<th><?php echo __('Rewrite module'); ?></th>
					<td class="pass"><?php echo __('Rewrite module loaded'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Rewrite module'); ?></th>
					<td class="caution"><?php echo __('No Rewrite module'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('Rewrite test'); ?></th>
					<td class="pass"><?php echo __('Rewrite Success'); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Rewrite test'); ?></th>
					<td class="caution"><?php echo __('Rewrite faild'); ?></td>
			</tr>

			<tr>
				<th><?php echo __('Application index'); ?></th>
					<td class="pass"><?php echo __( 'Empty Application index' ); ?></td>
			</tr>
			<tr>
				<th><?php echo __('Application index'); ?></th>
					<td class="caution">
						<?php echo __( 'Specified Application index', array( '<< Application Key >>' ) ); ?>
					</td>
			</tr>

		</table>

			<h3><?php echo __('Suggestion'); ?></h3>

			<p><?php echo __('Suggestions for beginers'); ?></p>

			<table>

				<tr>
					<th><?php echo __('Session driver'); ?></th>
						<td class="caution"><?php echo __( 'Cookie driver' ); ?></td>

				</tr>
				<tr>
					<th><?php echo __('Session driver'); ?></th>
						<td class="pass">
							<?php echo __( 'No Cookie driver', array( '<< Session Driver >>' ) ); ?>
						</td>

				</tr>

		</table>

	</body>
</html>