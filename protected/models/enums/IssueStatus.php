<?php

Yii::import ( "application.extensions.enums.*" );

class IssueStatus extends Enum {
	
	const NOT_YET_STARTED = "Not Yet Started";
	const STARTED = "Started";
	const FINISHED = "Finished";
	
	/**
	 *
	 * @return string issue status
	 */
	public static function getStatusText($data) {
		
		$statusOptions = self::getStatusOptions ();
		$status = self::toString ( $statusOptions [$data->status_id] );
		
		return isset ( $status ) ? $status : "unknown status ({$data->status_id})";
	}
	
	/**
	 * Retrieves a list of issue types
	 *
	 * @return array an array of available issue's status.
	 */
	private function getStatusOptions() {
		return self::getValidValues ();
	}
}