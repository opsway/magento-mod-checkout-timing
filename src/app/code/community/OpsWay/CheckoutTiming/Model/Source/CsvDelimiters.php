<?php

class OpsWay_CheckoutTiming_Model_Source_CsvDelimiters
{

    public static $delimiters = array(
        array(
            'value' => ';',
            'label' => 'Semicolon (;)'
        ),
        array(
            'value' => ',',
            'label' => 'Comma (,)'
        ),
        array(
            'value' => "\t",
            'label' => 'Tab (\t)'
        )
    );


    public function toOptionArray()
    {
        return self::$delimiters;
    }

}