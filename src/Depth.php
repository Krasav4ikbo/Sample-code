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

        for ( $i = 0; $i < $n - 1 ; $i++ ) {
            $difference = $A[$i] - $A[$i + 1];

            /* check current sign for difference between couple of adjacent items */
            if ( -1 === gmp_sign($difference) ) {

                $max = max(min($temp_max, abs($difference)), $max);

                $left = $A[$i + 1];

            } else {

                $temp_max = max($temp_max, $left - $A[$i + 1]);

            }

        }

        return $max;
    }
}

