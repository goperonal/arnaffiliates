<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfca270c4217c5b4b44a66373e8154e21
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nilambar\\AdminNotice\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nilambar\\AdminNotice\\' => 
        array (
            0 => __DIR__ . '/..' . '/ernilambar/wp-admin-notice/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Nilambar\\AdminNotice\\Notice' => __DIR__ . '/..' . '/ernilambar/wp-admin-notice/src/Notice.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfca270c4217c5b4b44a66373e8154e21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfca270c4217c5b4b44a66373e8154e21::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfca270c4217c5b4b44a66373e8154e21::$classMap;

        }, null, ClassLoader::class);
    }
}
