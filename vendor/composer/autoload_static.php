<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit016fdeb8142ac8150483f6efa30509a3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit016fdeb8142ac8150483f6efa30509a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit016fdeb8142ac8150483f6efa30509a3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}