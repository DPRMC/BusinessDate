<?php

use PHPUnit\Framework\TestCase;

class BusinessDateTest extends TestCase {

    /**
     * @test
     */
    public function testIsBusinessDate() {
        $aBusinessDay = '2019-08-20';
        $isBusinessDay = \DPRMC\BusinessDate\BusinessDate::isBusinessDay($aBusinessDay);
        $this->assertTrue($isBusinessDay);
    }

    /**
     * @test
     */
    public function testIsNotBusinessDay(){
        $notBusinessDay = '2019-08-18';
        $isBusinessDay = \DPRMC\BusinessDate\BusinessDate::isBusinessDay($notBusinessDay);
        $this->assertFalse($isBusinessDay);
    }


}