<?php

class OpsWay_CheckoutTiming_Model_Logging extends Mage_Core_Model_Abstract
{

    private $_defaultTiming;

    public function __construct()
    {
        // ToDo: extension config
        $model = 'OpsWay_CheckoutTiming_Model_Logging_MageLog';
        $this->logger = Mage::getModel($model);
    }


    public function prepareTiming($events)
    {
        foreach ($events AS $key => $event) {
            $this->_defaultTiming[$key] = array(
                'event' => $event,
                'time' => 0
            );
        }
    }


    public function log(Array $timing)
    {
        $clearTiming = $this->_defaultTiming;
        array_walk($clearTiming, function (&$item, $key, $timing) {
            if (array_key_exists($key, $timing)) {
                $item = $timing[$key];
            }
        }, $timing);
        $this->logger->log($clearTiming);
    }

}