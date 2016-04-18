<h2>Validasi Input Data</h2>
					<div>OK, Nomer Data yang dimasukan benar</div>

<h3> No_Nota : <?php echo $id_nota; ?> </h3>
<?php 
	echo anchor ('home/validasi_hapus/'.$ids.'/'.$id_nota,'Hapus Data');
	
?>
<p align="center"> <?php echo anchor ('home','MENU'); ?>