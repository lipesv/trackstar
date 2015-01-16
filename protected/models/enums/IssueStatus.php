<?php

class IssueStatus {
	
	const STATUS_NOT_YET_STARTED = 0;
	const STATUS_STARTED = 1;
	const STATUS_FINISHED = 2;
	
	/**
	 * Retrieves a list of issue status
	 *
	 * @return array an array of available issue status.
	 *        
	 */
	public static function getStatusOptions() {
		return array (
				self::STATUS_NOT_YET_STARTED => 'Not yet started',
				self::STATUS_STARTED => 'Started',
				self::STATUS_FINISHED => 'Finished' 
		);
	}
	
	/**
	 * Retrieves a list of allowed status
	 *
	 * @return array an array of allowed status.
	 *        
	 */
	public static function getAllowedStatusRange() {
		return array (
				self::STATUS_NOT_YET_STARTED,
				self::STATUS_STARTED,
				self::STATUS_FINISHED 
		);
	}
	
	/**
	 *
	 * @return string the status text display for the current issue
	 */
	public static function getStatusText() {
		$statusOptions = $this->getStatusOptions ();
		return isset ( $statusOptions [$this->status_id] ) ? $statusOptions [$this->status_id] : "unknown status ({$this->status_id})";
	}
}