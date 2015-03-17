<?php

/**
 * PHP Class to calculate which days are Kenyan public holidays for a given year.
 *
 * Anybody can use/extend this class to include other features e.g Muslim holidays.
 *
 * @author Derrick James, 17 March 2015
 * @link https://github.com/DerrickJames/holidays
 **/
class Holidays
{
    /**
    * Get holidays.
    *
    * @param string $year (4-digit year)
    * @return array $hols
    **/
    public function getHolidays($year) {

        $hols = Array();

        // New year:
        switch ( date("w", strtotime("$year-01-01 12:00:00")) ) {
            case 6:
                $hols[] = "$year-01-03";
                break;
            case 0:
                $hols[] = "$year-01-02";
                break;
            default:
                $hols[] = "$year-01-01";
        }

        // Good friday:
        $hols[] = date("Y-m-d", strtotime( "+".(easter_days($year) - 2)." days", strtotime("$year-03-21 12:00:00") ));

        // Easter Monday:
        $hols[] = date("Y-m-d", strtotime( "+".(easter_days($year) + 1)." days", strtotime("$year-03-21 12:00:00") ));

        // Labour Day
        switch( date("w", strtotime("$year-05-01 12:00:00")) ) {
            case 6:
                $hols[] = "$year-05-03";
                break;
            case 0:
                $hols[] = "$year-05-02";
            default:
                $hols[] = "$year-05-01";
        }

        // Madaraka Day
        switch( date("w", strtotime("$year-06-01 12:00:00")) ) {
            case 6:
                $hols[] = "$year-06-03";
                break;
            case 0:
                $hols[] = "$year-06-02";
                break;
            default:
                $hols[] = "$year-06-01";
        }

        // Mashujaa Day
        switch( date("w", strtotime("$year-10-20 12:00:00")) ) {
            case 6:
                $hols[] = "$year-10-22";
                break;
            case 0:
                $hols[] = "$year-10-21";
            default:
                $hols[] = "$year-10-20";
        }

        // Jamhuri Day
        switch( date("w", strtotime("$year-12-12 12:00:00")) ) {
            case 6:
                $hols[] = "$year-12-14";
                break;
            case 0:
                $hols[] = "$year-12-13";
                break;
            default:
                $hols[] = "$year-12-12"; 
        }

        // Christmas:
        switch ( date("w", strtotime("$year-12-25 12:00:00")) ) {
            case 5:
                $hols[] = "$year-12-25";
                $hols[] = "$year-12-28";
                break;
            case 6:
                $hols[] = "$year-12-27";
                break;
            case 0:
                $hols[] = "$year-12-26";
                $hols[] = "$year-12-27";
                break;
            default:
                $hols[] = "$year-12-25";
                $hols[] = "$year-12-26";
        }

        return $hols;
    }   
}