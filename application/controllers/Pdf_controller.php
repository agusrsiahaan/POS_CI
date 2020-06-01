<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf_controller extends CI_Controller {
	public function index($id)
	{
		$this->load->model('model_products');
		$data['data'] = $this->model_products->pdf($id);
		
		ob_start();
		$content = $this->load->view('data',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf/html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A6', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Struk Kasir"'.$id.'".pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
		
	}
	
	public function cetak()
	{
		$this->load->model('model_products');
		$data['data'] = $this->model_products->pdfall();
		
		ob_start();
		$content = $this->load->view('data',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf/html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A6', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Struk_Kasir.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
}