<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*Basis Data TerdistriBusi
 *Teguh Esa Putra (14111001)
 *teguh@mercubuana-yogya.ac.id*/

class Home extends CI_Controller {
	public function __construct()	{
		parent::__construct();
		$this->load->model('bdt_model');
		session_start();
	}

//Tampilan Untuk Menu
	public function index()
	{
		$this->load->view('menu');
		
	}
//form Input
	public function input(){
	
			$this->load->view('home/home');
		
		
		}
//fungsi Tambah Data dan seleksi server		
	public function add(){
		$codename=$_POST['codename'];
		
		if ((is_string($codename)) && (strlen($codename) == 6)) 
		{				
			//potong angka server
			$angkaserver = substr($codename,0,1);
			
			//validasi lagi angka server sudah benar ape belom!
			if(($angkaserver==1) || ($angkaserver==2))
			{
				$data['ids']=$angkaserver;
				$data['codename']=$codename;
				$this->load->view('home/home2',$data);
			}
			

		}
		else {
				echo ('mohon Input Data Dengan Benar. ');
			 echo anchor ('home','MENU');
				}
		
		}
//fungsi Validasi Data input		
		public function validasidata($ids=FALSE,$codename=FALSE){
	
		//$data['codename']=$codename;
		if($ids==1)
		{
		$data['codename']=$codename;
		$cekid=$this->bdt_model->checkid($codename);
		

		if(count ($cekid) !=null)  // id found stop
		   {
				//$server="Terhubungg Dengan Server 1";	
				echo (' Terhubung dengan Server 1. Mohon Maaf Data Sudah ada silahkan input kembali. '); 
				
				echo anchor ('home/input','   INPUT DATA ');
		   }
           
		   else // id not found continue..
		   {
			//$server="Terhubungg Dengan Server 1";
			   $aksi=$this->bdt_model->add($codename,1);
				if($aksi)
					{
						//$server=	
						$data['codename']=$this->bdt_model->detail_data();
						$data['detail']=$this->bdt_model->detail_data($codename);
						$data['codename']=$codename;
						$data['server']="Terhubungg Dengan Server 1";
						$this->load->view('server/edit_server',$data);

					}          
		   }    
			
		}
		elseif($ids==2)
		{
			
			$cekid=$this->bdt_model->checkid2($codename);
			$data['codename']=$codename;
			if(count ($cekid)!=null)  // id found stop
		   	{
				$server="Terhubungg Dengan Server 2";
				echo ('Terhubung dengan Server 2. Mohon Maaf Data Sudah ada silahkan input kembali '); 
				
				echo anchor ('home/input','Input Data');
		   	}
           
		  	else // id not found continue..
		   {
			// $server="Terhubungg Dengan Server 2"; 
			   $aksi=$this->bdt_model->add2($codename,1);
				if($aksi)
					{
						$data['codename']=$this->bdt_model->detail_data2();
						$data['detail']=$this->bdt_model->detail_data2($codename);
						$data['codename']=$codename;
						$data['server']="Terhubungg Dengan Server 2";
						$this->load->view('server/edit_server2',$data);

					}    
		   }    	
		
		}
		
		}
		public function tambah($codename){
				//$data['nota']=$this->bdt_model->detail_data();
				$data['detail']=$this->bdt_model->detail_data($codename);
				$flag='0';
				$data['codename']=$codename;
				$tanggal=date('Y-m-d');
				$data = array(
							'nama'	=> $this->input->post('nama'),
							'alamat'	=> $this->input->post('alamat'),
							'ktp' =>$this->input->post('ktp'),
							'telephone' =>$this->input->post('telephone'),
							'gender'=>$this->input->post('gender'),
							'flag'=>"$flag",
							'codename' 	=> $codename,
							
						);
				
				$this->bdt_model->tambah($data);
				$this->load->view('home/notif');
			
			}
			public function tambah2($codename){
				//$data['nota']=$this->bdt_model->detail_data();
				$data['detail']=$this->bdt_model->detail_data2($codename);
				$flag='0';
				$data['codename']=$codename;
				$tanggal=date('Y-m-d');
				$data = array(
							'nama'	=> $this->input->post('nama'),
							'alamat'	=> $this->input->post('alamat'),
							'ktp' =>$this->input->post('ktp'),
							'telephone' =>$this->input->post('telephone'),
							'gender'=>$this->input->post('gender'),
							'flag'=>"$flag",
							'codename' 	=> $codename,
							
						);
				
				$this->bdt_model->tambah($data);
				$this->load->view('home/notif');
			}
		
//FUngsi Untuk Edit Data		
	public function edit(){
		
			$this->load->view('edit/edit');

		}
		
