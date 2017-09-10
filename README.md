
	

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist oho60/yii2-widget-number "dev-master"
```

or add

```
"oho60/yii2-widget-number": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php echo \oho60\number\Number::widget(['type'=>'thaiBaht','number'=>'123']);?>
ผลผลลัพธ์ หนึ่งร้อยยี่สิบสามบาทถ้วน
```
