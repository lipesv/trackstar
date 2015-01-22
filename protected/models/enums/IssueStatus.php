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
		
		if (isset ( $data->status_id )) {
			$status = self::toString ( $statusOptions [$data->status_id] );
			return $status;
		}
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