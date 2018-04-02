<?php
	class Exporter_Mssql_To_Mysql extends CI_Model{
		//private $mysql_link       = "";     // MySql соединение
        
		
		public function get_user_id($email)
		{
			$query = "SELECT `id`
							FROM `users`
							WHERE `email` = '" . $email . "'";
			$result = $this->db->query($query);
			
			$id = 0;
			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
					$id = $row->id;
				}
			}
			//while ($row = $result->fetch_object())
			//{
			//	$id = $row->id;
			//}
			return $id;
			
		}
		

        // Создает в БД новые таблицы, если их не было
        // Выходные данные: $result - 'OK' если не было ошибок, или текст ошибки, если она была
		public function create_tables()
		{
			$this->mysql_dbname = $this->db->database;
// ----------------------------------------------------------------------------
// 			Table Test.CASHES
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`CASHES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` VARCHAR(8) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fNEXTNUMIN` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fNEXTNUMOUT` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fNEXTMTBILLNUM` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fDEFAULT` TINYINT(1) NOT NULL,
					  `fECRCRN` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fECRIP` VARCHAR(15) CHARACTER SET 'utf8' NOT NULL,
					  `fECRPORT` CHAR(5) NOT NULL,
					  `fECRPASSWORD` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
					  `fECRDEPWITHVAT` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fECRDEPWITHOUTVAT` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fECRPRINTMODE` CHAR(1) NOT NULL,
					  INDEX `PK_CASHES` (`fCODE` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			
// ----------------------------------------------------------------------------
// 			Table Test.CURR
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`CURR` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCUR` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fUNITNAME` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
					  `fCENTNAME` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
					  INDEX `PK_CURR` (`fCUR` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			
// ----------------------------------------------------------------------------
// 			Table Test.DOCUMENTS
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`DOCUMENTS` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fISN` VARCHAR(64)   NOT NULL,
					  `fDATE` DATETIME NOT NULL,
					  `fORDERNUM` INT NOT NULL DEFAULT 0,
					  `fDOCTYPE` TINYINT UNSIGNED NOT NULL,
					  `fDOCSTATE` TINYINT UNSIGNED NOT NULL,
					  `fDOCNUM` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fCUR` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fSUMM` DECIMAL(19,4) NOT NULL,
					  `fSTORAGE` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fINFO` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fCOMMENT` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
					  `fBASEISN` VARCHAR(64)   NULL,
					  `fUSERID` SMALLINT NOT NULL,
					  `fPARTID` INT NOT NULL,
					  `fCRPARTID` INT NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fEMPLID` INT NOT NULL,
					  `fVATTYPE` CHAR(1) NOT NULL,
					  `fSPEC` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
					  `fEXPTYPE` CHAR(1) NOT NULL,
					  `fINVN` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fINVDATE` DATETIME NULL,
					  `fBODY` LONGTEXT CHARACTER SET 'utf8' NOT NULL,
					  `fCHANGEDATE` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
					  INDEX `I_DATE` (`fDATE` ASC),
					  INDEX `I_DOCNUM` (`fDOCNUM` ASC),
					  INDEX `I_ORDERNUM` (`fDATE` ASC, `fORDERNUM` ASC),
					  INDEX `I_PARTID` (`fPARTID` ASC),
					  INDEX `I_fBASEISN` (`fBASEISN` ASC),
					  INDEX `PK_DOCUMENTS` (`fISN` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.EMPLOYEES
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`EMPLOYEES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fEMPLID` INT NOT NULL,
					  `fEMPLCODE` VARCHAR(12) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fADDRESS` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPHONE` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPASSPORT` VARCHAR(25) CHARACTER SET 'utf8' NOT NULL,
					  `fISSALESCONSULTANT` TINYINT(1) NOT NULL,
					  INDEX `I_EMPLCODE` (`fEMPLCODE` ASC),
					  INDEX `PK_EMPLOYEES` (`fEMPLID` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
					  


// ----------------------------------------------------------------------------
// 			Table Test.MTGROUP
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`MTGROUP` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPATH` VARCHAR(48) CHARACTER SET 'utf8' NOT NULL,
					  `fPARENT` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  INDEX `I_MTGROUP1` (`fPATH` ASC),
					  INDEX `I_MTGROUP2` (`fPARENT` ASC),
					  INDEX `PK_MTGROUP` (`fCODE` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }




			
// ----------------------------------------------------------------------------
// 			Table Test.MTQNTUNITS
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`MTQNTUNITS` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fQNTUNIT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fCOEF` DECIMAL(19,4) NOT NULL,
					  `fBARCODE` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fIMAGE` LONGBLOB NULL,
					  INDEX `I_BARCODE` (`fBARCODE` ASC),
					  INDEX `PK_MTQNTUNITS` (`fMTID` ASC, `fQNTUNIT` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			

			
// ----------------------------------------------------------------------------
// 			Table Test.PARTNERS
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`PARTNERS` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fPARTID` INT NOT NULL,
					  `fPARTCODE` VARCHAR(8) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fFULLCAPTION` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
					  `fTYPE` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  `fSETTLACC` VARCHAR(22) CHARACTER SET 'utf8' NOT NULL,
					  `fTAXCODE` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fADDRESS` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fBUSINESSADDRESS` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPHONE` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fMANAGERPOST` VARCHAR(32) CHARACTER SET 'utf8' NOT NULL,
					  `fMANAGERFIO` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fCHIEFACCPOST` VARCHAR(32) CHARACTER SET 'utf8' NOT NULL,
					  `fCHIEFACCFIO` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPARTSTATEREGISTER` VARCHAR(32) CHARACTER SET 'utf8' NOT NULL,
					  `fPASSPORT` VARCHAR(32) CHARACTER SET 'utf8' NOT NULL,
					  `fMAINAIM` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fNEXTCONTRACT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fSUPPLIER` TINYINT(1) NOT NULL,
					  `fCUSTOMER` TINYINT(1) NOT NULL,
					  INDEX `I_PARTCODE` (`fPARTCODE` ASC),
					  INDEX `I_SETLLACC` (`fSETTLACC` ASC),
					  INDEX `PK_PARTNERS` (`fPARTID` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			
// ----------------------------------------------------------------------------
// 			Table Test.PARTTYPE
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`PARTTYPE` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fPATH` VARCHAR(48) CHARACTER SET 'utf8' NOT NULL,
					  `fPARENT` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  INDEX `I_PARTTYPE1` (`fPATH` ASC),
					  INDEX `I_PARTTYPE2` (`fPARENT` ASC),
					  INDEX `PK_PARTTYPE` (`fCODE` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			
// ----------------------------------------------------------------------------
// 			Table Test.PRICES
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`PRICES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fPRICETYPE` CHAR(2) CHARACTER SET 'utf8' NOT NULL,
					  `fUNIT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fDATE` DATETIME NOT NULL,
					  `fCUR` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fPRICE` DECIMAL(19,4) NOT NULL,
					  INDEX `I_PRICE` (`fPRICETYPE` ASC, `fMTID` ASC, `fUNIT` ASC, `fDATE` ASC),
					  INDEX `PK_PRICES` (`fMTID` ASC, `fPRICETYPE` ASC, `fUNIT` ASC, `fDATE` ASC),
					  CONSTRAINT `FK_PRICE_fCUR`
						FOREIGN KEY (`fCUR`)
						REFERENCES `" . $this->mysql_dbname . "`.`CURR` (`fCUR`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }
			
// ----------------------------------------------------------------------------
// 			Table Test.PRICETYPES
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`PRICETYPES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` CHAR(2) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fCUR` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fROUND` CHAR(4) CHARACTER SET 'utf8' NOT NULL,
					  `fVAT` TINYINT(1) NOT NULL,
					  INDEX `PK_PRICETYPES` (`fCODE` ASC),
					  CONSTRAINT `FK_PRICETYPES_fCUR`
						FOREIGN KEY (`fCUR`)
						REFERENCES `" . $this->mysql_dbname . "`.`CURR` (`fCUR`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.QNTUNIT
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`QNTUNIT` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fBRIEF` CHAR(6) CHARACTER SET 'utf8' NOT NULL,
					  `fFRACTION` TINYINT(1) NOT NULL,
					  `fUNITID` SMALLINT NOT NULL,
					  INDEX `PK_QNTUNIT` (`fCODE` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.STORAGE
// ----------------------------------------------------------------------------
			$query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`STORAGE` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fCODE` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fRESPONS` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fADDRESS` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fRETAIL` TINYINT(1) NOT NULL,
					  `fDEFAULT` TINYINT(1) NOT NULL,
					  INDEX `PK_STORAGE` (`fCODE` ASC))";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.MATERIALS
// ----------------------------------------------------------------------------
            $query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`MATERIALS` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fMTCODE` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
					  `fCAPTION` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
					  `fFULLCAPTION` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
					  `fTYPE` CHAR(1) NOT NULL,
					  `fGROUP` CHAR(5) CHARACTER SET 'utf8' NOT NULL,
					  `fUNIT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fALTUNIT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fEXPMETHOD` CHAR(1) NOT NULL,
					  `fSHOW` TINYINT(1) NOT NULL,
					  `fISWEIGHT` TINYINT(1) NOT NULL,
					  `fDESCR` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fCOUNTRY` CHAR(3) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPRODUCER` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPROPERTY1` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPROPERTY2` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fMINQTY` DECIMAL(19,4) NOT NULL,
					  `fEXTRA` DECIMAL(10,4) NOT NULL,
					  `fVAT` TINYINT(1) NOT NULL,
					  INDEX `I_MATERIALS1` (`fMTCODE` ASC),
					  INDEX `PK_MATERIALS` (`fMTID` ASC),
					  CONSTRAINT `FK_MATERIALS_fUNIT`
						FOREIGN KEY (`fUNIT`)
						REFERENCES `" . $this->mysql_dbname . "`.`QNTUNIT` (`fCODE`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION,
					  CONSTRAINT `FK_MATERIALS_fALTUNIT`
						FOREIGN KEY (`fALTUNIT`)
						REFERENCES `" . $this->mysql_dbname . "`.`QNTUNIT` (`fCODE`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION);";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.PARTIES
// ----------------------------------------------------------------------------
            $query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`PARTIES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fPARTYBASE` VARCHAR(64)   NULL,
					  `fPARTYROW` INT NOT NULL,
					  `fINCOMEDATE` DATETIME NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fPARTID` INT NOT NULL,
					  `fCONTRACT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fGLOBALPARTYBASE` VARCHAR(64)   NULL,
					  `fGLOBALPARTYROW` INT NOT NULL,
					  `fTRANS` INT NOT NULL,
					  `fEXPMETHOD` CHAR(1) NOT NULL,
					  `fUSEABLEDATE` DATETIME NULL,
					  `fCOUNTRY` CHAR(3) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPRODUCER` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPROPERTY1` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  `fPROPERTY2` CHAR(4) CHARACTER SET 'utf8' NOT NULL DEFAULT '',
					  INDEX `I_PARTIES1` (`fMTID` ASC, `fINCOMEDATE` ASC),
					  INDEX `PK_PARTIES` (`fPARTYBASE` ASC, `fPARTYROW` ASC),
					  CONSTRAINT `FK_PARTIES_fMTID`
						FOREIGN KEY (`fMTID`)
						REFERENCES `" . $this->mysql_dbname . "`.`MATERIALS` (`fMTID`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.MTHI
// ----------------------------------------------------------------------------
            $query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`MTHI` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fPARTYBASE` VARCHAR(64)   NULL,
					  `fPARTYROW` INT NOT NULL,
					  `fDATE` DATETIME NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fSTORAGE` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fQTY` DECIMAL(19,4) NOT NULL,
					  `fSUMM` DECIMAL(19,4) NOT NULL,
					  `fVATSUMM` DECIMAL(19,4) NOT NULL,
					  `fCURSUMM` DECIMAL(19,4) NOT NULL,
					  `fDBCR` TINYINT(1) NOT NULL,
					  `fBASE` VARCHAR(64)   NOT NULL,
					  `fROWID` INT NOT NULL,
					  `fTRANS` INT NOT NULL,
					  `fDOCTYPE` TINYINT UNSIGNED NOT NULL,
					  INDEX `I_MTHI1` (`fPARTYBASE` ASC, `fPARTYROW` ASC, `fDATE` ASC),
					  INDEX `I_MTHI2` (`fBASE` ASC, `fROWID` ASC),
					  INDEX `I_MTHI3` (`fSTORAGE` ASC, `fMTID` ASC, `fDATE` ASC),
					  INDEX `I_MTHI4` (`fMTID` ASC),
					  CONSTRAINT `FK_MTHI_fMTID`
						FOREIGN KEY (`fMTID`)
						REFERENCES `" . $this->mysql_dbname . "`.`MATERIALS` (`fMTID`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION,
					  CONSTRAINT `FK_MTHI_fSTORAGE`
						FOREIGN KEY (`fSTORAGE`)
						REFERENCES `" . $this->mysql_dbname . "`.`STORAGE` (`fCODE`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION,
					  CONSTRAINT `FK_MTHI_PARTY`
						FOREIGN KEY (`fPARTYBASE` , `fPARTYROW`)
						REFERENCES `" . $this->mysql_dbname . "`.`PARTIES` (`fPARTYBASE` , `fPARTYROW`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.MTINCOMELIST
// ----------------------------------------------------------------------------
            $query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`MTINCOMELIST` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fISN` VARCHAR(64)   NOT NULL,
					  `fROWNUM` SMALLINT NOT NULL,
					  `fMTID` INT NOT NULL,
					  `fUNIT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fQUANTITY` DECIMAL(19,4) NOT NULL,
					  `fPRICE` DECIMAL(19,4) NOT NULL,
					  `fSUMMA` DECIMAL(19,4) NOT NULL,
					  `fEXTRAPERCENT` DECIMAL(10,4) NOT NULL,
					  `fSALEPRICE` DECIMAL(19,4) NOT NULL,
					  `fSALESUMMA` DECIMAL(19,4) NOT NULL,
					  `fVAT` TINYINT(1) NOT NULL,
					  `fUSELIFE` DATETIME NULL,
					  `fCOUNTRY` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fPRODUCER` CHAR(4) CHARACTER SET 'utf8' NOT NULL,
					  `fPROPERTY1` CHAR(4) CHARACTER SET 'utf8' NOT NULL,
					  `fPROPERTY2` CHAR(4) CHARACTER SET 'utf8' NOT NULL,
					  `fROWID` INT NOT NULL,
					  INDEX `PK_MTINCOMELIST` (`fISN` ASC, `fROWID` ASC),
					  CONSTRAINT `FK_MTINCOMELIST_fMTID`
						FOREIGN KEY (`fMTID`)
						REFERENCES `" . $this->mysql_dbname . "`.`MATERIALS` (`fMTID`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION,
					  CONSTRAINT `FK_MTINCOMELIST_fUNIT`
						FOREIGN KEY (`fUNIT`)
						REFERENCES `" . $this->mysql_dbname . "`.`QNTUNIT` (`fCODE`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

// ----------------------------------------------------------------------------
// 			Table Test.SALES
// ----------------------------------------------------------------------------
            $query = "CREATE TABLE IF NOT EXISTS `" . $this->mysql_dbname . "`.`SALES` (
					  `SITEUSER_ID` INT NOT NULL,
					  `EXP_PROG_ID` INT NOT NULL,
					  `fPARTYBASE` VARCHAR(64)   NULL,
					  `fPARTYROW` INT NOT NULL,
					  `fDATE` DATETIME NOT NULL,
					  `fITEMTYPE` CHAR(1) NOT NULL,
					  `fITEMID` INT NOT NULL,
					  `fSTORAGE` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fQTY` DECIMAL(19,4) NOT NULL,
					  `fCOSTSUMM` DECIMAL(19,4) NOT NULL,
					  `fCOSTCURSUMM` DECIMAL(19,4) NOT NULL,
					  `fCOSTVATSUMM` DECIMAL(19,4) NOT NULL,
					  `fSALESUMM` DECIMAL(19,4) NOT NULL,
					  `fSALECURSUMM` DECIMAL(19,4) NOT NULL,
					  `fSALEVATSUMM` DECIMAL(19,4) NOT NULL,
					  `fDISCOUNTSUMM` DECIMAL(19,4) NOT NULL,
					  `fDISCOUNTCURSUMM` DECIMAL(19,4) NOT NULL,
					  `fDISCOUNTVATSUMM` DECIMAL(19,4) NOT NULL,
					  `fBASE` VARCHAR(64)   NOT NULL,
					  `fEMPLID` INT NOT NULL,
					  `fPARTID` INT NOT NULL,
					  `fCONTRACT` CHAR(3) CHARACTER SET 'utf8' NOT NULL,
					  `fDOCTYPE` TINYINT UNSIGNED NOT NULL,
					  `fDBCR` TINYINT(1) NOT NULL,
					  `fROWID` INT NOT NULL,
					  `fTRANS` INT NOT NULL,
					  INDEX `I_SALES1` (`fITEMTYPE` ASC, `fITEMID` ASC, `fDATE` ASC),
					  INDEX `I_SALES2` (`fBASE` ASC, `fROWID` ASC),
					  CONSTRAINT `FK_SALES_fITEMID`
						FOREIGN KEY (`fITEMID`)
						REFERENCES `" . $this->mysql_dbname . "`.`MATERIALS` (`fMTID`)
						ON DELETE NO ACTION
						ON UPDATE NO ACTION)";
            if ($this->db->query($query) === TRUE)
            {
                $result = "OK";
            }
            else
            {
                $result = "Error: " . $this->db->error;
                return $result;
            }

            return $result;
		}	
			


		// Импортирует данные из MSSql сервера в MySql сервер
        // Входные данные: $mssql_connect - массив с данными для подключения к БД
        //              $mssql_connect['servername'] - сервер с БД
        //              $mssql_connect['username'] - логин для поключения
        //              $mssql_connect['password'] - пароль для подключеня
        //              $mssql_connect['dbname'] - название БД
        //                 $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        // Выходные данные: $result - 'OK' если не было ошибок, или текст ошибки, если она была
		public function import_data($mssql_connect, $site_user_id, $exp_prog_id)
		{
			if (isset($mssql_connect['servername']))
			{
				$mssql_servername 	= $mssql_connect['servername'];
			}
			if (isset($mssql_connect['username']))
			{
				$mssql_username 	= $mssql_connect['username'];
			}
			if (isset($mssql_connect['password']))
			{
				$mssql_password 	= $mssql_connect['password'];
			}
			if (isset($mssql_connect['dbname']))
			{
				$mssql_dbname 		= $mssql_connect['dbname'];
			}

            $result = "OK";

		    try 
			{
				// $mssql_link = new PDO("odbc:Driver={SQL Server};
				// 								Server=$mssql_servername;
				// 								Database=$mssql_dbname; 
				// 								Uid=$mssql_username;
				// 								Pwd=$mssql_password;");
 
				//$connection_string = 'DRIVER={ServerDSN};SERVER=<46.130.49.240>;DATABASE=<TDefault>;'; 

				//$user = 'sa'; 
				//$pass = 'SaSa111'; 

				//$mssql_link = odbc_connect( $connection_string, $user, $pass ); 
				$mssql_link = odbc_connect("ServerDSN","sa","SaSa111");
				// print_r($mssql_link);die;
				// $connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$mssql_servername.";Database=".$mssql_dbname.";", $mssql_username, $mssql_password);
			}
			catch (PDOException $e) {
				$result = "Failed to get DB handle: " . $e->getMessage();
				return $result;
			}
			


// ----------------------------------------------------------------------------
// 			Table Test.CASHES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `CASHES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);

			$query="SELECT fCODE
						  ,fCAPTION
						  ,fNEXTNUMIN
						  ,fNEXTNUMOUT
						  ,fNEXTMTBILLNUM
						  ,fDEFAULT
						  ,fECRCRN
						  ,fECRIP
						  ,fECRPORT
						  ,fECRPASSWORD
						  ,fECRDEPWITHVAT
						  ,fECRDEPWITHOUTVAT
						  ,fECRPRINTMODE
				    FROM CASHES"; 
			$result = odbc_exec($mssql_link, $query);
			
				
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fNEXTNUMIN']        = odbc_result($result,'fNEXTNUMIN');
				$row['fNEXTNUMOUT']       = odbc_result($result,'fNEXTNUMOUT');
				$row['fNEXTMTBILLNUM']    = odbc_result($result,'fNEXTMTBILLNUM');
				$row['fDEFAULT']          = odbc_result($result,'fDEFAULT');
				$row['fECRCRN']     	  = odbc_result($result,'fECRCRN');
				$row['fECRIP'] 			  = odbc_result($result,'fECRIP');
				$row['fECRPORT'] 		  = odbc_result($result,'fECRPORT');
				$row['fECRPASSWORD'] 	  = odbc_result($result,'fECRPASSWORD');
				$row['fECRDEPWITHVAT']    = odbc_result($result,'fECRDEPWITHVAT');
				$row['fECRDEPWITHOUTVAT'] = odbc_result($result,'fECRDEPWITHOUTVAT');
				$row['fECRPRINTMODE'] 	  = odbc_result($result,'fECRPRINTMODE');
				
				
				$query = "INSERT INTO `CASHES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fNEXTNUMIN`,
							`fNEXTNUMOUT`,
							`fNEXTMTBILLNUM`,
							`fDEFAULT`,
							`fECRCRN`,
							`fECRIP`,
							`fECRPORT`,
							`fECRPASSWORD`,
							`fECRDEPWITHVAT`,
							`fECRDEPWITHOUTVAT`,
							`fECRPRINTMODE`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fNEXTNUMIN'] . "',
							'" . $row['fNEXTNUMOUT'] . "',
							'" . $row['fNEXTMTBILLNUM'] . "',
							'" . $row['fDEFAULT'] . "',
							'" . $row['fECRCRN'] . "',
							'" . $row['fECRIP'] . "',
							'" . $row['fECRPORT'] . "',
							'" . $row['fECRPASSWORD'] . "',
							'" . $row['fECRDEPWITHVAT'] . "',
							'" . $row['fECRDEPWITHOUTVAT'] . "',
							'" . $row['fECRPRINTMODE'] . "');";
				$this->db->query($query);

			}

// ----------------------------------------------------------------------------
// 			Table Test.CURR
// ----------------------------------------------------------------------------
			$query="DELETE FROM `CURR` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCUR
						  ,fCAPTION
						  ,fUNITNAME
						  ,fCENTNAME
					  FROM CURR"; 
			$result = odbc_exec($mssql_link, $query);
			
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCUR'] 			  = odbc_result($result,'fCUR');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fUNITNAME']         = odbc_result($result,'fUNITNAME');
				$row['fCENTNAME']         = odbc_result($result,'fCENTNAME');
				
				
				$query = "INSERT INTO `CURR`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCUR`,
							`fCAPTION`,
							`fUNITNAME`,
							`fCENTNAME`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCUR'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fUNITNAME'] . "',
							'" . $row['fCENTNAME'] . "');";
                $this->db->query($query);
			}
/*
// ----------------------------------------------------------------------------
// 			Table Test.DOCUMENTS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `DOCUMENTS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
		
			$query="SELECT fISN
						  ,fDATE
						  ,fORDERNUM
						  ,fDOCTYPE
						  ,fDOCSTATE
						  ,fDOCNUM
						  ,fCUR
						  ,fSUMM
						  ,fSTORAGE
						  ,fINFO
						  ,fCOMMENT
						  ,fBASEISN
						  ,fUSERID
						  ,fPARTID
						  ,fCRPARTID
						  ,fMTID
						  ,fEMPLID
						  ,fVATTYPE
						  ,fSPEC
						  ,fEXPTYPE
						  ,fINVN
						  ,fINVDATE
						  ,fBODY
						  ,fCHANGEDATE
					  FROM DOCUMENTS"; 
			$result = odbc_exec($mssql_link, $query);
   	        echo "814";
            print_r(814);
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fISN'] 			  = odbc_result($result,'fISN');
				$row['fDATE'] 			  = odbc_result($result,'fDATE');
				$row['fORDERNUM'] 		  = odbc_result($result,'fORDERNUM');
				$row['fDOCTYPE'] 		  = odbc_result($result,'fDOCTYPE');
				$row['fDOCSTATE'] 		  = odbc_result($result,'fDOCSTATE');
				$row['fDOCNUM'] 		  = odbc_result($result,'fDOCNUM');
				$row['fCUR'] 			  = odbc_result($result,'fCUR');
				$row['fSUMM'] 			  = odbc_result($result,'fSUMM');
				$row['fSTORAGE'] 		  = odbc_result($result,'fSTORAGE');
				$row['fINFO'] 			  = odbc_result($result,'fINFO');
				$row['fCOMMENT'] 		  = odbc_result($result,'fCOMMENT');
				$row['fBASEISN'] 		  = odbc_result($result,'fBASEISN');
				$row['fUSERID'] 		  = odbc_result($result,'fUSERID');
				$row['fPARTID'] 		  = odbc_result($result,'fPARTID');
				$row['fCRPARTID'] 		  = odbc_result($result,'fCRPARTID');
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fEMPLID'] 		  = odbc_result($result,'fEMPLID');
				$row['fVATTYPE'] 		  = odbc_result($result,'fVATTYPE');
				$row['fSPEC'] 			  = odbc_result($result,'fSPEC');
				$row['fEXPTYPE'] 		  = odbc_result($result,'fEXPTYPE');
				$row['fINVN'] 			  = odbc_result($result,'fINVN');
				$row['fINVDATE'] 		  = odbc_result($result,'fINVDATE');
				$row['fBODY'] 			  = odbc_result($result,'fBODY');
				$row['fCHANGEDATE'] 	  = odbc_result($result,'fCHANGEDATE');
				
				
				if ($row['fINVDATE'] == '')
				{
					$query = $query .
					$row['fINVDATE'] = "null";
				}
				else
				{
					$row['fINVDATE'] = "'" . $row['fINVDATE'] . "'";
				}
				
				$query = "INSERT INTO `DOCUMENTS`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fISN`,
							`fDATE`,
							`fORDERNUM`,
							`fDOCTYPE`,
							`fDOCSTATE`,
							`fDOCNUM`,
							`fCUR`,
							`fSUMM`,
							`fSTORAGE`,
							`fINFO`,
							`fCOMMENT`,
							`fBASEISN`,
							`fUSERID`,
							`fPARTID`,
							`fCRPARTID`,
							`fMTID`,
							`fEMPLID`,
							`fVATTYPE`,
							`fSPEC`,
							`fEXPTYPE`,
							`fINVN`,
							`fINVDATE`,
							`fBODY`,
							`fCHANGEDATE`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fISN'] . "',
							'" . $row['fDATE'] . "',
							'" . $row['fORDERNUM'] . "',
							'" . $row['fDOCTYPE'] . "',
							'" . $row['fDOCSTATE'] . "',
							'" . $row['fDOCNUM'] . "',
							'" . $row['fCUR'] . "',
							'" . $row['fSUMM'] . "',
							'" . $row['fSTORAGE'] . "',
							'" . $row['fINFO'] . "',
							'" . $row['fCOMMENT'] . "',
							'" . $row['fBASEISN'] . "',
							'" . $row['fUSERID'] . "',
							'" . $row['fPARTID'] . "',
							'" . $row['fCRPARTID'] . "',
							'" . $row['fMTID'] . "',
							'" . $row['fEMPLID'] . "',
							'" . $row['fVATTYPE'] . "',
							'" . $row['fSPEC'] . "',
							'" . $row['fEXPTYPE'] . "',
							'" . $row['fINVN'] . "',
							" . $row['fINVDATE'] . ",
							'" . $row['fBODY'] . "',
							'" . $row['fCHANGEDATE'] . "');";
                $this->db->query($query);
			}
           */
// ----------------------------------------------------------------------------
// 			Table Test.EMPLOYEES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `EMPLOYEES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fEMPLID
						  ,fEMPLCODE
						  ,fCAPTION
						  ,fADDRESS
						  ,fPHONE
						  ,fPASSPORT
						  ,fISSALESCONSULTANT
					  FROM EMPLOYEES"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fEMPLID'] 			  = odbc_result($result,'fEMPLID');
				$row['fEMPLCODE'] 			  = odbc_result($result,'fEMPLCODE');
				$row['fCAPTION'] 			  = odbc_result($result,'fCAPTION');
				$row['fADDRESS'] 			  = odbc_result($result,'fADDRESS');
				$row['fPHONE'] 			  	  = odbc_result($result,'fPHONE');
				$row['fPASSPORT'] 			  = odbc_result($result,'fPASSPORT');
				$row['fISSALESCONSULTANT'] 	  = odbc_result($result,'fISSALESCONSULTANT');
				
				$query = "INSERT INTO `EMPLOYEES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fEMPLID`,
							`fEMPLCODE`,
							`fCAPTION`,
							`fADDRESS`,
							`fPHONE`,
							`fPASSPORT`,
							`fISSALESCONSULTANT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fEMPLID'] . "',
							'" . $row['fEMPLCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fADDRESS'] . "',
							'" . $row['fPHONE'] . "',
							'" . $row['fPASSPORT'] . "',
							'" . $row['fISSALESCONSULTANT'] . "');";
                $this->db->query($query);
			}
// ----------------------------------------------------------------------------
// 			Table Test.QNTUNIT
// ----------------------------------------------------------------------------
			$query="DELETE FROM `QNTUNIT` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCODE
						  ,fCAPTION
						  ,fBRIEF
						  ,fFRACTION
						  ,fUNITID
					  FROM QNTUNIT"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION']		  = odbc_result($result,'fCAPTION');
				$row['fBRIEF']			  = odbc_result($result,'fBRIEF');
				$row['fFRACTION']		  = odbc_result($result,'fFRACTION');
				$row['fUNITID']			  = odbc_result($result,'fUNITID');
				
				$query = "INSERT INTO `QNTUNIT`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fBRIEF`,
							`fFRACTION`,
							`fUNITID`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fBRIEF'] . "',
							'" . $row['fFRACTION'] . "',
							'" . $row['fUNITID'] . "');";
                $this->db->query($query);
			}	
// ----------------------------------------------------------------------------
// 			Table Test.MATERIALS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MATERIALS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fMTID
						  ,fMTCODE
						  ,fCAPTION
						  ,fFULLCAPTION
						  ,fTYPE
						  ,fGROUP
						  ,fUNIT
						  ,fALTUNIT
						  ,fEXPMETHOD
						  ,fSHOW
						  ,fISWEIGHT
						  ,fDESCR
						  ,fCOUNTRY
						  ,fPRODUCER
						  ,fPROPERTY1
						  ,fPROPERTY2
						  ,fMINQTY
						  ,fEXTRA
						  ,fVAT
					  FROM MATERIALS"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fMTCODE'] 		  = odbc_result($result,'fMTCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fFULLCAPTION'] 	  = odbc_result($result,'fFULLCAPTION');
				$row['fTYPE'] 			  = odbc_result($result,'fTYPE');
				$row['fGROUP'] 			  = odbc_result($result,'fGROUP');
				$row['fUNIT'] 			  = odbc_result($result,'fUNIT');
				$row['fALTUNIT'] 		  = odbc_result($result,'fALTUNIT');
				$row['fEXPMETHOD'] 		  = odbc_result($result,'fEXPMETHOD');
				$row['fSHOW'] 			  = odbc_result($result,'fSHOW');
				$row['fISWEIGHT'] 		  = odbc_result($result,'fISWEIGHT');
				$row['fDESCR'] 			  = odbc_result($result,'fDESCR');
				$row['fCOUNTRY'] 		  = odbc_result($result,'fCOUNTRY');
				$row['fPRODUCER'] 		  = odbc_result($result,'fPRODUCER');
				$row['fPROPERTY1'] 		  = odbc_result($result,'fPROPERTY1');
				$row['fPROPERTY2'] 		  = odbc_result($result,'fPROPERTY2');
				$row['fMINQTY'] 		  = odbc_result($result,'fMINQTY');
				$row['fEXTRA'] 			  = odbc_result($result,'fEXTRA');
				$row['fVAT'] 			  = odbc_result($result,'fVAT');
				
				$query = "INSERT INTO `MATERIALS`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fMTID`,
							`fMTCODE`,
							`fCAPTION`,
							`fFULLCAPTION`,
							`fTYPE`,
							`fGROUP`,
							`fUNIT`,
							`fALTUNIT`,
							`fEXPMETHOD`,
							`fSHOW`,
							`fISWEIGHT`,
							`fDESCR`,
							`fCOUNTRY`,
							`fPRODUCER`,
							`fPROPERTY1`,
							`fPROPERTY2`,
							`fMINQTY`,
							`fEXTRA`,
							`fVAT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fMTID'] . "',
							'" . $row['fMTCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fFULLCAPTION'] . "',
							'" . $row['fTYPE'] . "',
							'" . $row['fGROUP'] . "',
							'" . $row['fUNIT'] . "',
							'" . $row['fALTUNIT'] . "',
							'" . $row['fEXPMETHOD'] . "',
							'" . $row['fSHOW'] . "',
							'" . $row['fISWEIGHT'] . "',
							'" . $row['fDESCR'] . "',
							'" . $row['fCOUNTRY'] . "',
							'" . $row['fPRODUCER'] . "',
							'" . $row['fPROPERTY1'] . "',
							'" . $row['fPROPERTY2'] . "',
							'" . $row['fMINQTY'] . "',
							'" . $row['fEXTRA'] . "',
							'" . $row['fVAT'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTGROUP
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTGROUP` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCODE
						  ,fCAPTION
						  ,fPATH
						  ,fPARENT
					  FROM MTGROUP"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fPATH'] 			  = odbc_result($result,'fPATH');
				$row['fPARENT'] 		  = odbc_result($result,'fPARENT');
				
				$query = "INSERT INTO `MTGROUP`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fPATH`,
							`fPARENT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fPATH'] . "',
							'" . $row['fPARENT'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTHI
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTHI` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fPARTYBASE
						  ,fPARTYROW
						  ,fDATE
						  ,fMTID
						  ,fSTORAGE
						  ,fQTY
						  ,fSUMM
						  ,fVATSUMM
						  ,fCURSUMM
						  ,fDBCR
						  ,fBASE
						  ,fROWID
						  ,fTRANS
						  ,fDOCTYPE
					  FROM MTHI"; 
			$result = odbc_exec($mssql_link, $query); 
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fPARTYBASE'] 		  = odbc_result($result,'fPARTYBASE');
				$row['fPARTYROW'] 		  = odbc_result($result,'fPARTYROW');
				$row['fDATE'] 			  = odbc_result($result,'fDATE');
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fSTORAGE'] 		  = odbc_result($result,'fSTORAGE');
				$row['fQTY'] 			  = odbc_result($result,'fQTY');
				$row['fSUMM'] 			  = odbc_result($result,'fSUMM');
				$row['fVATSUMM'] 		  = odbc_result($result,'fVATSUMM');
				$row['fCURSUMM'] 		  = odbc_result($result,'fCURSUMM');
				$row['fDBCR'] 			  = odbc_result($result,'fDBCR');
				$row['fBASE'] 			  = odbc_result($result,'fBASE');
				$row['fROWID'] 			  = odbc_result($result,'fROWID');
				$row['fTRANS'] 			  = odbc_result($result,'fTRANS');
				$row['fDOCTYPE'] 		  = odbc_result($result,'fDOCTYPE');
				
				$query = "INSERT INTO `MTHI`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fPARTYBASE`,
							`fPARTYROW`,
							`fDATE`,
							`fMTID`,
							`fSTORAGE`,
							`fQTY`,
							`fSUMM`,
							`fVATSUMM`,
							`fCURSUMM`,
							`fDBCR`,
							`fBASE`,
							`fROWID`,
							`fTRANS`,
							`fDOCTYPE`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fPARTYBASE'] . "',
							'" . $row['fPARTYROW'] . "',
							'" . $row['fDATE'] . "',
							'" . $row['fMTID'] . "',
							'" . $row['fSTORAGE'] . "',
							'" . $row['fQTY'] . "',
							'" . $row['fSUMM'] . "',
							'" . $row['fVATSUMM'] . "',
							'" . $row['fCURSUMM'] . "',
							'" . $row['fDBCR'] . "',
							'" . $row['fBASE'] . "',
							'" . $row['fROWID'] . "',
							'" . $row['fTRANS'] . "',
							'" . $row['fDOCTYPE'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTINCOMELIST
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTINCOMELIST` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fISN
						  ,fROWNUM
						  ,fMTID
						  ,fUNIT
						  ,fQUANTITY
						  ,fPRICE
						  ,fSUMMA
						  ,fEXTRAPERCENT
						  ,fSALEPRICE
						  ,fSALESUMMA
						  ,fVAT
						  ,fUSELIFE
						  ,fCOUNTRY
						  ,fPRODUCER
						  ,fPROPERTY1
						  ,fPROPERTY2
						  ,fROWID
					  FROM MTINCOMELIST"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fISN'] 			  = odbc_result($result,'fISN');
				$row['fROWNUM'] 		  = odbc_result($result,'fROWNUM');
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fUNIT'] 			  = odbc_result($result,'fUNIT');
				$row['fQUANTITY'] 		  = odbc_result($result,'fQUANTITY');
				$row['fPRICE'] 			  = odbc_result($result,'fPRICE');
				$row['fSUMMA'] 			  = odbc_result($result,'fSUMMA');
				$row['fEXTRAPERCENT'] 	  = odbc_result($result,'fEXTRAPERCENT');
				$row['fSALEPRICE'] 		  = odbc_result($result,'fSALEPRICE');
				$row['fSALESUMMA'] 		  = odbc_result($result,'fSALESUMMA');
				$row['fVAT'] 			  = odbc_result($result,'fVAT');
				$row['fUSELIFE'] 		  = odbc_result($result,'fUSELIFE');
				$row['fCOUNTRY'] 		  = odbc_result($result,'fCOUNTRY');
				$row['fPRODUCER'] 		  = odbc_result($result,'fPRODUCER');
				$row['fPROPERTY1'] 		  = odbc_result($result,'fPROPERTY1');
				$row['fPROPERTY2'] 		  = odbc_result($result,'fPROPERTY2');
				$row['fROWID'] 			  = odbc_result($result,'fROWID');
				
				if ($row['fUSELIFE'] == '')
				{
					$query = $query .
					$row['fUSELIFE'] = "null";
				}
				else
				{
					$row['fUSELIFE'] = "'" . $row['fUSELIFE'] . "'";
				}
				$query = "INSERT INTO `MTINCOMELIST`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fISN`,
							`fROWNUM`,
							`fMTID`,
							`fUNIT`,
							`fQUANTITY`,
							`fPRICE`,
							`fSUMMA`,
							`fEXTRAPERCENT`,
							`fSALEPRICE`,
							`fSALESUMMA`,
							`fVAT`,
							`fUSELIFE`,
							`fCOUNTRY`,
							`fPRODUCER`,
							`fPROPERTY1`,
							`fPROPERTY2`,
							`fROWID`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fISN'] . "',
							'" . $row['fROWNUM'] . "',
							'" . $row['fMTID'] . "',
							'" . $row['fUNIT'] . "',
							'" . $row['fQUANTITY'] . "',
							'" . $row['fPRICE'] . "',
							'" . $row['fSUMMA'] . "',
							'" . $row['fEXTRAPERCENT'] . "',
							'" . $row['fSALEPRICE'] . "',
							'" . $row['fSALESUMMA'] . "',
							'" . $row['fVAT'] . "',
							" . $row['fUSELIFE'] . ",
							'" . $row['fCOUNTRY'] . "',
							'" . $row['fPRODUCER'] . "',
							'" . $row['fPROPERTY1'] . "',
							'" . $row['fPROPERTY2'] . "',
							'" . $row['fROWID'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTQNTUNITS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTQNTUNITS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fMTID
						  ,fQNTUNIT
						  ,fCOEF
						  ,fBARCODE
						  ,fIMAGE
					  FROM MTQNTUNITS"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fQNTUNIT'] 		  = odbc_result($result,'fQNTUNIT');
				$row['fCOEF'] 			  = odbc_result($result,'fCOEF');
				$row['fBARCODE'] 		  = odbc_result($result,'fBARCODE');
				$row['fIMAGE'] 			  = odbc_result($result,'fIMAGE');
				
				$query = "INSERT INTO `MTQNTUNITS`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fMTID`,
							`fQNTUNIT`,
							`fCOEF`,
							`fBARCODE`,
							`fIMAGE`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fMTID'] . "',
							'" . $row['fQNTUNIT'] . "',
							'" . $row['fCOEF'] . "',
							'" . $row['fBARCODE'] . "',
							'" . $row['fIMAGE'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTIES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTIES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fPARTYBASE
						  ,fPARTYROW
						  ,fINCOMEDATE
						  ,fMTID
						  ,fPARTID
						  ,fCONTRACT
						  ,fGLOBALPARTYBASE
						  ,fGLOBALPARTYROW
						  ,fTRANS
						  ,fEXPMETHOD
						  ,fUSEABLEDATE
						  ,fCOUNTRY
						  ,fPRODUCER
						  ,fPROPERTY1
						  ,fPROPERTY2
					  FROM PARTIES"; 
			$result = odbc_exec($mssql_link, $query); 
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fPARTYBASE'] 		  = odbc_result($result,'fPARTYBASE');
				$row['fPARTYROW'] 		  = odbc_result($result,'fPARTYROW');
				$row['fINCOMEDATE'] 	  = odbc_result($result,'fINCOMEDATE');
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fPARTID'] 		  = odbc_result($result,'fPARTID');
				$row['fCONTRACT'] 		  = odbc_result($result,'fCONTRACT');
				$row['fGLOBALPARTYBASE']  = odbc_result($result,'fGLOBALPARTYBASE');
				$row['fGLOBALPARTYROW']   = odbc_result($result,'fGLOBALPARTYROW');
				$row['fTRANS'] 			  = odbc_result($result,'fTRANS');
				$row['fEXPMETHOD'] 		  = odbc_result($result,'fEXPMETHOD');
				$row['fUSEABLEDATE'] 	  = odbc_result($result,'fUSEABLEDATE');
				$row['fCOUNTRY'] 		  = odbc_result($result,'fCOUNTRY');
				$row['fPRODUCER'] 		  = odbc_result($result,'fPRODUCER');
				$row['fPROPERTY1'] 		  = odbc_result($result,'fPROPERTY1');
				$row['fPROPERTY2'] 		  = odbc_result($result,'fPROPERTY2');
				
				if ($row['fUSEABLEDATE'] == '')
				{
					$query = $query .
					$row['fUSEABLEDATE'] = "null";
				}
				else
				{
					$row['fUSEABLEDATE'] = "'" . $row['fUSEABLEDATE'] . "'";
				}
				$query = "INSERT INTO `PARTIES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fPARTYBASE`,
							`fPARTYROW`,
							`fINCOMEDATE`,
							`fMTID`,
							`fPARTID`,
							`fCONTRACT`,
							`fGLOBALPARTYBASE`,
							`fGLOBALPARTYROW`,
							`fTRANS`,
							`fEXPMETHOD`,
							`fUSEABLEDATE`,
							`fCOUNTRY`,
							`fPRODUCER`,
							`fPROPERTY1`,
							`fPROPERTY2`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fPARTYBASE'] . "',
							'" . $row['fPARTYROW'] . "',
							'" . $row['fINCOMEDATE'] . "',
							'" . $row['fMTID'] . "',
							'" . $row['fPARTID'] . "',
							'" . $row['fCONTRACT'] . "',
							'" . $row['fGLOBALPARTYBASE'] . "',
							'" . $row['fGLOBALPARTYROW'] . "',
							'" . $row['fTRANS'] . "',
							'" . $row['fEXPMETHOD'] . "',
							" . $row['fUSEABLEDATE'] . ",
							'" . $row['fCOUNTRY'] . "',
							'" . $row['fPRODUCER'] . "',
							'" . $row['fPROPERTY1'] . "',
							'" . $row['fPROPERTY2'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTNERS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTNERS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fPARTID
						  ,fPARTCODE
						  ,fCAPTION
						  ,fFULLCAPTION
						  ,fTYPE
						  ,fSETTLACC
						  ,fTAXCODE
						  ,fADDRESS
						  ,fBUSINESSADDRESS
						  ,fPHONE
						  ,fMANAGERPOST
						  ,fMANAGERFIO
						  ,fCHIEFACCPOST
						  ,fCHIEFACCFIO
						  ,fPARTSTATEREGISTER
						  ,fPASSPORT
						  ,fMAINAIM
						  ,fNEXTCONTRACT
						  ,fSUPPLIER
						  ,fCUSTOMER
					  FROM PARTNERS"; 
			$result = odbc_exec($mssql_link, $query);  
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fPARTID'] 		  	= odbc_result($result,'fPARTID');
				$row['fPARTCODE'] 		  	= odbc_result($result,'fPARTCODE');
				$row['fCAPTION'] 		  	= odbc_result($result,'fCAPTION');
				$row['fFULLCAPTION'] 	  	= odbc_result($result,'fFULLCAPTION');
				$row['fTYPE'] 			  	= odbc_result($result,'fTYPE');
				$row['fSETTLACC'] 		  	= odbc_result($result,'fSETTLACC');
				$row['fTAXCODE'] 		  	= odbc_result($result,'fTAXCODE');
				$row['fADDRESS'] 		  	= odbc_result($result,'fADDRESS');
				$row['fBUSINESSADDRESS']  	= odbc_result($result,'fBUSINESSADDRESS');
				$row['fPHONE'] 			  	= odbc_result($result,'fPHONE');
				$row['fMANAGERPOST'] 	  	= odbc_result($result,'fMANAGERPOST');
				$row['fMANAGERFIO'] 	  	= odbc_result($result,'fMANAGERFIO');
				$row['fCHIEFACCPOST'] 	  	= odbc_result($result,'fCHIEFACCPOST');
				$row['fCHIEFACCFIO'] 	  	= odbc_result($result,'fCHIEFACCFIO');
				$row['fPARTSTATEREGISTER']  = odbc_result($result,'fPARTSTATEREGISTER');
				$row['fPASSPORT'] 		  	= odbc_result($result,'fPASSPORT');
				$row['fMAINAIM'] 		  	= odbc_result($result,'fMAINAIM');
				$row['fNEXTCONTRACT'] 	  	= odbc_result($result,'fNEXTCONTRACT');
				$row['fSUPPLIER'] 		  	= odbc_result($result,'fSUPPLIER');
				$row['fCUSTOMER'] 		  	= odbc_result($result,'fCUSTOMER');
				
				$query = "INSERT INTO `PARTNERS`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fPARTID`,
							`fPARTCODE`,
							`fCAPTION`,
							`fFULLCAPTION`,
							`fTYPE`,
							`fSETTLACC`,
							`fTAXCODE`,
							`fADDRESS`,
							`fBUSINESSADDRESS`,
							`fPHONE`,
							`fMANAGERPOST`,
							`fMANAGERFIO`,
							`fCHIEFACCPOST`,
							`fCHIEFACCFIO`,
							`fPARTSTATEREGISTER`,
							`fPASSPORT`,
							`fMAINAIM`,
							`fNEXTCONTRACT`,
							`fSUPPLIER`,
							`fCUSTOMER`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fPARTID'] . "',
							'" . $row['fPARTCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fFULLCAPTION'] . "',
							'" . $row['fTYPE'] . "',
							'" . $row['fSETTLACC'] . "',
							'" . $row['fTAXCODE'] . "',
							'" . $row['fADDRESS'] . "',
							'" . $row['fBUSINESSADDRESS'] . "',
							'" . $row['fPHONE'] . "',
							'" . $row['fMANAGERPOST'] . "',
							'" . $row['fMANAGERFIO'] . "',
							'" . $row['fCHIEFACCPOST'] . "',
							'" . $row['fCHIEFACCFIO'] . "',
							'" . $row['fPARTSTATEREGISTER'] . "',
							'" . $row['fPASSPORT'] . "',
							'" . $row['fMAINAIM'] . "',
							'" . $row['fNEXTCONTRACT'] . "',
							'" . $row['fSUPPLIER'] . "',
							'" . $row['fCUSTOMER'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTTYPE
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTTYPE` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCODE
						  ,fCAPTION
						  ,fPATH
						  ,fPARENT
					  FROM PARTTYPE"; 
			$result = odbc_exec($mssql_link, $query); 
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fPATH'] 			  = odbc_result($result,'fPATH');
				$row['fPARENT'] 		  = odbc_result($result,'fPARENT');
				
				$query = "INSERT INTO `PARTTYPE`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fPATH`,
							`fPARENT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fPATH'] . "',
							'" . $row['fPARENT'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PRICES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PRICES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fMTID
						  ,fPRICETYPE
						  ,fUNIT
						  ,fDATE
						  ,fCUR
						  ,fPRICE
					  FROM PRICES"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fMTID'] 			  = odbc_result($result,'fMTID');
				$row['fPRICETYPE'] 		  = odbc_result($result,'fPRICETYPE');
				$row['fUNIT'] 			  = odbc_result($result,'fUNIT');
				$row['fDATE'] 			  = odbc_result($result,'fDATE');
				$row['fCUR'] 			  = odbc_result($result,'fCUR');
				$row['fPRICE'] 			  = odbc_result($result,'fPRICE');
				
				$query = "INSERT INTO `PRICES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fMTID`,
							`fPRICETYPE`,
							`fUNIT`,
							`fDATE`,
							`fCUR`,
							`fPRICE`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fMTID'] . "',
							'" . $row['fPRICETYPE'] . "',
							'" . $row['fUNIT'] . "',
							'" . $row['fDATE'] . "',
							'" . $row['fCUR'] . "',
							'" . $row['fPRICE'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PRICETYPES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PRICETYPES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCODE
						  ,fCAPTION
						  ,fCUR
						  ,fROUND
						  ,fVAT
					  FROM PRICETYPES"; 
			$result = odbc_exec($mssql_link, $query); 
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fCUR'] 			  = odbc_result($result,'fCUR');
				$row['fROUND'] 			  = odbc_result($result,'fROUND');
				$row['fVAT'] 			  = odbc_result($result,'fVAT');
				
				$query = "INSERT INTO `PRICETYPES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fCUR`,
							`fROUND`,
							`fVAT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fCUR'] . "',
							'" . $row['fROUND'] . "',
							'" . $row['fVAT'] . "');";
                $this->db->query($query);
			}


