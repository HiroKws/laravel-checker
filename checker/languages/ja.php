<?php
/*
 * Laravel Environment checker Language file
 *
 * for Japanese(ja)
 *
 */

return array(
	/*
	 * Display name in language selector
	 */
	'display' => '日本語',

	/*
	 * Titile & description
	 */
	'Laravel Environment Checker' => 'Laravel 動作環境チェッカー',
	'Welcome to Laravel Environment Checker' => 'Laravelコミュニティーへようこそ。Laravelのインストールに詰まったら、以下のチェック項目の指示に従ってください。もし、何かわからないことがあったら、<a href="http://forums.laravel.com/">Laravelフォーラム</a>で尋ねることもできます。',

	/*
	 * Requirements
	 */

	'Requirements' => '必要動作要件',
	'Web server' => 'Webサーバー',
	'Web server caution' => '現在Webサーバーは:arg1です。<br>LaravelはApache互換のWebサーバー上で動作します。このチェッカーでは使用中のWebサーバーがApache互換であるかどうか判断付きません。Apacheとの互換性はご自身で確認ください。<br>互換性がなくても動作する可能性はあります。',
	'PHP Version' => 'PHPバージョン',
	'Low PHP version' => '現在のPHPバージョンは:arg1です。<br>Laravelを動作させるにはPHP 5.3.0以上が必要です。<br>PHPをバージョンアップしてください。<br>もし、PaaSや共有サーバーをご利用の場合は、管理者の方と相談してください。',

	// Fileinfo
	'Fileinfo extension' => 'Fileinfo拡張',
	'Fileinfo loaded' => 'Fileinfo PHP拡張ロード済み',
	'No Fileinfo' => 'Fileinfo PHP拡張ロードがロードされていません。<br>Windowsの場合、php.ini設定ファイルを編集し、Fileinfo拡張を有効にしてください。<br>Linux/unixの場合、通常はパッケージマネージャーから該当パッケージをインストールすることで有効になります。<br>もし、PaaSや共有サーバーで動作させる場合は、管理者の方と相談してください。<br>この拡張はLaravelに用意されているFileクラスやLaravelが使用しているSymfonyのクラスで使用されています。サイトで使用する機能によっては、ロードしなくても動作する可能性はあります。',

	// Mcrypt
	'Mcrypt extension' => 'Mcrypt拡張',
	'Mcrypt loaded' => 'Mcrypt PHP拡張ロード済み',
	'No Mcrypt' => 'Mcrypt PHP拡張ロードがロードされていません。<br>Windowsの場合、php.ini設定ファイルを編集し、Mcrypt拡張を有効にしてください。<br>Linux/unixの場合、通常はパッケージマネージャーから該当パッケージをインストールすることで有効になります。<br>もし、PaaSや共有サーバーで動作させる場合は、管理者の方と相談してください。<br>この拡張は無くとも、暗号化にかかわらないような簡単なサイトであれば動作するでしょう。しかし、直接Mcryptクラスを使用しなくても、認証やセッションを使用すれば間接的に使用することになり、ロードされていなければ動作エラーが発生します。',

	// Application key
	'Application Key' => 'アプリケーションキー',
	'Application key set' => 'アプリケーションキー設定済み',
	'No Application key set' => 'アプリケーションキーが設定されていません。<br><code>application/config/application.php</code>のkeyを設定します。ランダムな英数字でだいたい３２文字に設定します。<br>空文字ではセキュリティに関わる部分でエラーが発生します。デフォルトのまま変えなくても動作はしますが、セキュリティリスクに成り得ます。',

	// View cache
	'View cache' => 'ビューキャッシュ',
	'View cache not exist' => 'ディレクトリーが存在しません：<code>:arg1</code><br>storageディレクトリー下にviewsディレクトリーを作成してください。',
	'View cache no writable' => '書き込み許可がありません：<code>:arg1</code><br>ビューキャッシュに書き込み許可が設定されていません。<br>Linux/unixの場合、‘その他’のユーザーに対する書き込み許可が設定されていないことがほとんどです。もしくは意図せず所有者がrootなど他のユーザーに変わっている場合もあります。この場合は所有者を自分に設定したあとで、‘その他’へ書き込み許可を与えてください。<br>Windowsの場合、ACLをチェックしてください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などに、起こり得ます。',
	'View cache writable' => '書き込み可能：<code>:arg1</code>',

	// Result
	'No fullfilled all requirements' => '全ての動作要件を完全には満たしていません。<br>Laravelを完全に動作させるには、指示を参考に、あと:arg1つ確認／設定してください。',
	'Fulfilled Requirements' => 'おめでとうございます！<br>全ての要求を満たしています。Laravelでの開発を楽しんでください。',
	/*
	 * Optional Tests
	 */
	'Optional Tests' => 'オプション項目',
	'They are optional'=> 'これ以降の項目は、必要に応じて設定しなくてはならない項目をチェックしています。例えば、自分でキャッシュを使用しなければ、<code>storage/cache</code>ディレクトリーは必要ありませんが、使用するならば、書き込み可能で用意しなくてはなりません。',
	// Strage
	// PHP Modules
	// Mod Rewrite
	'Specified Application index' => '現在のApplication index: <code>:arg1</code><br>URIのリライトが動作する場合、<code>application/config/application.php</code>の<code>index</code>項目は、空文字列にしてください。この項目はリンクやアドレスの生成時にベースURLの後に付加されます。通常はindex.phpです。<br>リライトが動作しない場合は、index.phpのままにしてください。',
	// Suggestions
	'No Cookie driver' => '使用セッションドライバー：<code>:arg1</code>',
);