<?php 

    class Connection{

        private $oMySqli; 
        
        public function doConnectDatabase()
        {
            /* Attempt MySQL server connection. Assuming you are running MySQL
            server with default setting (user 'root' with no password) */
            $this->oMySqli = new mysqli("localhost", "root", "", "test");
            
            // Check connection
            if($this->oMySqli === false){
                die("ERROR: Could not connect. " . $this->oMySqli->connect_error);
            }
        }

        public function insert($sTable, $aData)
        {
            $sFields = implode(", ", array_keys($aData));
            $sSql =  'INSERT INTO ' . $sTable . ' (' . $sFields . ') VALUES (';
            foreach($aData as $sField) {
                $sSql .= '"' . $sField . '",';
            }

            $sQuery = substr($sSql, 0, -1) . ')';
            return ($this->oMySqli->query($sQuery) === true ? true: false);
        }

        public function read($sTable, $sParam) {
            $sQuery = 'SELECT * FROM ' . $sTable . ' WHERE Employee = "' . $sParam . '"';

            $oResult = $this->oMySqli->query($sQuery);
            return $oResult->num_rows;
        }

        public function readAll($sTable) {
            $sQuery = 'SELECT * FROM ' . $sTable;

            $aData = array();
            $oResult = $this->oMySqli->query($sQuery);
            while($aRow = $oResult->fetch_assoc()) {
                array_push($aData, $aRow);
            }
            return $aData;
        }


        public function update($sTable, $sSet, $sParam) {
            $sQuery = 'UPDATE ' . $sTable . ' SET Wage = "' . $sSet . '" WHERE Employee = "' . $sParam . '"';
            return ($this->oMySqli->query($sQuery) === true ? true: false);
        }
    }
?>