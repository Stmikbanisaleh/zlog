<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Activity</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>No Airway Bill</label>
								<select class="form-control select2" style="width: 100%;" name="airwaybill" id="airwaybill">
									<option selected="selected">-- Pilih --</option>
									<?php foreach ($myairwaybill as $value) { ?>
										<option value=<?= $value['id'] ?>><?= $value['airwaybill'] . '-' . $value['nomor']; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Photo 1</label>
								<input type="file" id="photo1" name="photo1" class="form-control">
							</div>

							<div class="form-group">
								<label>Keterangan Tambahan</label>
								<textarea id="keterangan" name="keterangan" class="form-control"></textarea>
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
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input required type="hidden" id="e_id" name="e_id">
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Jenis Pelanggan">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-cog"></i></span>
								</div>
								<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
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

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Pengiriman</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal" class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Status Pengiriman</button>
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
							Tandai Selesai
						</th>
						<th class="text-center">
							<i>Estimasi Arrived</i>
						</th>
						<th class="text-center">
							Keterangan
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
					required: "Wajib diisi!"
				},

				keterangan: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				formdata = new FormData(form);
				$.ajax({
					url: "<?php echo base_url('administrator/selesai/simpan') ?>",
					type: "POST",
					data: formdata,
					processData:false,
					contentType: false,
					cache: false,
					async: false,
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						console.log(response)
						if (response == true || response == 1) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
							location.reload();
						} else if (response == 401) {
							swalIdDouble();
						} else {
							$('#modalTambah').modal('hide');
							swalInputSuccess();
							show_data();

						}
					}
				});
			}
		})
	}

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

	$('#show_data').on('click', '.item_status', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Update Status Pengiriman!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('administrator/selesai/updatestatus') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Sukses',
							'Status Pengiriman Telah Berubah',
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
			url: '<?php echo site_url('administrator/selesai/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					var status = '';
					var tandai ='';
					if (data[i].keterangan == 0) {
						tandai = '    <button class="btn btn-danger btn-sm item_status"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-clipboard-check"> </i><br>  <i>Update Status <br> Pengiriman</i> </a>' +
							'</a> &nbsp'
						status = '      <a href="<?= base_url() . 'administrator/pengiriman/detail?id=' ?>' + data[i].id + '"" class="btn btn-danger btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-truck-loading"> </i><br>  <i>Dalam Proses Packing</i> </a>' +
							'</a> &nbsp'
					} else if (data[i].keterangan == 1) {
						tandai = '    <button class="btn btn-warning btn-sm item_status"   data-id="' + data[i].id + '">' +
							'      <i class="fas fa-clipboard-check"> </i><br>  <i>Tandai Selesai <br> Pengiriman</i> </button>' +
							'</a> &nbsp'
						status = '    <a href="<?= base_url() . 'administrator/pengiriman/detail?id=' ?>' + data[i].id + '"" class="btn btn-warning btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-truck-moving"> </i><br>  <i>Dalam Proses Pengiriman</i> </a>' +
							'</a> &nbsp'
					} else {
						tandai = '    <a href="#' + data[i].id + '"" class="btn btn-success btn-sm"  data-id="' + data[i].id + '">' +
							'      <i class="fas fa-check-double"> </i><br>  <i>Pengiriman Telah <br> Selesai</i> </a>' +
							'</a> &nbsp'
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
						'<td class="project-actions text-center">' +
						tandai+
						'</td>' +
						'<td class="text-left">' + data[i].tgl_estimasi + '</td>' +
						'<td class="project-actions text-center">' +
						status +
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
