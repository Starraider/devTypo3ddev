<?php

use PHPUnit\Framework\TestCase;

class SingleTest extends TestCase {
  public function testMulitplication() {
    $a = 5;
    $b = 5;
    $c = $a*$b;
    $this->assertEquals($c,25);
  }
}