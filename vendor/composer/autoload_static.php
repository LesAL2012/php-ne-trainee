<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42d3ad914a0866be05060c384d8bc394
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'fw\\' => 3,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'fw\\' => 
        array (
            0 => __DIR__ . '/..' . '/fw',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42d3ad914a0866be05060c384d8bc394::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42d3ad914a0866be05060c384d8bc394::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}