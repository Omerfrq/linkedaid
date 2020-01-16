<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcd34bbe58c610383af9f07699b6dbac6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcd34bbe58c610383af9f07699b6dbac6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcd34bbe58c610383af9f07699b6dbac6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}