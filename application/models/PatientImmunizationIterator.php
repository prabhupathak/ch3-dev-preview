<?php
/*****************************************************************************
*       PatientImmunizationIterator.php
*
*       Author:  ClearHealth Inc. (www.clear-health.com)        2009
*       
*       ClearHealth(TM), HealthCloud(TM), WebVista(TM) and their 
*       respective logos, icons, and terms are registered trademarks 
*       of ClearHealth Inc.
*
*       Though this software is open source you MAY NOT use our 
*       trademarks, graphics, logos and icons without explicit permission. 
*       Derivitive works MUST NOT be primarily identified using our 
*       trademarks, though statements such as "Based on ClearHealth(TM) 
*       Technology" or "incoporating ClearHealth(TM) source code" 
*       are permissible.
*
*       This file is licensed under the GPL V3, you can find
*       a copy of that license by visiting:
*       http://www.fsf.org/licensing/licenses/gpl.html
*       
*****************************************************************************/


class PatientImmunizationIterator extends WebVista_Model_ORMIterator implements Iterator {

	public function __construct($dbSelect = null) {
		parent::__construct("PatientImmunization",$dbSelect);
	}

	public function setFilter(Array $filter) {
		$db = Zend_Registry::get('dbAdapter');
		$dbSelect = $db->select()
			       ->from("patientImmunizations",array('code','dateAdministered','lot','route','site','series','reaction','immunization','patientReported','comment'))
			       ->where("patientId = ?", $filter['patientId']);
		//trigger_error($dbSelect->__toString(),E_USER_NOTICE);
		$this->_dbSelect = $dbSelect;
		$this->_dbStmt = $db->query($this->_dbSelect);
	}
}
