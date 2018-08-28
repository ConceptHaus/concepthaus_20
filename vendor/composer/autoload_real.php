<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInita64506a5829153f7179effada05c6a46
=======
class ComposerAutoloaderInit6913574474d0e6aecba17f4bdcd4230a
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInita64506a5829153f7179effada05c6a46', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInita64506a5829153f7179effada05c6a46', 'loadClassLoader'));
=======
        spl_autoload_register(array('ComposerAutoloaderInit6913574474d0e6aecba17f4bdcd4230a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit6913574474d0e6aecba17f4bdcd4230a', 'loadClassLoader'));
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

<<<<<<< HEAD
            call_user_func(\Composer\Autoload\ComposerStaticInita64506a5829153f7179effada05c6a46::getInitializer($loader));
=======
            call_user_func(\Composer\Autoload\ComposerStaticInit6913574474d0e6aecba17f4bdcd4230a::getInitializer($loader));
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->register(true);

        if ($useStaticLoader) {
<<<<<<< HEAD
            $includeFiles = Composer\Autoload\ComposerStaticInita64506a5829153f7179effada05c6a46::$files;
=======
            $includeFiles = Composer\Autoload\ComposerStaticInit6913574474d0e6aecba17f4bdcd4230a::$files;
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
<<<<<<< HEAD
            composerRequirea64506a5829153f7179effada05c6a46($fileIdentifier, $file);
=======
            composerRequire6913574474d0e6aecba17f4bdcd4230a($fileIdentifier, $file);
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec
        }

        return $loader;
    }
}

<<<<<<< HEAD
function composerRequirea64506a5829153f7179effada05c6a46($fileIdentifier, $file)
=======
function composerRequire6913574474d0e6aecba17f4bdcd4230a($fileIdentifier, $file)
>>>>>>> 973da8f4dc932cd987051c27efefcc92ed98f0ec
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}
