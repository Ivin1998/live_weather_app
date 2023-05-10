<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('view');
	}
	public function get_status()
	{	
		$pnr =$_GET['pnr'];
		$url = 'https://real-time-pnr-status-api-for-indian-railways.p.rapidapi.com/indianrail/'.$pnr;
		$this->load->library('Guzzleclient');

		$client = new \GuzzleHttp\Client();
		
		$response = $client->request('GET', $url , [
			'headers' => [
				'X-RapidAPI-Host' => 'real-time-pnr-status-api-for-indian-railways.p.rapidapi.com',
				'X-RapidAPI-Key' => 'f0142f16e1mshda4b3ea0f466ffcp186bc5jsna333d3538d57',
			],
		]);
		
	echo $response->getBody();

	}
}
?>