// ----------------------------------------------------------------------------
// 			Table Test.SALES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `SALES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fPARTYBASE
						  ,fPARTYROW
						  ,fDATE
						  ,fITEMTYPE
						  ,fITEMID
						  ,fSTORAGE
						  ,fQTY
						  ,fCOSTSUMM
						  ,fCOSTCURSUMM
						  ,fCOSTVATSUMM
						  ,fSALESUMM
						  ,fSALECURSUMM
						  ,fSALEVATSUMM
						  ,fDISCOUNTSUMM
						  ,fDISCOUNTCURSUMM
						  ,fDISCOUNTVATSUMM
						  ,fBASE
						  ,fEMPLID
						  ,fPARTID
						  ,fCONTRACT
						  ,fDOCTYPE
						  ,fDBCR
						  ,fROWID
						  ,fTRANS
					  FROM SALES"; 
			$result = odbc_exec($mssql_link, $query);
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fPARTYBASE'] 		  = odbc_result($result,'fPARTYBASE');
				$row['fPARTYROW'] 		  = odbc_result($result,'fPARTYROW');
				$row['fDATE'] 			  = odbc_result($result,'fDATE');
				$row['fITEMTYPE'] 		  = odbc_result($result,'fITEMTYPE');
				$row['fITEMID'] 		  = odbc_result($result,'fITEMID');
				$row['fSTORAGE'] 		  = odbc_result($result,'fSTORAGE');
				$row['fQTY'] 			  = odbc_result($result,'fQTY');
				$row['fCOSTSUMM'] 		  = odbc_result($result,'fCOSTSUMM');
				$row['fCOSTCURSUMM'] 	  = odbc_result($result,'fCOSTCURSUMM');
				$row['fCOSTVATSUMM'] 	  = odbc_result($result,'fCOSTVATSUMM');
				$row['fSALESUMM'] 		  = odbc_result($result,'fSALESUMM');
				$row['fSALECURSUMM'] 	  = odbc_result($result,'fSALECURSUMM');
				$row['fSALEVATSUMM'] 	  = odbc_result($result,'fSALEVATSUMM');
				$row['fDISCOUNTSUMM'] 	  = odbc_result($result,'fDISCOUNTSUMM');
				$row['fDISCOUNTCURSUMM']  = odbc_result($result,'fDISCOUNTCURSUMM');
				$row['fDISCOUNTVATSUMM']  = odbc_result($result,'fDISCOUNTVATSUMM');
				$row['fBASE'] 			  = odbc_result($result,'fBASE');
				$row['fEMPLID'] 		  = odbc_result($result,'fEMPLID');
				$row['fPARTID'] 		  = odbc_result($result,'fPARTID');
				$row['fCONTRACT'] 		  = odbc_result($result,'fCONTRACT');
				$row['fDOCTYPE'] 		  = odbc_result($result,'fDOCTYPE');
				$row['fDBCR'] 			  = odbc_result($result,'fDBCR');
				$row['fROWID'] 			  = odbc_result($result,'fROWID');
				$row['fTRANS'] 			  = odbc_result($result,'fTRANS');
				
				$query = "INSERT INTO `SALES`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fPARTYBASE`,
							`fPARTYROW`,
							`fDATE`,
							`fITEMTYPE`,
							`fITEMID`,
							`fSTORAGE`,
							`fQTY`,
							`fCOSTSUMM`,
							`fCOSTCURSUMM`,
							`fCOSTVATSUMM`,
							`fSALESUMM`,
							`fSALECURSUMM`,
							`fSALEVATSUMM`,
							`fDISCOUNTSUMM`,
							`fDISCOUNTCURSUMM`,
							`fDISCOUNTVATSUMM`,
							`fBASE`,
							`fEMPLID`,
							`fPARTID`,
							`fCONTRACT`,
							`fDOCTYPE`,
							`fDBCR`,
							`fROWID`,
							`fTRANS`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fPARTYBASE'] . "',
							'" . $row['fPARTYROW'] . "',
							'" . $row['fDATE'] . "',
							'" . $row['fITEMTYPE'] . "',
							'" . $row['fITEMID'] . "',
							'" . $row['fSTORAGE'] . "',
							'" . $row['fQTY'] . "',
							'" . $row['fCOSTSUMM'] . "',
							'" . $row['fCOSTCURSUMM'] . "',
							'" . $row['fCOSTVATSUMM'] . "',
							'" . $row['fSALESUMM'] . "',
							'" . $row['fSALECURSUMM'] . "',
							'" . $row['fSALEVATSUMM'] . "',
							'" . $row['fDISCOUNTSUMM'] . "',
							'" . $row['fDISCOUNTCURSUMM'] . "',
							'" . $row['fDISCOUNTVATSUMM'] . "',
							'" . $row['fBASE'] . "',
							'" . $row['fEMPLID'] . "',
							'" . $row['fPARTID'] . "',
							'" . $row['fCONTRACT'] . "',
							'" . $row['fDOCTYPE'] . "',
							'" . $row['fDBCR'] . "',
							'" . $row['fROWID'] . "',
							'" . $row['fTRANS'] . "');";
                $this->db->query($query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.STORAGE
// ----------------------------------------------------------------------------
			$query="DELETE FROM `STORAGE` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            $this->db->query($query);
			
			$query="SELECT fCODE
						  ,fCAPTION
						  ,fRESPONS
						  ,fADDRESS
						  ,fRETAIL
						  ,fDEFAULT
					  FROM STORAGE"; 
			$result = odbc_exec($mssql_link, $query);  
  
			while(odbc_fetch_row($result))
			{
				$row = array();
				$row['fCODE'] 			  = odbc_result($result,'fCODE');
				$row['fCAPTION'] 		  = odbc_result($result,'fCAPTION');
				$row['fRESPONS'] 		  = odbc_result($result,'fRESPONS');
				$row['fADDRESS'] 		  = odbc_result($result,'fADDRESS');
				$row['fRETAIL'] 		  = odbc_result($result,'fRETAIL');
				$row['fDEFAULT'] 		  = odbc_result($result,'fDEFAULT');
				
				$query = "INSERT INTO `STORAGE`
							(`SITEUSER_ID`,
							`EXP_PROG_ID`,
							`fCODE`,
							`fCAPTION`,
							`fRESPONS`,
							`fADDRESS`,
							`fRETAIL`,
							`fDEFAULT`)
							VALUES
							('" . $site_user_id	. "',
							'" . $exp_prog_id . "',
							'" . $row['fCODE'] . "',
							'" . $row['fCAPTION'] . "',
							'" . $row['fRESPONS'] . "',
							'" . $row['fADDRESS'] . "',
							'" . $row['fRETAIL'] . "',
							'" . $row['fDEFAULT'] . "');";
                $this->db->query($query);
			}
		}



		// Получает список всех складов
        // Входные данные: $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        // Выходные данные: $storages - массив складов, содержит 2 поля:
        //                          storage_id - код склада
        //                          storage_name - название склада
		public function get_storages($site_user_id, $exp_prog_id)
		{
			$query = "SELECT `fCODE`, `fCAPTION` 
							FROM `STORAGE` 
							WHERE `SITEUSER_ID` = " . $site_user_id . " AND 
								  `EXP_PROG_ID` = " . $exp_prog_id;
			$result = $this->db->query($query);
			
			$storages = [];
			$i = 0;
			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
					$storages[$i] = array('storage_id'   => $row->fCODE,
										  'storage_name' => $row->fCAPTION);
					$i++;
				}
			}
			return $storages;
		}



        // Получает список всех групп товаров
        // Входные данные: $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        // Выходные данные: $groups - массив групп товаров, содержит 2 поля:
        //                          prod_group_id - код группы товаров
        //                          prod_group_name - название группы товаров
		public function get_mtgroups($site_user_id, $exp_prog_id)
		{
			$query = "SELECT `fCODE`, `fCAPTION` 
							FROM `MTGROUP` 
							WHERE `SITEUSER_ID` = " . $site_user_id . " AND 
								  `EXP_PROG_ID` = " . $exp_prog_id;
			$result = $this->db->query($query);
			
			$groups = [];
			$i = 0;
			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
					$groups[$i] = array('prod_group_id'   => $row->fCODE,
										'prod_group_name' => $row->fCAPTION);
					$i++;
				}
			}
			return $groups;
		}



        // Получает список всех товаров
        // Входные данные: $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        // Выходные данные: $products - массив товаров, содержит 2 поля:
        //                          prod_id - id товара
        //                          prod_code - код товара
        //                          prod_name - название товара
		public function get_materials($site_user_id, $exp_prog_id)
		{
			$query = "SELECT `fMTID`, `fMTCODE`, `fCAPTION` 
							FROM `MATERIALS` 
							WHERE `SITEUSER_ID` = " . $site_user_id . " AND 
								  `EXP_PROG_ID` = " . $exp_prog_id;
			$result = $this->db->query($query);
			
			$products = [];
			$i = 0;
			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
					$products[$i] = array('prod_id'   => $row->fMTID,
										  'prod_code' => $row->fMTCODE,
										  'prod_name' => $row->fCAPTION);
					$i++;
				}
			}
			return $products;
		}



        // Получает список всех контрагентов
        // Входные данные: $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        // Выходные данные: $partners - массив контрагентов, содержит 2 поля:
        //                          partner_id - код контрагента
        //                          partner_name - название контрагента
		public function get_partners($site_user_id, $exp_prog_id)
		{
			$query = "SELECT `fPARTID`, `fCAPTION` 
							FROM `PARTNERS` 
							WHERE `SITEUSER_ID` = " . $site_user_id . " AND 
								  `EXP_PROG_ID` = " . $exp_prog_id;
			$result = $this->db->query($query);
			
			$partners = [];
			$i = 0;
			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
					$partners[$i] = array('partner_id'	  => $row->fPARTID,
										  'partner_name' => $row->fCAPTION);
					$i++;
				}
			}
			return $partners;
		}



        // Получает отчет по прадажам за период времени
        // Входные данные: $site_user_id - уникальный идентификатор пользователя
        //                 $exp_prog_id  - id программы (1 - AS Trade, 2 - AS Account)
        //                 $start_date   - начальная дата периода в формате гггг-мм-дд
        //                 $end_date     - конечная дата периода в формате гггг-мм-дд
        //                 $prod_id      - id товара
        //                 $prod_group_id - код группы товаров
        //                 $partnr_id    - код контрагента
        //                 $storages     - массив с кодами складов
        //                 $sort         - тип группировки [0 or NULL - без группировки,
        //                                                  1 - группировка по контрагентам
        //                                                  2 - группировка по продуктам]
        // Выходные данные: $sales - массив с информацией по продажам
		public function get_sales($site_user_id, $exp_prog_id, $start_date, $end_date, $prod_id, $prod_group_id, $partnr_id, $storages, $sort)
		{		
			$query = "SELECT 
							`SALES`.`fDATE`			AS `DATE`,
							`MATERIALS`.`fMTCODE`   AS `PROD_CODE`,
							`MATERIALS`.`fCAPTION`  AS `PROD_NAME`,
							`QNTUNIT`.`fBRIEF` 		AS `QNT_UNIT`,
							`STORAGE`.`fCAPTION` 	AS `STORAGE_NAME`,
							`PARTNERS`.`fCAPTION` 	AS `PARTNR_NAME`,
							`SALES`.`fQTY` 			AS `COUNT`,
							`SALES`.`fCOSTSUMM` 	AS `COST_SUM`,
							`SALES`.`fSALESUMM` 	AS `SALE_SUM`
						FROM `SALES` 	 
						LEFT JOIN `MATERIALS` ON 
								`SALES`.`SITEUSER_ID`     = `MATERIALS`.`SITEUSER_ID` AND 
								`SALES`.`EXP_PROG_ID`     = `MATERIALS`.`EXP_PROG_ID` AND 
								`SALES`.`fITEMID`         = `MATERIALS`.`fMTID` 
						LEFT JOIN `STORAGE`   ON
								`SALES`.`SITEUSER_ID`     = `STORAGE`.`SITEUSER_ID`   AND
								`SALES`.`EXP_PROG_ID`     = `STORAGE`.`EXP_PROG_ID`   AND
								`SALES`.`fSTORAGE`        = `STORAGE`.`fCODE`
						LEFT JOIN `PARTNERS`  ON
								`SALES`.`SITEUSER_ID`     = `PARTNERS`.`SITEUSER_ID`  AND
								`SALES`.`EXP_PROG_ID`     = `PARTNERS`.`EXP_PROG_ID`  AND
								`SALES`.`fPARTID`	      = `PARTNERS`.`fPARTID`
						LEFT JOIN `QNTUNIT`   ON
								`MATERIALS`.`SITEUSER_ID` = `QNTUNIT`.`SITEUSER_ID`   AND
								`MATERIALS`.`EXP_PROG_ID` = `QNTUNIT`.`EXP_PROG_ID`   AND
								`MATERIALS`.`fUNIT`       = `QNTUNIT`.`fCODE`
						LEFT JOIN `MTGROUP`   ON
								`MATERIALS`.`SITEUSER_ID` = `MTGROUP`.`SITEUSER_ID`   AND
								`MATERIALS`.`EXP_PROG_ID` = `MTGROUP`.`EXP_PROG_ID`   AND
								`MATERIALS`.`fGROUP`      = `MTGROUP`.`fCODE`
						WHERE
							`SALES`.`SITEUSER_ID` = " . $site_user_id . " AND
                        	`SALES`.`EXP_PROG_ID` = " . $exp_prog_id . "  AND
							DATE(`SALES`.`fDATE`) BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
			if ($prod_id == '' || $prod_id == null || $prod_id == 0)
			{
			}
			else
			{
				$query = $query . " AND `MATERIALS`.`fMTID` = '" . $prod_id . "'";
			}
			
			if ($prod_group_id == '' || $prod_group_id == null || $prod_group_id == 0)
			{
			}
			else
			{
				$query = $query . " AND `MTGROUP`.`fCODE` = '" . $prod_group_id . "'";
			}
			
			if ($partnr_id == '' || $partnr_id == null || $partnr_id == 0)
			{
			}
			else
			{
				$query = $query . " AND `PARTNERS`.`fPARTID` = '" . $partnr_id . "'";
			}
			
			if (count($storages) > 0)
			{
				$query = $query . " AND ( ";
			}
			
			for ($i = 0; $i < count($storages); $i++)
			{
				if ($i == 0)
				{
				}
				else
				{
					$query = $query . " OR ";
				}
				$query = $query . " `STORAGE`.`fCODE` = '" . $storages[$i] . "'";
			} 
						
			if (count($storages) > 0)
			{
				$query = $query . " ) ";
			}
			
			if ($sort == 0 || $sort == null || $sort == '')
			{
				$query = $query . " ORDER BY `SALES`.`fDATE`";
			}
			if ($sort == 1)
			{
				$query = $query . " ORDER BY `PARTNERS`.`fCAPTION`";
			}
			if ($sort == 2)
			{
				$query = $query . " ORDER BY `MATERIALS`.`fMTCODE`";
			}	
			
			$result = $this->db->query($query);		
			
			
			$cost_sum = 0;
			$sale_sum = 0;
			
			$sales = [];
			$i = 0;
			
			
			if ($sort == 0 || $sort == null)
			{
				foreach ($result->result() as $row)
				{
					$sale_sum = $row->SALE_SUM;
					$cost_sum = $row->COST_SUM;
					$rent  = $sale_sum - $cost_sum;
					if ($cost_sum == 0)
					{
					}
					else
					{
						$marge = $rent / $cost_sum * 100;
					}
					$sales[$i] = array('date' 		  => $row->DATE, 
									   'prod_code'	  => $row->PROD_CODE,
									   'prod_name'    => $row->PROD_NAME,
								       'qnt_unit'     => $row->QNT_UNIT,
								       'storage_name' => $row->STORAGE_NAME,
								       'partnr_name'  => $row->PARTNR_NAME,
								       'count'		  => $row->COUNT,
								       'cost_sum'	  => $row->COST_SUM,
								       'sale_sum'	  => $row->SALE_SUM,
								       'rent'		  => $rent,
								       'marge'		  => $marge);
					$i++;
				}
			}
			
			
			if ($sort == 1)
			{
				$curr_partnr = null;
				foreach ($result->result() as $row)
				{
					if ($curr_partnr == '' || $curr_partnr == null)
					{
						$curr_partnr = $row->PARTNR_NAME;
						$cost_sum = $row->COST_SUM;
						$sale_sum = $row->SALE_SUM;
					}
					else
					{
						if ($curr_partnr <> $row->PARTNR_NAME)
						{
							$rent = $sale_sum - $cost_sum;
							
							if ($cost_sum == 0)
							{
							}
							else
							{
								$marge = $rent / $cost_sum * 100;
							}
							
							$sales[$i] = array('partnr_name'  => $curr_partnr,
											   'cost_sum'	  => $cost_sum,
										       'sale_sum'	  => $sale_sum,
										       'rent'		  => $rent,
										       'marge'		  => $marge);
							$i++;
					
							$curr_partnr = $row->PARTNR_NAME;
							$cost_sum = $row->COST_SUM;
							$sale_sum = $row->SALE_SUM;
						}
						else
						{
							$cost_sum = $cost_sum + $row->COST_SUM;
							$sale_sum = $sale_sum + $row->SALE_SUM;
						}
					}
				}
				$rent = $sale_sum - $cost_sum;
				
				if ($cost_sum == 0)
				{
				}
				else
				{
					$marge = $rent / $cost_sum * 100;
				}
				$sales[$i] = array('partnr_name'  => $curr_partnr,
							       'cost_sum'	  => $cost_sum,
							       'sale_sum'	  => $sale_sum,
							       'rent'		  => $rent,
							       'marge'		  => $marge);
				$i++;
			}
			

			if ($sort == 2)
			{	
				$curr_prod = null;
				foreach ($result->result() as $row)
				{
					if ($curr_prod == '' || $curr_prod == null)
					{
						$curr_prod	    = $row->PROD_CODE;
					    $curr_prod_name = $row->PROD_NAME;
					    $qnt_unit       = $row->QNT_UNIT;
					    $count		    = $row->COUNT;
					    $cost_sum	    = $row->COST_SUM;
					    $sale_sum	    = $row->SALE_SUM;
					}
					else
					{
						if ($curr_prod <> $row->PROD_CODE)
						{
							$rent = $sale_sum - $cost_sum;
							
							if ($cost_sum == 0)
							{
							}
							else
							{
								$marge = $rent / $cost_sum * 100;
							}
							$sales[$i] = array('prod_code'	  => $curr_prod,
										       'prod_name'    => $curr_prod_name,
										       'qnt_unit'     => $qnt_unit,
										       'count'		  => $count,
										       'cost_sum'	  => $cost_sum,
									     	   'sale_sum'	  => $sale_sum,
										       'rent'		  => $rent,
										       'marge'		  => $marge);
							$i++;
							
							$curr_prod	    = $row->PROD_CODE;
							$curr_prod_name = $row->PROD_NAME;
							$qnt_unit       = $row->QNT_UNIT;
							$count		    = $row->COUNT;
							$cost_sum	    = $row->COST_SUM;
							$sale_sum	    = $row->SALE_SUM;
						}
						else
						{
							$count	  = $count + $row->COUNT;
							$cost_sum = $cost_sum + $row->COST_SUM;
							$sale_sum = $sale_sum + $row->SALE_SUM;
						}
					}
				}
				$rent = $sale_sum - $cost_sum;
				
				if ($cost_sum == 0)
				{
				}
				else
				{
					$marge = $rent / $cost_sum * 100;
				}
				$sales[$i] = array('prod_code'	  => $curr_prod,
							       'prod_name'    => $curr_prod_name,
							       'qnt_unit'     => $qnt_unit,
							       'count'		  => $count,
							       'cost_sum'	  => $cost_sum,
							       'sale_sum'	  => $sale_sum,
							       'rent'		  => $rent,
							       'marge'		  => $marge);
				$i++;
			}
			
			return $sales;
		}
	}
