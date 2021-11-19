<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form id="form-opac"> -->
						
						<div class="row">
							<div class="col-sm-4">
								<table class="table table-striped">
									
									<tr>
										<td>Judul</td>
										<td>:</td>
										<td>
											<!-- <input type="text" name="judul_opac" class="form-control" placeholder="Masukkan Judul"> -->
											<textarea  rows="4" name="judul_opac" id="judul_opac" class="form-control" ></textarea>
										</td>
									</tr>
									
									
								</table>
							</div>
							<div class="col-sm-4">
								<table class="table table-striped">
									
                                    <tr>
										<td>Subyek</td>
										<td>:</td>
										<td>
											<select class="form-control select2" name="subyek_opac" id="subyek_opac" style="width: 100%;">
												<option></option>
												<?php
													foreach ($kategori as $dataKategori) {
														# code...
														echo '
															<option value="'.$dataKategori->id_kategori.'">'.$dataKategori->nama_kategori.'</option>
														';
													}
												?>
											</select>
											
										</td>
									</tr>
									<tr>
										<td>Penerbit</td>
										<td>:</td>
										<td>
											<input type="text"  placeholder="Masukkan Penerbit" name="penerbit_opac" id="penerbit_opac" class="form-control">
										</td>
									</tr>

                                   
								</table>
							</div>

                            <div class="col-sm-4">
								<table class="table table-striped">
									
                                    <tr>
										<td>Pengarang</td>
										<td>:</td>
										<td>
											<input type="text"  placeholder="Masukkan Nama Pengarang" name="pengarang_opac" id="pengarang_opac" class="form-control">
										</td>
									</tr>
                                    <tr>
										<td>Tahun Terbit</td>
										<td>:</td>
										<td>
											<input type="number"  placeholder="Masukkan tahun Terbit" name="tahun_terbit_opac" id="tahun_terbit_opac" class="form-control">
										</td>
									</tr>
								</table>
								<div class="pull-right">
									<button  id="cari_opac" class="btn btn-primary btn-md">Cari</button> 
								</div>
								
							</div>

							
						</div>

                            
                        
                    <!-- </form> -->

					
          </div>

		  	<div class="row">
				<div class="tampilData"></div>

			</div>
    </div>
</section>
</div>


<script>
	$(document).ready(function() {
	
		$('#cari_opac').click(function(){
			var judul 		= $('#judul_opac').val();
			var subyek 		= $('#subyek_opac').val();
			var penerbit	= $('#penerbit_opac').val();
			var pengarang	= $('#pengarang_opac').val();
			var tahun_terbit= $('#tahun_terbit_opac').val();
			$.ajax({
                url : "<?php echo base_url();?>data/opacProses",
                type: "POST",
                data : {judul:judul, subyek:subyek, penerbit:penerbit, pengarang:pengarang, tahun_terbit:tahun_terbit},
                dataType: "JSON",
                success: function(data)
                {
					console.log(data)
					tampil = '';
					for(x=0; x<data.length; x++){
						
						tampil += '<div class="col-md-3">';
						tampil += '<div class="box box-primary">';
						tampil += '<div class="box-body box-profile">';					
						tampil += '<ul class="list-group list-group-unbordered">';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Kode Buku</b> <div class="pull-right"><b>'+data[x].buku_id+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Subyek</b> <div class="pull-right"><b>'+data[x].nama_kategori+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Penerbit</b> <div class="pull-right"><b>'+data[x].penerbit+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Tahun</b> <div class="pull-right"><b>'+data[x].thn_buku+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>ISBN</b> <div class="pull-right"><b>'+data[x].isbn+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Pengarang</b> <div class="pull-right"><b>'+data[x].pengarang+'</b></div>';
						tampil += '</li>';
						tampil += '<li class="list-group-item">';
						tampil += '<b>Lampiran</b> <a href="<?php echo base_url() ?>/assets_style/image/buku/'+data[x].lampiran+'" class="pull-right"><b>'+(data[x].lampiran?data[x].lampiran:'')+'</b></a>';
						tampil += '</li>';
						tampil += '</ul>';
						tampil += '</div>';
						tampil += '</div>';
						tampil += '</div>';
						
					}

					$('.tampilData').html(tampil);
					
					
				}
			})
			
		});


  
  });
</script>
