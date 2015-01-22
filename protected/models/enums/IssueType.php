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
		
		$typeOptions = self::getTypeOptions ();
		
		if (isset ( $data->type_id )) {
			$type = self::toString ( $typeOptions [$data->type_id] );
			return $type;
		}
	}
	
	/**
	 * Retrieves a list of issue status
	 *
	 * @return array an array of available issue's types.
	 */
	private function getTypeOptions() {
		return self::getValidValues ();
	}
}