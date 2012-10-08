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
	'PHP Version' => 'PHPバージョン',
	'Web server' => 'Webサーバー',
	'Web server caution' => '現在Webサーバーは:arg1です。<br>LaravelはApache互換のWebサーバー上で動作します。このチェッカーでは使用中のWebサーバーがApache互換であるかどうか判断付きません。Apacheとの互換性はご自身で確認ください。<br>互換性がなくても動作する可能性はあります。',
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
	'No Application key set' => 'アプリケーションキーが設定されていません。<br><code>application/config/application.php</code>のkeyを設定します。ランダムな英数字でだいたい３２文字に設定します。<br>空文字ではセキュリティに関わる部分でエラーが発生します。デフォルトのまま変えなくても動作はしますが、セキュリティリスクになります。',

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
	'Storage' => 'storageディレクトリー',
	'Cache directory' => 'cacheディレクトリー',
	'Cache directory not exist' => '<code>:arg1</code>ディレクトリーが存在しません。<br>このディレクトリーはCacheクラスにより使用されます。<br>storageディレクトリー下に作成してください。',
	'Cache directory no writable' => '<code>:arg1</code>ディレクトリがー書き込み可能でありません。<br>このディレクトリーはCacheクラスにより使用されます。<br>Linux/unixではほとんどの場合、‘その他’のユーザーに対する書き込みパーミッションが設定されていないことが原因です。ときには、ディレクトリーの所有者がrootなど、別のユーザに設定されていることも考えられます。<br>WindowsにおいてはACLの設定を確認してください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などで、起こり得ます。',
	'Cache directory writable' => '書き込み可能：<code>:arg1</code>',
	'Database directory' => 'databaseディレクトリー',
	'Database directory not exist' => '<code>:arg1</code>ディレクトリーが存在しません。<br>このディレクトリーはデータベースのドライバーにSQLiteを使用した場合に必要となります。<br>storageディレクトリー下に作成してください。',
	'Database directory no writable' => '<code>:arg1</code>ディレクトリーが書き込み可能でありません。<br>このディレクトリーはデータベースのドライバーにSQLiteを使用した場合に必要となります。<br>Linux/unixではほとんどの場合、‘その他’のユーザーに対する書き込みパーミッションが設定されていないことが原因です。ときには、ディレクトリーの所有者がrootなど、別のユーザに設定されていることも考えられます。<br>WindowsにおいてはACLの設定を確認してください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などで、起こり得ます。',
	'Database directory writable' => '書き込み可能：<code>:arg1</code>',
	'Logs directory' => 'logsディレクトリー',
	'Logs directory not exist' => '<code>:arg1</code>ディレクトリーが存在しません。<br>このディレクトリーにはLaravelにより出力されるログが保存されます。<br>storageディレクトリー下に作成してください。',
	'Logs directory no writable' => '<code>:arg1</code>ディレクトリーが書き込み可能でありません。<br>このディレクトリーにはLaravelにより出力されるログが保存されます。<br>Linux/unixではほとんどの場合、‘その他’のユーザーに対する書き込みパーミッションが設定されていないことが原因です。ときには、ディレクトリーの所有者がrootなど、別のユーザに設定されていることも考えられます。<br>WindowsにおいてはACLの設定を確認してください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などで、起こり得ます。',
	'Logs directory writable' => '書き込み可能：<code>:arg1</code>',
	'Sessions directory' => 'sessionsディレクトリー',
	'Sessions directory not exist' => '<code>:arg1</code>ディレクトリーが存在しません。<br>名前が示す通り、セッションをファイルとして保存する場合に使用します。<br>storageディレクトリー下に作成してください。',
	'Sessions directory no writable' => '<code>:arg1</code>ディレクトリーが書き込み可能でありません。<br>名前が示す通り、セッションをファイルとして保存する場合に使用します。<br>Linux/unixではほとんどの場合、‘その他’のユーザーに対する書き込みパーミッションが設定されていないことが原因です。ときには、ディレクトリーの所有者がrootなど、別のユーザに設定されていることも考えられます。<br>WindowsにおいてはACLの設定を確認してください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などで、起こり得ます。',
	'Sessions directory writable' => '書き込み可能：<code>:arg1</code>',
	'Work directory' => 'workディレクトリー',
	'Work directory not exist' => '<code>:arg1</code>ディレクトリーが存在しません。<br>バンドル操作で使用されるディレクトリーです。<br>storageディレクトリー下に作成してください。',
	'Work directory no writable' => '<code>:arg1</code>ディレクトリーが書き込み可能でありません。<br>バンドル操作で使用されるディレクトリーです。<br>Linux/unixではほとんどの場合、‘その他’のユーザーに対する書き込みパーミッションが設定されていないことが原因です。ときには、ディレクトリーの所有者がrootなど、別のユーザに設定されていることも考えられます。<br>WindowsにおいてはACLの設定を確認してください。Webサーバーのユーザーへアクセスを許していないディレクトリーにXAMMPやWAMPをインストールした場合などで、起こり得ます。',
	'Work directory writable' => '書き込み可能：<code>:arg1</code>',

	// PHP Modules
	'PHP Modules' => 'PHPモジュール',
	'Multibyte String extension' => 'マルチバイト文字列拡張',
	'Multibyte String loaded' => 'マルチバイト文字列拡張ロード済み<br>ロードされていても設定がされていないと正しく動作しません。正しく動作しない場合は、PHPの設定を確認してください。<br>この拡張はマルチバイト関数の使用時に必要ですが、LaravelのStrクラスでも使用されています。いくつかのメソッドでUTF-8を使用するために使用されます。',
	'No Multibyte String' => 'マルチバイト文字列拡張はロードされていません。<br>この拡張はマルチバイト関数の使用時に必要ですが、LaravelのStrクラスでも使用されています。いくつかのメソッドでUTF-8を使用するために使用されます。',
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
	'Suggestion' => '提案',
	'Suggestions for beginers' => 'これらの項目は、特に初心者のかたがはまりやすいポイントを事前に指摘するために用意されています。',
	'Cookie driver' => 'クッキーがセッションのドライバーとして設定されています<br>Laravelではフォームの入力項目や表示メッセージをセッションを通じてやり取りするのが、標準的です。セッションは最大4Kバイトと決まっており、そのためセッションの保存量が、このサイズを越してエラーになることがあります。初心者のかたには、このエラーが発生した場合、原因の特定が難しいようです。そのため、初めからドライバーをfileなどに変更しておくことをおすすめします。<br>セッションのドライバーを変更するには、<code>application/config/session.php</code>を変更してください。',
	'No Cookie driver' => '使用セッションドライバー：<code>:arg1</code>',
);