<?php

class OpsWay_CheckoutTiming_Model_Logging_CsvLog extends Mage_Core_Model_Abstract
    implements OpsWay_CheckoutTiming_Model_LoggingInterface
{

    private $_csvHandle;
    private $_csvFilePath;
    private $_csvData = array();
    private $_csvDelimiter = ';';


    public function beforeLog()
    {
        $this->_csvFilePath = Mage::getStoreConfig('opsway_checkout_timing/csvlogger/path');
        $this->_csvDelimiter = Mage::getStoreConfig('opsway_checkout_timing/csvlogger/delimiter');
        $this->_csvHandle = fopen($this->_csvFilePath, 'a');
    }


    public function log($event, $time, $diff, $step)
    {
        if (empty($this->_csvFilePath)) return;
        $this->_csvData[$step] = number_format($diff, 2, '.', '');
    }


    public function afterLog()
    {
        fputcsv($this->_csvHandle, $this->_csvData, $this->_csvDelimiter);
        fclose($this->_csvHandle);
    }

}