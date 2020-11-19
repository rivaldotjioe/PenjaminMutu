<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="style/css/materialize.min.css" type="text/css">
<link rel="stylesheet" href="style/css/materialize.css" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="style/js/materialize.js"></script>
<script src="style/js/materialize.min.js"></script>
<script type = "text/javascript"
src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
<script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
<script>
	$(document).ready(function() {
		$('select').material_select();
         });
</script>
<body>
	
	 <div class="container">
	 <div class="row">
		 <div class="center">
    <div class="col s12 m12">
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title"><h4><strong>Form Rekognisi Dosen</strong></h4></span>
        </div>
		  </div>
       <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content white-text">
			<div class="row">
				
	 <!--<p>Ini Form Nama Lembaga</p> -->			
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="nama_dosen" type="text" class="validate">
          <label for="nama_dosen">Nama Dosen</label>
        </div>
		   <!--<p>Ini Form Nama Kegiatan</p> -->
        <div class="input-field col s6">
          <input id="bidang_keahlian" type="text" class="validate">
          <label for="bidang_keahlian">Bidang Keahlian</label>
        </div>
      </div>
		
		 <!--<p>Ini Form Nama Rekognisi  </p> -->
      <div class="row">
        <div class="input-field col s6">
          <input id="nama_rekognisi" type="text" class="validate">
          <label for="nama_rekognisi">Nama Rekognisi</label>
  </div>

		   <!--<p>Ini Selected Form Tingkat </p> -->
		<div class="input-field col s3">
    <select id="tingkat">
      <option value="" disabled selected>Pilih Tingkat </option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Tingkat</label>
  </div>
		  
		   <!--<p>Ini Selected Form Tahun  </p> -->
		<div class="input-field col s3">
    <select id="tahun">
      <option value="" disabled selected>Pilih Tahun</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Tahun</label>
  </div>
      </div>
		
		 <!--<p>Ini Textarea Form Keterangan Rekognisi </p> -->
    <div class="row">
        <div class="input-field col s12">
          <textarea id="keterangan_rekognisi" class="materialize-textarea"></textarea>
          <label for="keterangan_rekognisi">Keterangan Rekognisi</label>
        </div>
	</div>
  
      
		 <!--<p>Ini Form Input Multiple Form </p> -->
		
      <div class="row">
        <div class="input-field col s12">
          <form action="#">
    <div class="file-field input-field">
      <div class="btn">
        <span>Tambah File</span>
        <input type="file" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload satu atau lebih Bukti Rekognisi">
      </div>
    </div>
  </form>
        </div>
      </div>
			
			<!--<p>Ini Tombol Submit </p> -->
		<div align="right" class="input-field col s11">
      <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
      </div> 
    </form>
      </div>
      </div>
    </div>
  </div>
     </div>
    </div>
  </div>          
     </div>
  </div> 
        

  
    
       
</body>
</html>