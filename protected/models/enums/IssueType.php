<?php

class IssueType {

	const TYPE_BUG = 0;
	const TYPE_FEATURE = 1;
	const TYPE_TASK = 2;
	
	/**
	 * Retrieves a list of issue types
	 *
	 * @return array an array of available issue types.
	 *        
	 */
	public static function getTypeOptions() {
		return array (
				self::TYPE_BUG => 'Bug',
				self::TYPE_FEATURE => 'Feature',
				self::TYPE_TASK => 'Task' 
		);
	}
	
	/**
	 * Retrieves a list of allowed types
	 *
	 * @return array an array of allowed types.
	 *        
	 */
	public static function getAllowedTypeRange() {
		return array (
				self::Bug,
				self::Feature,
				self::Task 
		);
	}
	
	
	/**
	 *
	 * @return string the type text display for the current issue
	 */
	public function getTypeText() {
		$typeOptions = $this->getTypeOptions();
		return isset ( $typeOptions [$this->type_id] ) ? $typeOptions [$this->type_id] : "unknown type ({$this->type_id})";
	}
}