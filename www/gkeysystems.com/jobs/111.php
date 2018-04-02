<?php 

	$mysql_servername 	= 'localhost';
	$mysql_username 	= 'kmng_adm';
	$mysql_password 	= 'I66l34i35P47A87r';
	$mysql_dbname 		= 'kmng_db';
	
	$mysql_link = new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);
	if ($mysql_link->connect_errno) {
		printf("Не удалось подключиться: %s\n", $mysql_link->connect_error);
		exit();
	}	
print_r('ok connected');

if (!$mysql_link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysql_link->error);
    exit();
} else {
    printf("Current character set: %s\n", $mysql_link->character_set_name());
}

// ----------------------------------------------------------------------------
// 			Table Test.CASHES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`CASHES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` VARCHAR(8)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fNEXTNUMIN` VARCHAR(12)  NOT NULL,
			  `fNEXTNUMOUT` VARCHAR(12)  NOT NULL,
			  `fNEXTMTBILLNUM` VARCHAR(12)  NOT NULL,
			  `fDEFAULT` TINYINT(1) NOT NULL,
			  `fECRCRN` VARCHAR(12)  NOT NULL,
			  `fECRIP` VARCHAR(15)  NOT NULL,
			  `fECRPORT` CHAR(5) NOT NULL,
			  `fECRPASSWORD` VARCHAR(255)  NOT NULL,
			  `fECRDEPWITHVAT` VARCHAR(20)  NOT NULL,
			  `fECRDEPWITHOUTVAT` VARCHAR(20)  NOT NULL,
			  `fECRPRINTMODE` CHAR(1) NOT NULL,
			  INDEX `PK_CASHES` (`fCODE` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
//print_r($result);	
// ----------------------------------------------------------------------------
// 			Table Test.CURR
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`CURR` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCUR` CHAR(3)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fUNITNAME` VARCHAR(10)  NOT NULL,
			  `fCENTNAME` VARCHAR(10)  NOT NULL,
			  INDEX `PK_CURR` (`fCUR` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	
// ----------------------------------------------------------------------------
// 			Table Test.DOCUMENTS
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`DOCUMENTS` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fISN` VARCHAR(64)   NOT NULL,
			  `fDATE` DATETIME NOT NULL,
			  `fORDERNUM` INT NOT NULL DEFAULT 0,
			  `fDOCTYPE` TINYINT UNSIGNED NOT NULL,
			  `fDOCSTATE` TINYINT UNSIGNED NOT NULL,
			  `fDOCNUM` VARCHAR(12)  NOT NULL,
			  `fCUR` CHAR(3)  NOT NULL,
			  `fSUMM` DECIMAL(19,4) NOT NULL,
			  `fSTORAGE` CHAR(3)  NOT NULL,
			  `fINFO` VARCHAR(50)  NOT NULL,
			  `fCOMMENT` VARCHAR(255)  NOT NULL,
			  `fBASEISN` VARCHAR(64)   NULL,
			  `fUSERID` SMALLINT NOT NULL,
			  `fPARTID` INT NOT NULL,
			  `fCRPARTID` INT NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fEMPLID` INT NOT NULL,
			  `fVATTYPE` CHAR(1) NOT NULL,
			  `fSPEC` VARCHAR(100)  NOT NULL,
			  `fEXPTYPE` CHAR(1) NOT NULL,
			  `fINVN` VARCHAR(20)  NOT NULL,
			  `fINVDATE` DATETIME NULL,
			  `fBODY` LONGTEXT  NOT NULL,
			  `fCHANGEDATE` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  INDEX `I_DATE` (`fDATE` ASC),
			  INDEX `I_DOCNUM` (`fDOCNUM` ASC),
			  INDEX `I_ORDERNUM` (`fDATE` ASC, `fORDERNUM` ASC),
			  INDEX `I_PARTID` (`fPARTID` ASC),
			  INDEX `I_fBASEISN` (`fBASEISN` ASC),
			  INDEX `PK_DOCUMENTS` (`fISN` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.EMPLOYEES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`EMPLOYEES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fEMPLID` INT NOT NULL,
			  `fEMPLCODE` VARCHAR(12)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fADDRESS` VARCHAR(50)  NOT NULL,
			  `fPHONE` VARCHAR(50)  NOT NULL,
			  `fPASSPORT` VARCHAR(25)  NOT NULL,
			  `fISSALESCONSULTANT` TINYINT(1) NOT NULL,
			  INDEX `I_EMPLCODE` (`fEMPLCODE` ASC),
			  INDEX `PK_EMPLOYEES` (`fEMPLID` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
			  


// ----------------------------------------------------------------------------
// 			Table Test.MTGROUP
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`MTGROUP` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` CHAR(5)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fPATH` VARCHAR(48)  NOT NULL,
			  `fPARENT` CHAR(5)  NOT NULL,
			  INDEX `I_MTGROUP1` (`fPATH` ASC),
			  INDEX `I_MTGROUP2` (`fPARENT` ASC),
			  INDEX `PK_MTGROUP` (`fCODE` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}




	
// ----------------------------------------------------------------------------
// 			Table Test.MTQNTUNITS
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`MTQNTUNITS` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fQNTUNIT` CHAR(3)  NOT NULL,
			  `fCOEF` DECIMAL(19,4) NOT NULL,
			  `fBARCODE` VARCHAR(20)  NOT NULL,
			  `fIMAGE` LONGBLOB NULL,
			  INDEX `I_BARCODE` (`fBARCODE` ASC),
			  INDEX `PK_MTQNTUNITS` (`fMTID` ASC, `fQNTUNIT` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	

	
// ----------------------------------------------------------------------------
// 			Table Test.PARTNERS
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`PARTNERS` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fPARTID` INT NOT NULL,
			  `fPARTCODE` VARCHAR(8)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fFULLCAPTION` VARCHAR(255)  NOT NULL,
			  `fTYPE` CHAR(5)  NOT NULL,
			  `fSETTLACC` VARCHAR(22)  NOT NULL,
			  `fTAXCODE` VARCHAR(20)  NOT NULL,
			  `fADDRESS` VARCHAR(50)  NOT NULL,
			  `fBUSINESSADDRESS` VARCHAR(50)  NOT NULL,
			  `fPHONE` VARCHAR(50)  NOT NULL,
			  `fMANAGERPOST` VARCHAR(32)  NOT NULL,
			  `fMANAGERFIO` VARCHAR(50)  NOT NULL,
			  `fCHIEFACCPOST` VARCHAR(32)  NOT NULL,
			  `fCHIEFACCFIO` VARCHAR(50)  NOT NULL,
			  `fPARTSTATEREGISTER` VARCHAR(32)  NOT NULL,
			  `fPASSPORT` VARCHAR(32)  NOT NULL,
			  `fMAINAIM` VARCHAR(50)  NOT NULL,
			  `fNEXTCONTRACT` CHAR(3)  NOT NULL,
			  `fSUPPLIER` TINYINT(1) NOT NULL,
			  `fCUSTOMER` TINYINT(1) NOT NULL,
			  INDEX `I_PARTCODE` (`fPARTCODE` ASC),
			  INDEX `I_SETLLACC` (`fSETTLACC` ASC),
			  INDEX `PK_PARTNERS` (`fPARTID` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	
// ----------------------------------------------------------------------------
// 			Table Test.PARTTYPE
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`PARTTYPE` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` CHAR(5)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fPATH` VARCHAR(48)  NOT NULL,
			  `fPARENT` CHAR(5)  NOT NULL,
			  INDEX `I_PARTTYPE1` (`fPATH` ASC),
			  INDEX `I_PARTTYPE2` (`fPARENT` ASC),
			  INDEX `PK_PARTTYPE` (`fCODE` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	
// ----------------------------------------------------------------------------
// 			Table Test.PRICES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`PRICES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fPRICETYPE` CHAR(2)  NOT NULL,
			  `fUNIT` CHAR(3)  NOT NULL,
			  `fDATE` DATETIME NOT NULL,
			  `fCUR` CHAR(3)  NOT NULL,
			  `fPRICE` DECIMAL(19,4) NOT NULL,
			  INDEX `I_PRICE` (`fPRICETYPE` ASC, `fMTID` ASC, `fUNIT` ASC, `fDATE` ASC),
			  INDEX `PK_PRICES` (`fMTID` ASC, `fPRICETYPE` ASC, `fUNIT` ASC, `fDATE` ASC),
			  CONSTRAINT `FK_PRICE_fCUR`
				FOREIGN KEY (`fCUR`)
				REFERENCES `" . $mysql_dbname . "`.`CURR` (`fCUR`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	
// ----------------------------------------------------------------------------
// 			Table Test.PRICETYPES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`PRICETYPES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` CHAR(2)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fCUR` CHAR(3)  NOT NULL,
			  `fROUND` CHAR(4)  NOT NULL,
			  `fVAT` TINYINT(1) NOT NULL,
			  INDEX `PK_PRICETYPES` (`fCODE` ASC),
			  CONSTRAINT `FK_PRICETYPES_fCUR`
				FOREIGN KEY (`fCUR`)
				REFERENCES `" . $mysql_dbname . "`.`CURR` (`fCUR`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.QNTUNIT
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`QNTUNIT` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` CHAR(3)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fBRIEF` CHAR(6)  NOT NULL,
			  `fFRACTION` TINYINT(1) NOT NULL,
			  `fUNITID` SMALLINT NOT NULL,
			  INDEX `PK_QNTUNIT` (`fCODE` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.STORAGE
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`STORAGE` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fCODE` CHAR(3)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fRESPONS` VARCHAR(50)  NOT NULL,
			  `fADDRESS` VARCHAR(50)  NOT NULL,
			  `fRETAIL` TINYINT(1) NOT NULL,
			  `fDEFAULT` TINYINT(1) NOT NULL,
			  INDEX `PK_STORAGE` (`fCODE` ASC))";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.MATERIALS
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`MATERIALS` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fMTCODE` VARCHAR(20)  NOT NULL,
			  `fCAPTION` VARCHAR(50)  NOT NULL,
			  `fFULLCAPTION` VARCHAR(255)  NOT NULL,
			  `fTYPE` CHAR(1) NOT NULL,
			  `fGROUP` CHAR(5)  NOT NULL,
			  `fUNIT` CHAR(3)  NOT NULL,
			  `fALTUNIT` CHAR(3)  NOT NULL,
			  `fEXPMETHOD` CHAR(1) NOT NULL,
			  `fSHOW` TINYINT(1) NOT NULL,
			  `fISWEIGHT` TINYINT(1) NOT NULL,
			  `fDESCR` VARCHAR(255)  NOT NULL DEFAULT '',
			  `fCOUNTRY` CHAR(3)  NOT NULL DEFAULT '',
			  `fPRODUCER` CHAR(4)  NOT NULL DEFAULT '',
			  `fPROPERTY1` CHAR(4)  NOT NULL DEFAULT '',
			  `fPROPERTY2` CHAR(4)  NOT NULL DEFAULT '',
			  `fMINQTY` DECIMAL(19,4) NOT NULL,
			  `fEXTRA` DECIMAL(10,4) NOT NULL,
			  `fVAT` TINYINT(1) NOT NULL,
			  INDEX `I_MATERIALS1` (`fMTCODE` ASC),
			  INDEX `PK_MATERIALS` (`fMTID` ASC),
			  CONSTRAINT `FK_MATERIALS_fUNIT`
				FOREIGN KEY (`fUNIT`)
				REFERENCES `" . $mysql_dbname . "`.`QNTUNIT` (`fCODE`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION,
			  CONSTRAINT `FK_MATERIALS_fALTUNIT`
				FOREIGN KEY (`fALTUNIT`)
				REFERENCES `" . $mysql_dbname . "`.`QNTUNIT` (`fCODE`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION);";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.PARTIES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`PARTIES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fPARTYBASE` VARCHAR(64)   NULL,
			  `fPARTYROW` INT NOT NULL,
			  `fINCOMEDATE` DATETIME NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fPARTID` INT NOT NULL,
			  `fCONTRACT` CHAR(3)  NOT NULL,
			  `fGLOBALPARTYBASE` VARCHAR(64)   NULL,
			  `fGLOBALPARTYROW` INT NOT NULL,
			  `fTRANS` INT NOT NULL,
			  `fEXPMETHOD` CHAR(1) NOT NULL,
			  `fUSEABLEDATE` DATETIME NULL,
			  `fCOUNTRY` CHAR(3)  NOT NULL DEFAULT '',
			  `fPRODUCER` CHAR(4)  NOT NULL DEFAULT '',
			  `fPROPERTY1` CHAR(4)  NOT NULL DEFAULT '',
			  `fPROPERTY2` CHAR(4)  NOT NULL DEFAULT '',
			  INDEX `I_PARTIES1` (`fMTID` ASC, `fINCOMEDATE` ASC),
			  INDEX `PK_PARTIES` (`fPARTYBASE` ASC, `fPARTYROW` ASC),
			  CONSTRAINT `FK_PARTIES_fMTID`
				FOREIGN KEY (`fMTID`)
				REFERENCES `" . $mysql_dbname . "`.`MATERIALS` (`fMTID`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.MTHI
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`MTHI` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fPARTYBASE` VARCHAR(64)   NULL,
			  `fPARTYROW` INT NOT NULL,
			  `fDATE` DATETIME NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fSTORAGE` CHAR(3)  NOT NULL,
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
				REFERENCES `" . $mysql_dbname . "`.`MATERIALS` (`fMTID`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION,
			  CONSTRAINT `FK_MTHI_fSTORAGE`
				FOREIGN KEY (`fSTORAGE`)
				REFERENCES `" . $mysql_dbname . "`.`STORAGE` (`fCODE`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION,
			  CONSTRAINT `FK_MTHI_PARTY`
				FOREIGN KEY (`fPARTYBASE` , `fPARTYROW`)
				REFERENCES `" . $mysql_dbname . "`.`PARTIES` (`fPARTYBASE` , `fPARTYROW`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.MTINCOMELIST
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`MTINCOMELIST` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fISN` VARCHAR(64)   NOT NULL,
			  `fROWNUM` SMALLINT NOT NULL,
			  `fMTID` INT NOT NULL,
			  `fUNIT` CHAR(3)  NOT NULL,
			  `fQUANTITY` DECIMAL(19,4) NOT NULL,
			  `fPRICE` DECIMAL(19,4) NOT NULL,
			  `fSUMMA` DECIMAL(19,4) NOT NULL,
			  `fEXTRAPERCENT` DECIMAL(10,4) NOT NULL,
			  `fSALEPRICE` DECIMAL(19,4) NOT NULL,
			  `fSALESUMMA` DECIMAL(19,4) NOT NULL,
			  `fVAT` TINYINT(1) NOT NULL,
			  `fUSELIFE` DATETIME NULL,
			  `fCOUNTRY` CHAR(3)  NOT NULL,
			  `fPRODUCER` CHAR(4)  NOT NULL,
			  `fPROPERTY1` CHAR(4)  NOT NULL,
			  `fPROPERTY2` CHAR(4)  NOT NULL,
			  `fROWID` INT NOT NULL,
			  INDEX `PK_MTINCOMELIST` (`fISN` ASC, `fROWID` ASC),
			  CONSTRAINT `FK_MTINCOMELIST_fMTID`
				FOREIGN KEY (`fMTID`)
				REFERENCES `" . $mysql_dbname . "`.`MATERIALS` (`fMTID`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION,
			  CONSTRAINT `FK_MTINCOMELIST_fUNIT`
				FOREIGN KEY (`fUNIT`)
				REFERENCES `" . $mysql_dbname . "`.`QNTUNIT` (`fCODE`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}

// ----------------------------------------------------------------------------
// 			Table Test.SALES
// ----------------------------------------------------------------------------
	$query = "CREATE TABLE IF NOT EXISTS `" . $mysql_dbname . "`.`SALES` (
			  `SITEUSER_ID` INT NOT NULL,
			  `EXP_PROG_ID` INT NOT NULL,
			  `fPARTYBASE` VARCHAR(64)   NULL,
			  `fPARTYROW` INT NOT NULL,
			  `fDATE` DATETIME NOT NULL,
			  `fITEMTYPE` CHAR(1) NOT NULL,
			  `fITEMID` INT NOT NULL,
			  `fSTORAGE` CHAR(3)  NOT NULL,
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
			  `fCONTRACT` CHAR(3)  NOT NULL,
			  `fDOCTYPE` TINYINT UNSIGNED NOT NULL,
			  `fDBCR` TINYINT(1) NOT NULL,
			  `fROWID` INT NOT NULL,
			  `fTRANS` INT NOT NULL,
			  INDEX `I_SALES1` (`fITEMTYPE` ASC, `fITEMID` ASC, `fDATE` ASC),
			  INDEX `I_SALES2` (`fBASE` ASC, `fROWID` ASC),
			  CONSTRAINT `FK_SALES_fITEMID`
				FOREIGN KEY (`fITEMID`)
				REFERENCES `" . $mysql_dbname . "`.`MATERIALS` (`fMTID`)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION)";
	if (mysqli_query($mysql_link, $query) === TRUE)
	{
		$result = "OK";
	}
	else
	{
		$result = "Error: " . mysqli_error($mysql_link);
		return $result;
	}
	
	
	
	
	
	$query = "SELECT `id`
					FROM `users`";
	$result = mysqli_query($mysql_link, $query);
	
	$site_user_id = 0;
	if (mysqli_affected_rows($mysql_link) > 0)
	{
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			print_r($row);
			$site_user_id = $row['id'];
			$exp_prog_id  = 2;
			
			$mssql_link = odbc_connect("ServerDSN","sa","SaSa111");
			
			
// ----------------------------------------------------------------------------
// 			Table Test.CASHES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `CASHES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);

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
				mysqli_query($mysql_link, $query);

			}

// ----------------------------------------------------------------------------
// 			Table Test.CURR
// ----------------------------------------------------------------------------
			$query="DELETE FROM `CURR` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.DOCUMENTS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `DOCUMENTS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
		
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
            echo "<br>";
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
				
                //echo "\n";
                //echo mb_detect_encoding(odbc_result($result,'fINFO'), "auto");
                //$row['fINFO'] = iconv('UTF-8', 'ASCII' , 'Կարեն');
                //$row['fINFO'] = iconv(mb_detect_encoding(odbc_result($result,'fINFO'), mb_detect_order(), true), "UTF-8", odbc_result($result,'fINFO'));
                //$row['fINFO'] = iconv('ASCII', 'UTF-8', odbc_result($result,'fINFO'));
               // echo "\n";
                //echo mb_detect_encoding($row['fINFO'], "auto");
               // echo $row['fINFO'];
                
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
                mysqli_query($mysql_link, $query);
			}
           
// ----------------------------------------------------------------------------
// 			Table Test.EMPLOYEES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `EMPLOYEES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}
// ----------------------------------------------------------------------------
// 			Table Test.QNTUNIT
// ----------------------------------------------------------------------------
			$query="DELETE FROM `QNTUNIT` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}	
// ----------------------------------------------------------------------------
// 			Table Test.MATERIALS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MATERIALS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTGROUP
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTGROUP` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTHI
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTHI` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTINCOMELIST
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTINCOMELIST` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.MTQNTUNITS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `MTQNTUNITS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTIES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTIES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTNERS
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTNERS` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PARTTYPE
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PARTTYPE` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PRICES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PRICES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.PRICETYPES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `PRICETYPES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}


// ----------------------------------------------------------------------------
// 			Table Test.SALES
// ----------------------------------------------------------------------------
			$query="DELETE FROM `SALES` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}

// ----------------------------------------------------------------------------
// 			Table Test.STORAGE
// ----------------------------------------------------------------------------
			$query="DELETE FROM `STORAGE` 
						WHERE `SITEUSER_ID` = '" . $site_user_id . "' AND 
							  `EXP_PROG_ID` = '" . $exp_prog_id . "';";
            mysqli_query($mysql_link, $query);
			
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
                mysqli_query($mysql_link, $query);
			}
		}
	}
	
	
?>