<?php namespace PhpFanatic\Cakemarketing;
/**
 * Base API
 *
 * @author   Nick White <git@phpfanatic.com>
 * @link     https://github.com/PHPfanatic/cakemarketing
 * @version  1.0.0
 */

use PhpFanatic\Cakemarketing\AbstractBaseApi;

abstract class AbstractTrack extends AbstractBaseApi
{
	/**
	 * 
	 * @param array $data
	 */
	public function UpdateConversion($data) {
		$function = '/4/track.asmx/UpdateConversion';
		
		$fields_required = array(
				'offer_id',
				'conversion_id',
				'request_session_id',
				'transaction_id',
				'payout',
				'add_to_existing_payout',
				'received',
				'received_option',
				'disposition_type',
				'disposition_id',
				'update_revshare_payout',
				'effective_date_option',
				'custom_date',
				'note_to_append',
				'disallow_on_billing_status'
		);
		
		if(!array_diff_key($field_required, $data)) {
			throw new Exception('Missing required fields.');
		}
		
		$this->BuildUri($data, $function);
		$xml = $this->SendRequest();
		
		return $xml;
	}
}