	public function up(){
		$codename=$_POST['codename'];
		
		if ((is_string($codename)) && (strlen($codename) == 6)) 
		{				
			//potong angka server
			$angkaserver = substr($codename,0,1);
			
			//validasi lagi angka server sudah benar ape belom!
			if(($angkaserver==1) || ($angkaserver==2))
			{
				$data['ids']=$angkaserver;
				$data['codename']=$codename;
				$this->load->view('edit/edit2',$data);
			}

		}
		
		else {
				echo ('mohon Input Data Dengan Benar. ');
			 echo anchor ('home','MENU');
				}
		}
	public function validasi($ids=FALSE,$codename=FALSE){
		
		if($ids==1)
		{
		
		$cekid=$this->bdt_model->checkid($codename);
			
		if(count ($cekid)!=null)  // id found stop
		   {
			
			$data=array(
					'detail' 	=> $this->bdt_model->detail_data($codename),
					
					'nama'	=> $this->bdt_model->detail_data(),
					'alamat' =>$this->bdt_model->detail_data(),
					'telephone'	=> $this->bdt_model->detail_data(),
					'gender'	=> $this->bdt_model->detail_data(),
					'ktp'	=> $this->bdt_model->detail_data(),
					
					'server'=>"Terhubung Dengan Server 1",
					);
		
				
			$this->load->view('edit/edit3',$data); 
				
		   }
           
		   else // id not found continue..
		   {
			 echo ('Terkoneksi Dengang Server 1. Mohon Maaf Data belum tersedia Mohon Input Data Terlebih Dahulu');
			 echo ('--->>>>');	
			 echo anchor ('home/home/input','Input Data'); 
			 
		   }    
			
		}
		elseif($ids==2)
		{
		
		$cekid=$this->bdt_model->checkid2($codename);
			
		if(count ($cekid)!=null)  // id found stop
		   {
				
			$data=array(
					'detail' 	=> $this->bdt_model->detail_data2($codename),
					'nota' =>$this->bdt_model->detail_data2(),
					'nama'	=> $this->bdt_model->detail_data2(),
					'jml'	=> $this->bdt_model->detail_data2(),
					'tanggal'	=> $this->bdt_model->detail_data2(),
					'total'	=> $this->bdt_model->detail_data2(),
					'server'=>"Terhubung Dengan Server 2",
					);
			
			$this->load->view('edit/edit4',$data); 
		   }
           
		   else // id not found continue..
		   {
			 echo ('Data belum Data Mohon Input Data Terlebih Dahulu');
			 echo anchor ('home/home/input','Input Data');
			}          
		  }    	
		
		
	}
	
	public function edit_aksi($codename=FALSE, $ids=FALSE){
		
				$data['detail']=$this->bdt_model->detail_data($codename);
				$data['nota']=$codename;
				
				$data = array(
							'nama'	=> $this->input->post('nama'),
							'alamat'	=> $this->input->post('alamat'),
							'ktp' =>$this->input->post('ktp'),
							'telephone' =>$this->input->post('telephone'),
							'gender'=>$this->input->post('gender'),
							
							'codename' 	=> $codename,
							
						);
				
				$this->bdt_model->tambah($data);
			$this->load->view('edit/notif');
		
		}	
		public function edit_aksi2($codename=FALSE, $ids=FALSE){
		
				$data['detail']=$this->bdt_model->detail_data2($codename);
				$data['nota']=$codename;
				//$tanggal=date('Y-m-d');
				$data = array(
							'nama'	=> $this->input->post('nama'),
							'alamat'	=> $this->input->post('alamat'),
							'ktp' =>$this->input->post('ktp'),
							'telephone' =>$this->input->post('telephone'),
							'gender'=>$this->input->post('gender'),
							
							'codename' 	=> $codename,
							
						);
				
				$this->bdt_model->tambah2($data);
				$this->load->view('edit/notif');
		
		}
	//===========================================================================//
	//========================= Fungsi Haps ====================================// Belum jadi Lnjut nanti
	
	public function hapus(){
			$this->load->view('hapus/hapus');

		}
	
	public function valid_server(){
		$codename=$_POST['codename'];
		
		if ((is_string($codename)) && (strlen($codename) == 6)) 
		{				
			//potong angka server
			$angkaserver = substr($codename,0,1);
			
			//validasi lagi angka server sudah benar ape belom!
			if(($angkaserver==1) || ($angkaserver==2))
			{
				$data['ids']=$angkaserver;
				$data['codename']=$codename;
				$this->load->view('hapus/aksi',$data);
			}
			

		}
	}
	public function validasihapus($ids=FALSE,$codename=FALSE){
	
		//$data['codename']=$codename;
		if($ids==1)
		{
		$data['codename']=$codename;
		$cekid=$this->bdt_model->checkid($codename);
		

		if(count ($cekid) !=null)  // id found stop
		   {
				//$server="Terhubungg Dengan Server 1";	
				echo (' Terhubung dengan Server 1. Yakin akan Menghapus data ?. '); 
				
				echo anchor ('home/aksi_hapus/'.$codename,'   Hapus DATA ');
		   }
           
		   else // id not found continue..
		   {
			echo ('Data belum Data Mohon Input Data Terlebih Dahulu');
			 echo anchor ('home/home/input','Input Data');
		   }    
			
		}
		elseif($ids==2)
		{
			
			$cekid=$this->bdt_model->checkid2($codename);
			$data['codename']=$codename;
			if(count ($cekid)!=null)  // id found stop
		   	{
					
				echo (' Terhubung dengan Server 2. Yakin akan Menghapus data ?. '); 
				
				echo anchor ('home/aksi_hapus2/'.$codename,'   Hapus DATA ');
		   	}
           
		  	else // id not found continue..
		   {
			
			   echo ('Data belum Data Mohon Input Data Terlebih Dahulu');
			 echo anchor ('home/home/input','Input Data');
		   }    	
		
		}
		}
		public function aksi_hapus($codename){
				//$codename=$_POST['codename'];
				$this->bdt_model->hapus($codename);
			//redirect ('home','refresh');
			
			}
		public function aksi_hapus2($codename){
				//$codename=$_POST['codename'];
				$this->bdt_model->hapus2($codename);
				$this->load->view('hapus/notif');
			//redirect(base_url().'/berita');
			
			}
				
}

