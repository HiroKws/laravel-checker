Laravel Environment Checker
===========================

This is an Environmet Checker for Laravel framework.

Laravel is easy to use/read/write. So it is good for PHP framework newbies.

But for green users, 'Framework' give an impression something complex and hard to install and use. So, environment checker will help to get over a this wall. And Environment checker will give feeling that 'Hey, this framework seems kind to me'. It is important if it not give real help. :P :D :D

When a beginner get a trouble at first step of using framework, very saldom users will ask in forum. Some users will check by their self. And most of them will just give up. So salvage them. It will help to increase Laravel users, and getting Laravel community up.

## Codes

Codes on Github: <https://github.com/HiroKws/laravel-checker>

## Usage

### Standalone

When you want to check environment before install Laravel.

1. Put checker directory into your document root directory.
2. Access to `checker/checker.php` from your Web browser.

### With Laravel

When you want to check envrionment for installed Laravel.

1. Put checker directory into Laravel's public folder.
2. Access to  `checker/checker.php` on the your Laravel document root from your Web browser.

## Need your help

I need your help for following area.

### Correct English

I'm not native English speaker. So please correct my English in

* This readme.rd !
* Comments in php files.(But don't touch keys if they are funny English. Maybe translators will also use them.)

### More tests

Please add more tests for begginer to avoid issues or give tips.

### Cool design

I'm not web designer. I used css in checker.php came from kohana's checker. So please make more 'Laravel-like' design. ( But please don't add any files. Just keep it in checker.php. Because I don't touch .htacess file to check ModRewrite is active. And right now just check on apache style URI rewrite. Maybe someone add code to check for other Web server. If just all put into one file, rewrite check will be simple. Simple means easy to make. It is important. And one more. Please don't smaller fonts. Asisan charactors are more complicated than European. So by smaller fonts, we feel hard to read. I don't want put font size changer for just checker. )

### More language files

To add your language, make language-code.php file, and put it into languages directory. That's all.

Refer en.php. ( If you understand Japanese, better to see ja.php. Maybe no one see it... :D ) But do not just translate it. Please more kind for beginners who use your language. It means you can add explanations more, link to good article in your langauge, and more. To bring more good information and tips for newbies, to be more creative.

Basically language-code is from browser setting. To see your code, put '&show_code' on tail of URL of this checker. Maybe first string in array, is your code that set in your browser.

To see language code by browser, also you can see 'langauge setting' of Firefox.

If your language code don't exist in browser, don't worry. Well known 'fr.php', 'de.php' style you can use. Or like 'zh-tr.php' or else. If no code on browser, this checker don't find it as default language when first accessed. But there is language selecotr, so the user can change to your language if want.

And to check your language file, please use message_checker.php. This script show all message.

## FAQ

Q: Why didn't you use Laravel? Your codes are dirty. It is good framewrok, so if you use it, your code became clean and nice, and easily read and bra bra bra...

A: ...well. I like noodles. I'm Japanese, so principal food is rice. But I also love the 'spaghetti' and 'Ramen'. As you see, maybe it affected my PHP code style. This is the main reason that my code is hard to read.

Also the shorter answer is this 'checker' will work before Laravel.
If Laravel already work surely, user don't use it. When an user use checker, it is not sure if Laravel work properly. So checker script can't use the framework. This is the second reason.