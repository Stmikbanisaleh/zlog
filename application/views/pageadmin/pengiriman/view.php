<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Pengiriman</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label>No Airway Bill</label>
								<?php
								$tahun = date('Ymd');
								$noreg = $this->db->query("SELECT
                                    RIGHT(id+1,4)AS airwaybill FROM pengiriman ORDER BY id DESC")->row();
								if (empty($noreg)) {
									$no = "1";
								} else {
									$no = $noreg->airwaybill;
								}
								?>
								<input readonly value="<?= "ZLOG" . $tahun . $no ?>" type="text" id="airwaybill" name="airwaybill" class="form-control">
							</div>

							<div class="form-group">
								<label>Nomor Surat Jalan</label>
								<input required type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor Surat Jalan">
							</div>

							<div class="form-group">
								<label>Agent</label>
								<select class="form-control select2" style="width: 100%;" name="agent" id="agent">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myagent as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Driver</label>
								<select required class="form-control select2" style="width: 100%;" name="driver" id="driver">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($mydriver as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Jalur Pengiriman</label>
								<select required class="form-control select2" style="width: 100%;" name="jalur" id="jalur">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myekspedisi as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Asuransi</label>
								<select required class="form-control select2" style="width: 100%;" name="asuransi" id="asuransi">
									<option selected="selected">-- Pilih --</option>
									<option value="0">-- Tidak --</option>
									<option value="1">-- YA --</option>
								</select>
							</div>

							<div class="form-group">
								<label>Estimate Time Departure</label>
								<input required type="datetime-local" id="tgl" name="tgl" class="form-control">
							</div>

							<div class="form-group">
								<label>Estimate Time Arrived</label>
								<input required type="datetime-local" id="tgl2" name="tgl2" class="form-control">
							</div>

							<div class="form-group">
								<label>Keterangan Tambahan</label>
								<textarea id="keterangan2" name="keterangan2" class="form-control"></textarea>
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div id="modalTambahItem" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambahItem">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Item</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<input type="hidden" id="id_pengiriman" name="id_pengiriman" class="form-control">
								<label>Nama Item</label>
								<select class="form-control select2" style="width: 100%;" name="barang" id="barang">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($mybarang as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Berat</label>
								<input required type="number" id="berat" name="berat" class="form-control" placeholder="Kilogram">
							</div>

							<div class="form-group">
								<label>Harga</label>
								<input required type="number" id="harga" name="harga" class="form-control" placeholder="Harga Pengiriman">
							</div>

							<div class="form-group">
								<label>Dimensi</label>
								<input required type="number" id="dimensi" name="dimensi" class="form-control" placeholder="Dimensi Item">
							</div>

							<div class="form-group">
								<label>Jumlah Satuan</label>
								<input required type="number" id="satuan" name="satuan" class="form-control" placeholder="Jumlah Item">
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea id="keterangan" name="keterangan" class="form-control" placeholder="Crafting / Non Crafting"></textarea>
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Jenis Pelanggan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<input type="hidden" id="id_pengiriman" name="id_pengiriman" class="form-control">
								<label>Nama Item</label>
								<select class="form-control select2" style="width: 100%;" name="e_barang" id="e_barang">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($mybarang as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Berat</label>
								<input required type="hidden" id="e_id" name="e_id" class="form-control" placeholder="Kilogram">
								<input required type="number" id="e_berat" name="e_berat" class="form-control" placeholder="Kilogram">
							</div>

							<div class="form-group">
								<label>Harga</label>
								<input required type="number" id="e_harga" name="e_harga" class="form-control" placeholder="Harga Pengiriman">
							</div>

							<div class="form-group">
								<label>Dimensi</label>
								<input required type="number" id="e_dimensi" name="e_dimensi" class="form-control" placeholder="Dimensi Item">
							</div>

							<div class="form-group">
								<label>Jumlah Satuan</label>
								<input required type="number" id="e_satuan" name="e_satuan" class="form-control" placeholder="Jumlah Item">
							</div>

							<div class="form-group">
								<label>Keterangan</label>
								<textarea id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Crafting / Non Crafting"></textarea>
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<div id="modalDetail" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formDetail">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Item</h4>
							<div class="col-sm-2">
								<button href="#modalTambahItem" id="item-tambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Item </button>
							</div>
						</div>
						<div class="card-body">
							<input required type="hidden" id="id_p" name="id_p">

							<table id="table_id2" class="table table-bordered table-hover projects">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th class="text-center">
											Nama Item
										</th>
										<th class="text-center">
											Berat (Kg)
										</th>
										<th class="text-center">
											Harga
										</th>
										<th class="text-center">
											Dimensi
										</th>
										<th class="text-center">
											Jumlah Item
										</th>
										<th style="width: 25%" class="text-center">
											Action
										</th>
									</tr>
								</thead>
								<tbody id="show_data2">
								</tbody>
							</table>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Simpan
						</button>
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Batal
						</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Pengiriman</h3>
		</div>
		<br>
		<div class="col-sm-2" >
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary" style="background-color:#509a7f ;"><a class="ace-icon fa fa-plus bigger-120"></a> Add Pengiriman</button>
		</div>
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							Airway Bill
						</th>
						<th class="text-center">
							Surat Jalan
						</th>
						<th class="text-center">
							Tujuan
						</th>
						<th class="text-center">
							Driver
						<th class="text-center">
							Jalur
						</th>
						<th class="text-center">
							Waktu Pengiriman
						</th>
						<th class="text-center">
							<i>Estimasi Arrived</i>
						</th>
						<th class="text-center">
							Keterangan
						</th>
						<th style="width: 20%" class="text-center">
							Action
						</th>
					</tr>
				</thead>
				<tbody id="show_data">
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>

<script type="text/javascript">
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true
				},

				keterangan: {
					required: true
				},
			},
			messages: {

				nama: {
					required: "Nama Jenis harus diisi!"
				},

				keterangan: {
					required: "Keterangan harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/pengiriman/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							location.reload();
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalInputFailed("Data Duplicate");
						}
					}
				});
			}
		})
	}

	if ($("#formTambahItem").length > 0) {
		$("#formTambahItem").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true
				},

				satuan: {
					required: true
				},
			},
			messages: {

				nama: {
					required: "Nama harus diisi!"
				},

				satuan: {
					required: "satuan harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/pengiriman/simpanItem') ?>",
					type: "POST",
					data: $('#formTambahItem').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambahItem").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambahItem').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalInputFailed("Data Duplicate");
						}
					}
				});
			}
		})
	}

	$('#show_data2').on('click', '.item_hapus2', function() {
		var id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/pengiriman/delete2') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				swalDeleteSuccess();
			}
		});
	})

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/pengiriman/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})


	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('administrator/pengiriman/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					if (data[i].keterangan == 0) {
						status = '    <a href="<?= base_url() . 'administrator/pengiriman/detail?id=' ?>' + data[i].id + '"" class="btn btn-danger btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-truck-loading"> </i><br>  <i>Dalam Proses Packing</i> </a>' +
							'</a> &nbsp'
					} else if (data[i].keterangan == 1) {
						status = '    <a href="<?= base_url() . 'administrator/pengiriman/detail?id=' ?>' + data[i].id + '"" class="btn btn-warning btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-truck-moving"> </i><br>  <i>Dalam Proses Pengiriman</i> </a>' +
							'</a> &nbsp'
					} else {
						status = '    <a href="<?= base_url() . 'administrator/pengiriman/detail?id=' ?>' + data[i].id + '"" class="btn btn-success btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-check-double"> </i><br>  <i>Pengiriman Selesai</i> </a>' +
							'</a> &nbsp'
					}
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].airwaybill + '</td>' +
						'<td class="text-left">' + data[i].nomor + '</td>' +
						'<td class="text-left">' + data[i].agent + '</td>' +
						'<td class="text-left">' + data[i].driver + '</td>' +
						'<td class="text-left">' + data[i].jalur + '</td>' +
						'<td class="text-left">' + data[i].tgl_pengiriman + '</td>' +
						'<td class="text-left">' + data[i].tgl_estimasi + '</td>' +
						'<td class="project-actions text-right">' +
						status +
						'</td>' +
						'<td class="project-actions text-right">' +
						'   <button  class="btn btn-secondary btn-sm"  data-id="' + data[i].id + '">' +
						'      <a href="<?php echo base_url('administrator/pengiriman/print/') ?>'+data[i].id+'" class="text-light" target="_blank"> <i class="fas fa-print"> </i>  Print </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-info btn-sm item_detail"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-eye"> </i>  Detail </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-folder"> </i>  Edit </a>' +
						'</button> &nbsp' +
						'   <button  class="btn btn-danger btn-sm item_hapus"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-trash"> </i>  Hapus </a>' +
						'</button> ' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				if (a) {
					$('#table_id').dataTable({
						"searching": true,
						"ordering": true,
						"responsive": true,
						"paging": true,
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/pengiriman/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_keterangan').val(data[0].keterangan);
			}
		});
	});

	//get data for update record
	$('#show_data').on('click', '.item_detail', function() {
		document.getElementById("formDetail").reset();
		var id = $(this).data('id');
		$('#id_p').val(id);
		$('#modalDetail').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('administrator/pengiriman/tampil_byid_pengiriman') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].barang + '</td>' +
						'<td>' + data[i].berat + '</td>' +
						'<td>' + data[i].harga + '</td>' +
						'<td>' + data[i].dimensi + '</td>' +
						'<td>' + data[i].satuan + '</td>' +
						'<td class="text-center">' +
						'<button class="btn btn-xs btn-danger item_hapus2"  data-id="' + data[i].id + '">' +
						' <i class="fas fa-trash"> </i>' +
						'</button>' +
						'</td>' +
						'</tr>';
					no++;

				}
				$("#table_id2").dataTable().fnDestroy();
				var a = $('#show_data2').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id2').dataTable({
						"bPaginate": true,
						"bLengthChange": false,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": false
					});
				}
			}
		});
	});

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true
				},

				e_keterangan: {
					required: true
				},

			},
			messages: {
				e_nama: {
					required: "Nama Jenis Pelanggan harus diisi!"
				},

				e_keterangan: {
					required: "Keterangan harus diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/pengiriman/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble();
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}

	$(document).ready(function() {
		show_data();
		$('.select2').select2();
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});

		$('#table_id2').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});

		$('#item-tambah').on('click', function() {
			$('#modalDetail').modal('hide');
			$("#id_pengiriman").val($("#id_p").val());
		});
	});
</script>
