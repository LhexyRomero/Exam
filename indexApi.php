<?php

include './connection.php';

class IndexApi extends Connection
{
    private $oDb;

    private $oPost;

    public function __construct()
    {
        $this->oPost = $_POST;
        $this->oDb = $this->doConnectDatabase();
    }
    
    public function init()
    {
        switch ($this->oPost['sRequest']) {
            case 'insertTimeRecord':
                $this->insertTimeRecord($this->oPost['oParam']);
                break;
            case 'getTimeRecord':
                $this->getAllTimeRecord();
                break;
            case 'getDivisibleNumber':
                $this->getDivisibleNumber();
                break;
            default:
                break;
        }
    }

    public function insertTimeRecord(array $aData)
    {
        
        $iResult = $this->getTimeRecord($aData);
        $sPeriodWage = 250000/12;
        $fWage = $sPeriodWage;
        if ($iResult === 0) {
            $iInitialWage = round($fWage, 2);
            $aParam = array(
                'Employee'          => $aData['sEmployee'],
                'HROrganization'    => $aData['sOrganization'],
                'Hours'             => $aData['sHours'],
                'Wage'              => $iInitialWage
            );
            
            $oSql = $this->insert('emp_time_record_t', $aParam);
            echo json_encode($oSql);
            return;
        } 
        
        $iCtr = $iResult + 1;
        $fTotalWage = round($fWage/$iCtr, 2);
        
        $aParam = array(
            'Employee'          => $aData['sEmployee'],
            'HROrganization'    => $aData['sOrganization'],
            'Hours'             => $aData['sHours'],
            'Wage'              => $fTotalWage
        );
        $oInsertSql = $this->insert('emp_time_record_t', $aParam);
        $oUpdateSql = $this->update('emp_time_record_t', $fTotalWage, $aData['sEmployee']);
        echo json_encode($oUpdateSql);
    }

    public function getTimeRecord(array $aData)
    {
        return $this->read('emp_time_record_t',$aData['sEmployee']);
    }

    public function getAllTimeRecord()
    {
        $oResult = $this->readAll('emp_time_record_t');
        echo json_encode($oResult);
    }

    public function getDivisibleNumber()
    {
        $aDivisibleNo = array();
        for ($iCtr = 1; $iCtr <= 10000; $iCtr++) {
            if ($iCtr % 3 === 0 && $iCtr % 5 === 0) {
                array_push($aDivisibleNo, $iCtr);
            }
        }

        $aResult = array(
            'sDivisibleNumbers' => $aDivisibleNo,
            'iTotal' => array_sum($aDivisibleNo),
            'iNoOfDivisible' => count($aDivisibleNo)
        );
        echo json_encode($aResult);
    }
}

$oApi = new IndexApi();
$oApi->init();

?>