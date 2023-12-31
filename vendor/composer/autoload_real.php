<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite76eb6b9cd6db169a00aa88cfb737bb5
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInite76eb6b9cd6db169a00aa88cfb737bb5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite76eb6b9cd6db169a00aa88cfb737bb5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite76eb6b9cd6db169a00aa88cfb737bb5::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
