<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedConditions;
use PHPUnit\Framework\TestCase;



class SeleniumTestCase extends TestCase {
  public $driver;
  static private $username = "YOUR_USERNAME";
  static private $authkey = "YOUR_AUTHKEY";
  static private $sessionId = NULL;

  public function testGoogle() {
    $this->driver = RemoteWebDriver::create("https://www.google.com/ncr");
    $element = $this->driver->findElement(WebDriverBy::name("q"));
    $element->sendKeys("BrowserStack");
    $element->submit();
    $this->assertEquals('BrowserStack - Google Search', self::$driver->getTitle());
  }
}