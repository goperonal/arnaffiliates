<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita43e4ccc9a5caaf86cf81892bb1731cb
{
    public static $files = array (
        '9fef4034ed73e26a337d9856ea126f7f' => __DIR__ . '/..' . '/codeinwp/themeisle-sdk/load.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita43e4ccc9a5caaf86cf81892bb1731cb::$classMap;

        }, null, ClassLoader::class);
    }
}
