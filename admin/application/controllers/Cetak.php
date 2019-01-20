<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
	    if(!$this->session->userdata('login')){
	      redirect('error/error_401','refresh');
	    }    
	    if (strcasecmp($this->session->userdata('user_grup'),'writer') == 0) {
	      redirect('error/error_403','refresh');      
	    }
	    $this->load->model('M_pendataan','pendataan');	    
	    $this->load->model('M_bencana','bencana');	    
	    $this->load->library('form_validation');
    	$this->form_validation->set_error_delimiters('', '');	    
	    require_once( APPPATH . 'third_party/PHPExcel.php');
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	}

	public function index()
	{    
      $data['active'] = 'blue';
      $data['js_validation']='cetak_status';
      $data['status_oranghilang'] = $this->pendataan->getStatus();
      $data['bencanaalam'] = $this->bencana->getBencanaAlam();
      $data['view'] = 'menu/cetak/index';                              
      $data['title'] = 'oranghilang. | Cetak Oranghilang';      
      $this->load->view('layout/home',$data);
  	}

  	public function validate()
  	{
  		if ($this->input->server('REQUEST_METHOD') == 'POST'){      
		    $this->form_validation->set_rules('status','Status','required');
		    $this->form_validation->set_rules('bencana_alam','Bencana Alam','required');
		    $this->form_validation->set_message($this->config->item('msg_error'));      
	    if (!$this->form_validation->run()) {
	      $data['error'] = true;
	      $data['error_msg'] = array(
	      	'status'=>form_error('status'),
	      	'bencana_alam'=>form_error('bencana_alam'),
	      );
	    }else{	    	
	    	$objPHPExcel = new \PHPExcel();
			$sheet 			= $objPHPExcel->getSheet();
			
			$user = $this->db->query("SELECT * FROM orang_hilang JOIN bencana_alam on bencana_alam.id=orang_hilang.id_bencana_alam JOIN status_org_hilang ON status_org_hilang.id=orang_hilang.id_status_org_hilang JOIN kategori_umur on kategori_umur.id=orang_hilang.id_kategori_umur JOIN jenis_kelamin on jenis_kelamin.id=orang_hilang.id_jenis_kelamin WHERE status_org_hilang.id =".$this->input->post('status')." AND id_bencana_alam = ".$this->input->post('bencana_alam')."")->result_array();
			
			$nama_bencanaalam = $this->db->query("SELECT id,nama_bencana_alam FROM bencana_alam where id = ".$this->input->post('bencana_alam')."")->row();
			$status = $this->db->query("SELECT id,nama_status_org FROM status_org_hilang where id = ".$this->input->post('status')."")->row();

			$objPHPExcel 	= new \PHPExcel();			
			$objPHPExcel 	= \PHPExcel_IOFactory::load('C:\xampp\htdocs\stiki\admin\assets\template\export-status.xlsx');
			$sheet 			= $objPHPExcel->getSheet();			

			$baris=4; 
			$start_baris 	= $baris;
			$no=1;
			date_default_timezone_set('Asia/Jakarta');
			$date = date('j F Y h:i:s A');
			if (count($user)) {
				$sheet->insertNewRowBefore($start_baris+1, count($user)-2);
				$sheet->setCellValue('B1',$nama_bencanaalam->nama_bencana_alam);
				$sheet->setCellValue('D1','Status : '.$status->nama_status_org);
				$sheet->setCellValue('F1','Update : '.$date);
				for ($i=0; $i <count($user) ;) { 
					$jenkel = $user[$i]['nama_jenis_kelamin'] ?: "-";
					$umur = $user[$i]['umur'] ?: "-";
					$nama_pelapor = $user[$i]['nama_pelapor'] ?: "-";
					$no_hp_pelapor = $user[$i]['no_hp_pelapor'] ?: "-";
					$keterangan = $user[$i]['keterangan'] ?: "-";
					$sheet->setCellValue('A'.$baris, $no++);
					$sheet->setCellValue('B'.$baris, $user[$i]['nama_lengkap']);
					$sheet->setCellValue('C'.$baris, $user[$i]['nama_panggilan']);
					$sheet->setCellValue('D'.$baris, $jenkel." / ".$umur);
					$sheet->setCellValue('E'.$baris, $user[$i]['alamat']);
					$sheet->setCellValue('F'.$baris, $nama_pelapor." / ".$no_hp_pelapor);
					$sheet->setCellValue('G'.$baris, $keterangan);
					$thin = array ();
					$thin['borders']=array();
					$thin['borders']['allborders']=array();
					$thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
					$sheet->getStyle ( 'A'.$baris.':G'.$baris.'' )->applyFromArray ($thin);
					$baris++; $i++;
				}				
				$baris--;
			}
			
			$headers = 'Ayeaye';
			$filename=$nama_bencanaalam->nama_bencana_alam.' '.$date.'.xls'; //save our workbook as this file name
		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');		    

			header('Content-Type: application/vnd.ms-excel');			
			header("Content-Disposition: attachment; filename=".$filename."");
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
			ob_start();
			$objWriter->save('php://output');
			$xlsData = ob_get_contents();
			ob_end_clean();	 
			$data['filename'] = $filename; 
			$data['file'] = "data:application/vnd.ms-excel;base64,".base64_encode($xlsData);
			$data['success']=true;

	    }	     
	    echo json_encode($data);
	  }
  	}
}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */