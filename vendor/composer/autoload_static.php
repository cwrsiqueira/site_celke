<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite76eb6b9cd6db169a00aa88cfb737bb5
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sts\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/sts',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite76eb6b9cd6db169a00aa88cfb737bb5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite76eb6b9cd6db169a00aa88cfb737bb5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite76eb6b9cd6db169a00aa88cfb737bb5::$classMap;

        }, null, ClassLoader::class);
    }
}
