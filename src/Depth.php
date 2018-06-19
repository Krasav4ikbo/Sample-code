<?php
namespace src;

class Depth
{
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

        $depth_value_temp = 0;

        for ( $i = 1; $i < $n; $i++ ) {

            $depth_value = 0;

            if ( $left <= $A[$i] ) {

                if ( $depth_value_temp != 0 ) {

                    $depth_value = min($left, $A[$i]) - $depth_value_temp;

                    $max = max($depth_value, $max);

                }

                $left = $A[$i];

                $depth_value_temp = 0;

            } else {

                if ( $depth_value_temp == 0 || $depth_value_temp > $A[$i] ) {

                    $depth_value_temp = $A[$i];

                } elseif ( $depth_value_temp < $A[$i] ) {

                    $depth_value = $A[$i] - $depth_value_temp;

                    $max = max($depth_value, $max);
                }
            }
        }

        return $max;
    }
}
