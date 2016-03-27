Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


Новая архитектура.
- yii2 advanced trnv starter kit.
<<< frontend >>>
-  pjax. каждый блок перегружает себя, а после js перегружает нужные.
- то что иммет ссылку - pjax link, а что нет - pjax form с do[add].
- каждый блок только отображает на основе данных с контроллера.
- при переходе на новую страницу, подключются недостающие скрипты и инициализаторы(с head тоже),. в сесссии хранится список.
- перегружается ближайший pjax блок а не верхний(form так могли изначально).
<<< backend >>>
- модуль webpage.при запросе страницы он собирает её из бд или отображает уже сгенеренный php(для prod). каждая запись в бд имее свою webpage, она может наследоваться(base meta tag).
- модуль block. каждая webpage и меет свой bock, который состоит из таких же блоков. в components/widgets/разные типы блоков(Block123Widget). одна таблицы block и block_attributes(block,text,int,var) либо каждая ячейка=виджет, даже Yii::t. блоки тоже наслеждуются и могут переопределить/доболнить базовые га уровне ячейки, так как это новые экземпляры.рекурсивный поиск подблоков.
- любой текст через Yii::t(webpage_id, text_id). некий системный дефорлтный языка, который потом пеерводится на нужные. даже содержимое статей в переводах хонится, text_123 а не в своей таблице.
<<< storage >>>
ckeditor и ckfinder сохраняют сразу на prod по ftp.
<<< env >>>
- local - только у developer
- dev , тут верстальщики вият свои правки с git, autopull
- stage - наполнение контентом и тест php на prod
- prod - копия stage кода, а не сборка через git+composer
<<< db >>>
 -  на каждом env копия. конфиги через env. 
- получение уникального id через curl push api на prod, где создасться запись(удалится при релизе на лайв), before save logic модели
- все изменения в бд пишутся через logger в таблицу, DbTarget info execute. 
- при открытии frontend или backend бд обновляется ,запрашивая через апи у верхних env sql записи и исполнить. последний id обновления хранится в отдельно таблице. 
- при release нужно с админки отправить обновления с бд в следующую NEXT_ENV_API . вернувшися id записать как уже применившися, что бы повторно не подтягивать их.
<<< конфигуратор страниц >>>
- frontend с вомможность правки любого текста(conteneditable, wysiwyg ) или  настройки параметров блока в popup(свойства блоков).
- контекстное меню для выбора действия. 
- drop&down для создания конфигурации страницы. 
- панелька с возможными блоками.