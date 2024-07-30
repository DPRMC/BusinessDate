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
        $aBusinessDay  = '2019-08-20';
        $isBusinessDay = \DPRMC\BusinessDate\BusinessDate::isBusinessDay( $aBusinessDay );
        $this->assertTrue( $isBusinessDay );
    }

    /**
     * @test
     */
    public function testIsNotBusinessDay() {
        $notBusinessDay = '2019-08-18';
        $isBusinessDay  = \DPRMC\BusinessDate\BusinessDate::isBusinessDay( $notBusinessDay );
        $this->assertFalse( $isBusinessDay );
    }


    /**
     * @test
     * @group first
     */
    public function testIsFirstBusinessDay() {
        $arbitraryDateInMonth    = '2021-05-15';
        $expectedDate            = '2021-05-03';
        $firstBusinessDayOfMonth = \DPRMC\BusinessDate\BusinessDate::getFirstBusinessDayOfTheMonth( $arbitraryDateInMonth );
        $this->assertEquals( $expectedDate, $firstBusinessDayOfMonth );
    }


    /**
     * @test
     * @group array
     */
    public function testGetBusinessDatesFromMonthShouldReturnArray() {
        $year  = 2024;
        $month = 7;

        $businessDates = \DPRMC\BusinessDate\BusinessDate::getBusinessDatesFromMonth( $year, $month );

        $this->assertIsArray( $businessDates );
        $this->assertCount( 23, $businessDates );
    }



    /**
     * @test
     * @group third
     */
    public function testGetNthBusinessDayOfMonthShouldReturnExpectedValue() {
        $dateInMonth      = '2024-07-15';
        $endOfMonthString = \Carbon\Carbon::parse( $dateInMonth )->endOfMonth()->toDateString();
        $this->assertEquals( '2024-07-31', $endOfMonthString );


        $expectedDate = '2024-07-29';
        $nthBusinessDayOfMonth = \DPRMC\BusinessDate\BusinessDate::getNthBusinessDayOfTheMonth( $endOfMonthString, -3 );
        $this->assertEquals( $expectedDate, $nthBusinessDayOfMonth );


        $expectedDate = '2024-07-02';
        $nthBusinessDayOfMonth = \DPRMC\BusinessDate\BusinessDate::getNthBusinessDayOfTheMonth( $endOfMonthString, 2 );
        $this->assertEquals( $expectedDate, $nthBusinessDayOfMonth );
    }



}