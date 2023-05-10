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
	public function get_weather()
	{
		$this->load->config('weather');
		$api_key = $this->config->item('WEATHER_API_KEY');
		$city = $this->input->post('city');
		$url = 'https://api.openweathermap.org/data/2.5/weather?q='. urlencode($city).'&appid=' . $api_key;
		$response = file_get_contents($url);
		$weather_data = json_decode($response,);
	    $data = array('weather_data' => $weather_data);
		echo json_encode($data);
	}
}
?>
