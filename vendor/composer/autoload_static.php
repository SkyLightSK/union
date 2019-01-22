<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60a9ed5ea8b0cbb7d483be2cc2a3f8e2
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Union\\Tests\\' => 12,
            'Union\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Union\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Union\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Union',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60a9ed5ea8b0cbb7d483be2cc2a3f8e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60a9ed5ea8b0cbb7d483be2cc2a3f8e2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
