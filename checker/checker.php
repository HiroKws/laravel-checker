<?php
/**
 * Laravel Environment Checker
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
	//
	if ( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ) {
		// Get language codes
		$lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		// will be set $langs[language code] = priority
		$langs = array();

		foreach($lang as $key => $code_priority)
		{
			if(preg_match('/(.+);q=([0-9\.]+)/', $code_priority, $matched) === 1 )
			{
				$langs[$matched[1]] = $matched[2];
			} else {
				$langs[$code_priority] = '1'; // default value
			}
		}
		// Sort by priority
		arsort($langs);

		foreach ( $langs as $code => $priority ) {
			// read language file
			if ( is_file(LANG_DIR.$code.'.php') ) {
				$strings = include LANG_DIR.$code.'.php';
				$current_lang = $code;
				break;
			}
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

/*
 * Check this checker on Laravel file structure
 *
 * To be able to work without Laravel file structure.
 * Also user can change file paths to be more secure.
 * So, check file structre and user setting.
 */

// flag if work on Laravel file structure
$on_laravel = false;

if ( is_file('../index.php') ) {
	// Read index.php
	$index_php = file_get_contents('../index.php');

	// Find directory of paths.php
	if ( preg_match("/require[\t ]+'(.+)paths.php'/", $index_php, $matches) === 1 ) {
		// Include paths.php to get user's directories settings.
		include '../'.$matches[1].'paths.php';

		if ( function_exists('path') && function_exists('set_path') ) {
			$on_laravel = true;
		}
	}
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo __('Laravel Environment Checker'); ?></title>
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

		<?php if ( isset($_GET['show_code']) ) print_r($langs); ?>

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

		<?php $fatal_error = 0; ?>

		<table>

			<tr>
				<th><?php echo __('Web server'); ?></th>
				<?php
					$server = $_SERVER['SERVER_SOFTWARE'];
					$is_apache = stripos($server, 'Apache') === 0;
					$is_nginx = stripos($server, 'nginx') === 0;

					if ( $is_apache || $is_nginx ) :
				?>
					<td class="pass"><?php echo $server; ?></td>
				<?php else: $fatal_error += 1; ?>
					<td class="caution">
				<?php echo __('Web server caution', array( $server )); ?>
					</td>
				<?php endif ?>
			</tr>

			<tr>
				<th><?php echo __('PHP Version'); ?></th>
				<?php if ( version_compare(PHP_VERSION,
						'5.3.0', '>=') ) : ?>
					<td class="pass"><?php echo PHP_VERSION ?></td>
				<?php else: $fatal_error += 1; ?>
					<td class="fail">
						<?php echo __('Low PHP version',
							array( PHP_VERSION )); ?>
					</td>
				<?php endif ?>
			</tr>

			<tr>
				<th><?php echo __('Fileinfo extension'); ?></th>
				<?php if ( extension_loaded('fileinfo') ) : ?>
					<td class="pass"><?php echo __('Fileinfo loaded') ?></td>
					<?php else: $fatal_error += 1; ?>
					<td class="fail"><?php echo __('No Fileinfo'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('Mcrypt extension'); ?></th>
				<?php if ( extension_loaded('mcrypt') ) : ?>
					<td class="pass"><?php echo __('Mcrypt loaded'); ?></td>
				<?php else : $fatal_error +=1; ?>
					<td class="fail"><?php echo __('No Mcrypt'); ?></td>
				<?php endif; ?>
			</tr>

			<?php if ( $on_laravel ) : ?>

				<tr>
					<th><?php echo __('Application Key'); ?></th>
					<?php
						$key_set = false;
						$app_config = file_get_contents(path('app').'config/application.php');
						if ( preg_match("/'key'[\t ]*=>[\t ]*'(.+)'/", $app_config, $matches) === 1 ) {
							$key_set = true;
							if ( in_array($matches[1], array('', 'YourSecretKeyGoesHere') ) ) {
								$key_set = false;
							}
						}
						if ( $key_set) :
					?>
						<td class="pass"><?php echo __('Application key set'); ?></td>
					<?php else : $fatal_error +=1; ?>
						<td class="caution"><?php echo __('No Application key set'); ?></td>
					<?php endif; ?>

				</tr>

				<tr>
					<th><?php echo __('View cache'); ?></th>
					<?php
						$views_cache = path('storage').'views';
						if ( !is_dir($views_cache) ) : $fatal_error +=1;
					?>
						<td class="fail">
							<?php echo __('View cache not exist', array( $views_cache )); ?>
						</td>
					<?php elseif ( !is_writable($views_cache) ) : $fatal_error +=1; ?>
						<td class="fail">
							<?php echo __('View cache no writable',	array( $views_cache )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('View cache writable', array( $views_cache )); ?>
						</td>
					<?php endif; ?>
				</tr>

			<?php endif; ?>

		</table>

		<?php if ( $fatal_error > 0 ): ?>
			<p class="result fail">
				<?php echo __('No fullfilled all requirements', array( $fatal_error )); ?>
			</p>
		<?php else : ?>
			<p class="result pass"><?php echo __('Fulfilled Requirements'); ?></p>
		<?php endif; ?>

		<h2><?php echo __('Optional Tests'); ?></h2>

		<p><?php echo __('They are optional') ?></p>

		<?php if ($on_laravel) : ?>

			<h3><?php echo __('Storage') ?></h3>

			<table>

				<tr>
					<th><?php echo __('Cache directory'); ?></th>
					<?php
						$cache_dir = path('storage').'cache';
						if ( !is_dir($cache_dir) ) :
					?>
						<td class="caution">
							<?php echo __('Cache directory not exist', array( $cache_dir )); ?>
						</td>
					<?php elseif ( !is_writable($cache_dir) ) :  ?>
						<td class="caution">
							<?php echo __('Cache directory no writable', array( $cache_dir )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('Cache directory writable', array( $cache_dir )); ?>
						</td>
					<?php endif; ?>
				</tr>

				<tr>
					<th><?php echo __('Database directory'); ?></th>
					<?php
						$database_dir = path('storage').'database';
						if ( !is_dir($database_dir) ) :
					?>
						<td class="caution">
							<?php echo __('Database directory not exist', array( $database_dir )); ?>
						</td>
					<?php elseif ( !is_writable($database_dir) ) :  ?>
						<td class="caution">
							<?php echo __('Database directory no writable', array( $database_dir )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('Database directory writable', array( $database_dir )); ?>
						</td>
					<?php endif; ?>
				</tr>

				<tr>
					<th><?php echo __('Logs directory'); ?></th>
					<?php
						$logs_dir = path('storage').'logs';
						if ( !is_dir($logs_dir) ) :
					?>
						<td class="caution">
							<?php echo __('Logs directory not exist', array( $logs_dir )); ?>
						</td>
					<?php elseif ( !is_writable($logs_dir) ) :  ?>
						<td class="caution">
							<?php echo __('Logs directory no writable', array( $logs_dir )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('Logs directory writable', array( $logs_dir )); ?>
						</td>
					<?php endif; ?>
				</tr>

				<tr>
					<th><?php echo __('Sessions directory'); ?></th>
					<?php
						$sessions_dir = path('storage').'sessions';
						if ( !is_dir($sessions_dir) ) :
					?>
						<td class="caution">
							<?php echo __('Sessions directory not exist', array( $sessions_dir )); ?>
						</td>
					<?php elseif ( !is_writable($sessions_dir) ) :  ?>
						<td class="caution">
							<?php echo __('Sessions directory no writable', array( $sessions_dir )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('Sessions directory writable', array( $sessions_dir )); ?>
						</td>
					<?php endif; ?>
				</tr>

				<tr>
					<th><?php echo __('Work directory'); ?></th>
					<?php
						$work_dir = path('storage').'work';
						if ( !is_dir($work_dir) ) :
					?>
						<td class="caution">
							<?php echo __('Work directory not exist', array( $work_dir )); ?>
						</td>
					<?php elseif ( !is_writable($work_dir) ) :  ?>
						<td class="caution">
							<?php echo __('Work directory no writable', array( $work_dir )); ?>
						</td>
					<?php else : ?>
						<td class="pass">
							<?php echo __('Work directory writable', array( $work_dir )); ?>
						</td>
					<?php endif; ?>
				</tr>

			</table>

		<?php endif; ?>

		<h3><?php echo __('PHP Modules'); ?></h3>

		<table>

			<tr>
				<th><?php echo __('Multibyte String extension'); ?></th>
				<?php if ( extension_loaded('mbstring') ) : ?>
					<td class="pass"><?php echo __('Multibyte String loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No Multibyte String'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('Memcached extension'); ?></th>
				<?php if ( extension_loaded('memcache') ) : ?>
					<td class="pass"><?php echo __('Memcached loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No Memcached'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('APC extension'); ?></th>
				<?php if ( extension_loaded('apc') ) : ?>
					<td class="pass"><?php echo __('APC loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No APC'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('PDO extension'); ?></th>
				<?php if ( extension_loaded('pdo') ) : ?>
					<td class="pass"><?php echo __('PDO loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No PDO'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('SQLite extension'); ?></th>
				<?php if ( extension_loaded('sqlite') ) : ?>
					<td class="pass"><?php echo __('SQLite loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No SQLite'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('MySQL extension'); ?></th>
				<?php if ( extension_loaded('mysql') ) : ?>
					<td class="pass"><?php echo __('MySQL loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No MySQL'); ?></td>
				<?php endif; ?>
			</tr>

			<tr>
				<th><?php echo __('PostgreSQL extension'); ?></th>
				<?php if ( extension_loaded('pgsql') ) : ?>
					<td class="pass"><?php echo __('PostgreSQL loaded'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('No PostgreSQL'); ?></td>
				<?php endif; ?>
			</tr>

		</table>

		<h3><?php echo __('Mod Rewrite'); ?></h3>

		<table>

			<?php if( function_exists('apache_get_modules')) : ?>
				<tr>
					<th><?php echo __('Rewrite module'); ?></th>
					<?php
						$modules = apache_get_modules();
						if( in_array('mod_rewrite', $modules) ) :
					?>
						<td class="pass"><?php echo __('Rewrite module loaded'); ?></td>
					<?php else :  ?>
						<td class="caution"><?php echo __('No Rewrite module'); ?></td>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

			<tr>
				<th><?php echo __('Rewrite test'); ?></th>
				<?php if( isset($_GET['rewrite']) && $_GET['rewrite'] == 'on') : ?>
					<td class="pass"><?php echo __('Rewrite Success'); ?></td>
				<?php else :  ?>
					<td class="caution"><?php echo __('Rewrite faild'); ?></td>
				<?php endif; ?>
			</tr>

			<?php if( $on_laravel ) : ?>
				<tr>
					<th><?php echo __('Application index'); ?></th>
					<?php
						$app_index = '';
						$app_config = file_get_contents(path('app').'config/application.php');
						if ( preg_match("/'index'[\t ]*=>[\t ]*'(.+)'/",
								$app_config, $matches) === 1 ) {
							$app_index = $matches[1];
						}
						if ( $app_index == '' ) :
					?>
						<td class="pass"><?php echo __( 'Empty Application index' ); ?></td>
					<?php else : ?>
						<td class="caution">
							<?php echo __( 'Specified Application index', array( $app_index ) ); ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endif; ?>

		</table>

		<?php if( $on_laravel ) : ?>

			<h3><?php echo __('Suggestion'); ?></h3>

			<p><?php echo __('Suggestions for beginers'); ?></p>

			<table>

				<tr>
					<th><?php echo __('Session driver'); ?></th>
					<?php
						$session_driver = '';
						$app_config = file_get_contents(path('app').'config/session.php');
						if ( preg_match("/'driver'[\t ]*=>[\t ]*'(.+)'/", $app_config, $matches) === 1 ) {
							$session_driver = $matches[1];
						}
						if ( $session_driver == "cookie" ) :
					?>
						<td class="caution"><?php echo __( 'Cookie driver' ); ?></td>
					<?php else : ?>
						<td class="pass">
							<?php echo __( 'No Cookie driver', array( $session_driver ) ); ?>
						</td>
					<?php endif; ?>

				</tr>

			<?php endif; ?>

		</table>

	</body>
</html>