<?php

namespace ZF\Apigility\Example;

use Composer\Script\Event;
use Composer\Script\PackageEvent;

class Installer
{
    /**
     * Install the "status" database into the project
     *
     * This should be added to the composer.json of the project requiring this
     * package.
     *
     * {
     *     "require": {
     *         "zfcampus/zf-api-first-rest-example": "dev-master"
     *     },
     *     "scripts": {
     *         "post-package-install": "ZF\\ApiFirstRestExample\\Installer::install",
     *         "post-create-project-cmd": "ZF\\ApiFirstRestExample\\Installer::install"
     *     }
     * }
     *
     * 
     * @param Event $event 
     * @return void
     */
    public static function install(Event $event)
    {
        $composer  = $event->getComposer();
        $eventName = $event->getName();

        if ($event instanceof PackageEvent) {
            $package  = $event->getOperation()->getPackage();
            if ($package != 'zfcampus/zf-api-first-example') {
                return;
            }
        } else {
            $package = $composer->getRepositoryManager()->findPackage(
                'zfcampus/zf-api-first-example'
            );
            if (null === $package) {
                return;
            }
        }

        $dataDir  = getcwd() . '/data/db';
        $dbTarget = $dataDir . '/status.db';
        if (file_exists($dbTarget)) {
            // If it's already present, do nothing
            return;
        }

        if (!is_dir($dataDir)) {
            mkdir($dataDir);
        }

        $installManager = $composer->getInstallationManager();
        $packageDir     = $installManager->getInstallPath($package);

        copy($packageDir . '/data/status.db', $dbTarget);
        chmod($dataDir . '/status.db', 0777);
    }
}
