<?php

namespace Feature;


use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class GoogleTest extends TestCase
{
    /**
     * @var RemoteWebDriver $driver
     */
    private static $driver;

    public static function setUpBeforeClass()
    {
        // https://github.com/SeleniumHQ/docker-selenium
        // This would be the url of the host running the server-standalone.jar
        $host = 'http://' . getenv('HOST') . '/wd/hub'; // this is the default
        self::$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        self::$driver->get("http://google.com");
    }

    public static function tearDownAfterClass()
    {
        self::$driver->quit();
    }


    public function testSearch()
    {
        $element = self::$driver->findElement(WebDriverBy::name("q"));
        if($element) {
            $element->sendKeys("TestingBot");
            $element->submit();
        }

        $this->assertNotNull(self::$driver->getTitle());
    }

}