<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ff72a43e08247e8721fc63b0fa5897f
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ff72a43e08247e8721fc63b0fa5897f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ff72a43e08247e8721fc63b0fa5897f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1ff72a43e08247e8721fc63b0fa5897f::$classMap;

        }, null, ClassLoader::class);
    }
}
