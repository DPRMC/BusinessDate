<?php

use PHPUnit\Framework\TestCase;


/**
 * To run tests call:
 * php ./vendor/phpunit/phpunit/phpunit --group=first
 * Class BusinessDateTest
 */
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


    /**
     * @test
     * @group first
     */
    public function testIsFirstBusinessDay(){
        $arbitraryDateInMonth = '2021-05-15';
        $expectedDate = '2021-05-03';
        $firstBusinessDayOfMonth = \DPRMC\BusinessDate\BusinessDate::getFirstBusinessDayOfTheMonth($arbitraryDateInMonth);
        $this->assertEquals($expectedDate, $firstBusinessDayOfMonth);
    }


}