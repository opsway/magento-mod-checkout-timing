<?php

class OpsWay_CheckoutTiming_Model_Logging_MageLog extends Mage_Core_Model_Abstract
    implements OpsWay_CheckoutTiming_Model_LoggingInterface
{

    public function log(Array $timing)
    {
        $latestTime = 0;
        for ($i = 0; $i < count($timing); $i++) {
            $diff = $timing[$i]['time'] - $latestTime;
            if ($diff < 0 || $latestTime <= 0) {
                $diff = 0;
            }
            if ($timing[$i]['time'] > 0) {
                $latestTime = $timing[$i]['time'];
            }
            Mage::log("Step $i: " . $diff . 'sec [' . $timing[$i]['event'] . ']', null, 'checkout_timing.log');
        }
    }

}