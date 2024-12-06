<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e490ed168db37afb32e8998ccf83da7
{
    public static $files = array (
        '401ac35c964db416ce04ce5b255fd17b' => __DIR__ . '/../..' . '/commons/utils.php',
    );

    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'models\\' => 7,
        ),
        'c' => 
        array (
            'controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e490ed168db37afb32e8998ccf83da7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e490ed168db37afb32e8998ccf83da7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}