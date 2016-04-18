<?php echo $server; ?>
<p> 
Mohon Update Data Dengan Benar.
<p>
<p>
<p>
<h2 align="center"> UPDATE DATA</h2>
<!--No. Nota : <?php// echo $nota; ?>-->
<p align="center"><form enctype="multipart/form-data" name="form1" method="post" action="<?php echo base_url();?>index.php/home/edit_aksi/<?php echo $detail['codename'];?>" class="myform">
		  <p><label for="codename">Codename</label>
	    <input name="codename" type="text" id="judul" size="70" value="<?php echo $detail['codename']; ?>" disabled="disabled">
      </p>

		<p>
        <label for="name">Name : </label>
        <input id="name" type="text" name="nama" value="<?php echo $detail['nama']; ?>" placeholder="Name" />
		<p>
       <label for="address">Alamat : </label>
        <input id="address" type="text" name="alamat" value="<?php echo $detail['alamat']; ?>" placeholder="Name" />
		<p>
        <label for="identity">Identity ID : </label>
        <input id="identity" type="text" name="ktp"  value="<?php echo $detail['ktp']; ?>" placeholder="No Identitas" />
		<p>
        <label for="phone">Phone : </label>
        <input id="Phone" type="text" name="telephone"  value="<?php echo $detail['telephone']; ?>"  placeholder="telephone" />
	<p>
        <div class="input-field col s12">
          <label for="gender">Gender : </label>
          <select id="gender" name="gender" class="input-field col s12">
            <option value="1">Pria</option>
            <option value="2">Wanita</option>
          </select>
        </div>
        <p>
        <input type="submit" name="submit" id="submit" value="Submit">
	    <input type="reset" name="submit2" id="submit2" value="Reset">
      </form>
  </body>
  
  