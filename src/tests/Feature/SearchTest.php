<?php

namespace Feature;


use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private const URL = 'http://yandex.kz';
    private const INPUT_NAME = 'text';

    private static $host;

    public static function setUpBeforeClass()
    {
        // https://github.com/SeleniumHQ/docker-selenium
        // https://hub.docker.com/u/selenium/
        // This would be the url of the host running the server-standalone.jar
        self::$host = 'http://' . getenv('HOST') . '/wd/hub'; // this is the default
    }

    public static function tearDownAfterClass()
    {

    }

    public function testSearchInChrome()
    {
        $chromeDriver = RemoteWebDriver::create(self::$host, DesiredCapabilities::chrome());
        $chromeDriver->get(self::URL);

        $element = $chromeDriver->findElement(WebDriverBy::name(self::INPUT_NAME));
        if($element) {
            $element->sendKeys("TestingBot");
            $element->submit();
        }

        $this->assertNotNull($chromeDriver->getTitle());

        $chromeDriver->quit();
    }

    public function testSearchInFirefox()
    {
        $firefoxDriver = RemoteWebDriver::create(self::$host, DesiredCapabilities::firefox());
        $firefoxDriver->get(self::URL);

        $element = $firefoxDriver->findElement(WebDriverBy::name(self::INPUT_NAME));
        if($element) {
            $element->sendKeys("TestingBot");
            $element->submit();
        }

        $this->assertNotNull($firefoxDriver->getTitle());

        $firefoxDriver->quit();
    }

}