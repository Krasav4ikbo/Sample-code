<?php
namespace src;

class Depth {
    /**
     * solution static method
     *
     * @param array $A
     * @return integer
     */
    public static function solution($A)
    {
        $n = count($A);

        if ( $n < 3 ) {
            return 0;
        }

        /* current left item */
        $left = $A[0];

        $max = 0;

        $temp_max = 0;

        $depth_value_temp = 0;

        for ( $i = 0; $i < $n - 1 ; $i++ ) {
            $difference = $A[$i] - $A[$i + 1];

            /* check current sign for difference between couple of adjacent items */
            if ( -1 === gmp_sign($difference) ) {

                if ($left >= $A[$i + 1]) {

                    $max = max($max, $A[$i + 1] - $depth_value_temp);

                    $temp_max -= abs($difference);

                } else {
                    $max = ( $temp_max > 0 ) ? max($max, $left - $depth_value_temp) : $max;

                    /*  end of left part of location
                        and start new location search */
                    $temp_max = 0;

                    $left = $A[$i + 1];
                }

            } else {

                $temp_max += $difference;

                $depth_value_temp = $A[$i + 1];

            }

        }

        return $max;
    }
}

