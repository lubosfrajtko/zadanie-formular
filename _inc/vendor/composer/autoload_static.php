<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98aa6fedc0348d14d0ae3a1f03a05600
{
    public static $files = array (
        '6157b075b923803e5ef157aeb43b83bd' => __DIR__ . '/..' . '/tamtamchik/simple-flash/src/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tamtamchik\\SimpleFlash\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tamtamchik\\SimpleFlash\\' => 
        array (
            0 => __DIR__ . '/..' . '/tamtamchik/simple-flash/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit98aa6fedc0348d14d0ae3a1f03a05600::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98aa6fedc0348d14d0ae3a1f03a05600::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit98aa6fedc0348d14d0ae3a1f03a05600::$classMap;

        }, null, ClassLoader::class);
    }
}