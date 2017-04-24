<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/TempsReel.php');

class Path extends CI_Controller {

	public function index() {
		global $data;

		// URL
		$ch = curl_init("https://data.explore.star.fr/api/v2/catalog/datasets/tco-bus-circulation-passages-tr/records?rows=10000&pretty=false&timezone=UTC");

		// curl params
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// call
		$response = json_decode(curl_exec($ch));
		$data['response'] = $response;
		curl_close($ch);

		// processing
		$tr = TempsReel::from($response);
		$data['records'] = $tr->records;

		$res = $tr->trajet_meme_ligne("1374", "1378");
		if ($res == null) {
			//$res = "Aucun trajet trouvé";
		} else {

		}
		$data['result'] = $res;

		$this->load->view('path', $data);
	}
}
