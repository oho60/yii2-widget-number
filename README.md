
	

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
 echo \oho\number\Number::widget(['type'=>'thaiBaht','number'=>'123'])	=หนึ่งร้อยยี่สิบสามบาทถ้วน
 echo \oho\number\Number::widget(['type'=>'thaiBaht','number'=>'1897220.89'])	=หนึ่งล้านแปดแสนเก้าหมื่นเจ็ดพันสองร้อยยี่สิบบาทแปดสิบเก้าสตางค์
 echo \oho\number\Number::widget(['type'=>'thaiBaht','number'=>'189722000.20'])=หนึ่งร้อยแปดสิบเก้าล้านเจ็ดแสนสองหมื่นสองพันบาทยี่สิบสตางค์
```
