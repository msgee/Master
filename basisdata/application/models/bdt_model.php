<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bdt_model extends CI_Model{
	
/*Basis Data TerdistriBusi
 *Teguh Esa Putra (14111001)
 *teguh@mercubuana-yogya.ac.id*/

	public function __construct()	{
		$this->load->database();
		$server2= $this->load->database('server2', TRUE);
	}
	//query server 1 Tambah data
	public function cek_nota($codename){
			$query=$this->db->query('select codename from customers where codename="$codename"');
			return $query->result_array();
	}
	public function checkid($codename)
		{
		   $query=$this->db->get_where('customers',array('codename'=>$codename)); //check if 'id' field is existed or not
			return $query->result_array();
		  
		}
	
	public function add($codename,$flag){
		//$tanggal=date('Y-m-d');
		//INSERT INTO `database`.`customers` (`flag`, `codename`) VALUES ('0', '$codename');
		return $this->db->query("INSERT INTO `basisdata`.`customers` (`id`, `nama`, `alamat`, `ktp`, `telephone`, `gender`, `flag`, `codename`) VALUES ('', '', '', '', '', '', '$flag', '$codename')");		
		
		}
	public function tambah($data){
		$this->db->where('codename', $data['codename']);
		return $this->db->update('customers', $data);
		
		}
//===========================================================//				
	//query server 2 Tambah data
	public function cek_nota2($codename){
			$server2= $this->load->database('server2', TRUE);
			$query=$server2->query('select codename from nota where codename="$codename"');
			return $query->result_array();
	}
	
	public function checkid2($codename)
		{
		   $server2= $this->load->database('server2', TRUE);
		   $query=$server2->get_where('customers',array('codename'=>$codename)); //check if 'id' field is existed or not
			
			return $query->result_array();
		}
		
	public function add2($codename,$flag){
		//$tanggal=date('Y-m-d');
		//INSERT INTO `database`.`customers` (`flag`, `codename`) VALUES ('0', '$codename');
		return $this->db->query("INSERT INTO `basisdata`.`customers` (`id`, `nama`, `alamat`, `ktp`, `telephone`, `gender`, `flag`, `codename`) VALUES ('', '', '', '', '', '', '$flag', '$codename')");		
		
		}
	public function tambah2($data){
		$server2= $this->load->database('server2', TRUE);
		$server2->where('codename', $data['codename']);
		
		return $server2->update('customers', $data);
		
		}
//===========================================================//	
//query untuk Edit Data	Server 1	
	public function detail_data($codename = FALSE) {
	if ($codename=== FALSE)	{
		$query = $this->db->get('customers');
		return $query->result_array();
	}
	$query = $this->db->get_where('customers', array('codename' => $codename));
	return $query->row_array();
	}
	
	
//===========================================================//	
//query untuk Edit Data	Server 2
	public function detail_data2($codename = FALSE) 
	{
		$server2= $this->load->database('server2', TRUE);
		if ($codename=== FALSE)	
		{
			$query = $server2->get('customers');
			return $query->result_array();
		}
		$query = $server2->get_where('customers', array('codename' => $codename));
		return $query->row_array();
	}
	
//========================================================//

	public function hapus($codename)	{
			
		$this->db->where('codename',$codename);
		return $this->db->delete('customers');
		
		
		}
	public function hapus2($codename)	{
			
		$server2= $this->load->database('server2', TRUE);
		$server2->where('codename',$codename);
		return $server2->delete('customers');
		
		
		}
	
		
		
}