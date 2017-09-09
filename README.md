```
@common
 'components' => [
	'Number'=>[
    	'class'=>'common\widgets\Booster',
    ],
	}

```	
	

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist oho60/yii2-widget-number "*"
```

or add

```
"oho60/yii2-widget-number": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php echo Yii::$app->Number->bahtThai(number_format(1234, 2, '.', ''));?>```
