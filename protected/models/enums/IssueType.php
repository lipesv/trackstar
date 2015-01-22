<?php

Yii::import ( "application.extensions.enums.*" );

class IssueType extends Enum {
	
	const BUG = "Bug";
	const FEATURE = "Feature";
	const TASK = "Task";
	
	/**
	 *
	 * @return string issue type 
	 */
	public static function getTypeText($data) {
		
		$typeOptions = self::getTypeOptions();
		$type = self::toString ( $typeOptions [$data->type_id] );		
		return isset ( $type ) ? $type : "unknown type ({$data->type_id})";
	}
	
	/**
	 * Retrieves a list of issue status
	 *
	 * @return array an array of available issue's types.
	 */
	private function getTypeOptions() {
		return self::getValidValues();
	}
}