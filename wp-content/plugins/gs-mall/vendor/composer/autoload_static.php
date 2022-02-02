<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dc7ad7c6030860b655c322fc683a89e
{
    public static $files = array (
        '49a1299791c25c6fd83542c6fedacddd' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/load-v4p11.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yukdiorder\\Gsmall\\' => 18,
        ),
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yukdiorder\\Gsmall\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dc7ad7c6030860b655c322fc683a89e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dc7ad7c6030860b655c322fc683a89e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4dc7ad7c6030860b655c322fc683a89e::$classMap;

        }, null, ClassLoader::class);
    }
}
