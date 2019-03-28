<?php

namespace MyApp\Tests;

use MyApp\Infrastructure\App;

class TestCase extends \PHPUnit\Framework\TestCase
{
    private static $app;
    private static $booted = false;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::boot();
    }

    private static function boot()
    {
        if (true === self::$booted) {
            return;
        }
        self::$app = require __DIR__ . '/../../bootstrap.php';
    }

    public function app(): App
    {
        return self::$app;
    }
}
