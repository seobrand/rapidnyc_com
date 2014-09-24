<?php

/*

Behavior created by Dustin Buss
---

Before deleting, we check if this table has a column called "deleted".  
If it does, a dateTime value is updated and the delete action is killed by returning false;
If it does not have the column, then we return true and allow the delete to continue.

Before finding records, this will filter out deleted records, unless a parameter is sent to include them:
  - showDeleted : set this parameter to show only the delete records
  - includeDeleted : set this paramater to show all records, including deleted
     - "includeDeleted" means that no filter is applied, so custom query conditions can be setup
*/


class SoftDeleteBehavior extends ModelBehavior {

	
	//TRY TO SOFT DELETE, INSTEAD OF REGULAR DELETING
	function beforeDelete(&$Model) {
		
		//check if the "deleted" column exists in our model
		if ($Model->hasField('deleted') && $Model->id) {		
			//setup deleted datestamp
			$this->deleted = date("Y-m-d H:i:s");
			//if we successfully saved to the "deleted" column, then don't delete
			if ($Model->save($this)) {
				return false;
	
			//if the save failed, then continue to do a regular delete
			} else {
				return true;
			}
		
		//if we don't have the "deleted" column, continue to do a regular delete
		} else {
			return true;
		}
	}


	
	//FILTER OUT ANY DELETED DATA FROM FIND
	function beforeFind(&$Model, $queryData) {
		//if the model has a deleted column, filter by it
		if ($Model->hasField('deleted') && $Model->id) {		
			//if "includeDeleted" was specified, then we want to show all records, so we shouldn't setup a filter
			//if it wasn't specified, then continue to setup a filter
			if (!isset($queryData['includeDeleted'])) {	
				//if "showDeleted" was specified, limit to only deleted records
				if (isset($queryData['showDeleted'])) {
					$queryData['conditions'][] = array("NOT"=>array($Model->name.".deleted"=>NULL));
				//otherwise, omit the deleted records
				} else {
					$queryData['conditions'][$Model->name.'.deleted'] = NULL;
				}
			}
		}
		//return new $queryData
		return $queryData;
	}
}