<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdad4dde0ac88721c61d67be13b4c0dde
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\redactor\\' => 13,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\' => 4,
        ),
        'r' => 
        array (
            'rmrevin\\yii\\fontawesome\\' => 24,
        ),
        'm' => 
        array (
            'mdm\\admin\\' => 10,
        ),
        'k' => 
        array (
            'kartik\\datetime\\' => 16,
            'kartik\\base\\' => 12,
        ),
        'd' => 
        array (
            'dmstr\\' => 6,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\redactor\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiidoc/yii2-redactor',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'rmrevin\\yii\\fontawesome\\' => 
        array (
            0 => __DIR__ . '/..' . '/rmrevin/yii2-fontawesome',
        ),
        'mdm\\admin\\' => 
        array (
            0 => __DIR__ . '/..' . '/mdmsoft/yii2-admin',
        ),
        'kartik\\datetime\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-datetimepicker',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'dmstr\\' => 
        array (
            0 => __DIR__ . '/..' . '/dmstr/yii2-adminlte-asset',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'cebe\\gravatar\\' => 
            array (
                0 => __DIR__ . '/..' . '/cebe/yii2-gravatar',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdad4dde0ac88721c61d67be13b4c0dde::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdad4dde0ac88721c61d67be13b4c0dde::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitdad4dde0ac88721c61d67be13b4c0dde::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
