<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Add Agent</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama Agent">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-shield"></i></span>
								</div>
								<input required type="text" id="pj" name="pj" class="form-control" placeholder="Nama Penanggung Jawab">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone"></i></span>
								</div>
								<input required type="text" id="telp" name="telp" class="form-control" placeholder="Telp">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-label"></i></span>
								</div>
								<input required type="text" id="kodepos" name="kodepos" class="form-control" placeholder="Kode Pos">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-cog"></i></span>
								</div>
								<textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-home"></i></span>
								</div>
								<textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
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
							<h4 class="modal-title">Edit Agent</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input  type="hidden" id="e_id" name="e_id" class="form-control" >
								<input required type="text" id="e_nama" name="e_nama" class="form-control" placeholder="Nama Agent">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-shield"></i></span>
								</div>
								<input required type="text" id="e_pj" name="e_pj" class="form-control" placeholder="Nama Penanggung Jawab">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone"></i></span>
								</div>
								<input required type="text" id="e_telp" name="e_telp" class="form-control" placeholder="Telp">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-label"></i></span>
								</div>
								<input required type="text" id="e_kodepos" name="e_kodepos" class="form-control" placeholder="Kode Pos">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-cog"></i></span>
								</div>
								<textarea type="text" id="e_keterangan" name="e_keterangan" class="form-control" placeholder="Keterangan"></textarea>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-home"></i></span>
								</div>
								<textarea type="text" id="e_alamat" name="e_alamat" class="form-control" placeholder="Alamat"></textarea>
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

	<!-- Default box -->

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daftar Agent</h3>
		</div>
		<br>
		<div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal"
			 class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Agent</button>
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
							Nama Agent
						</th>
						<th class="text-center">
							Penanggung Jawab
						</th>
						<th class="text-center">
							Telp
						</th>
						<th class="text-center">
							Kode Pos
						</th>
						<th class="text-center">
							Keterangan
						</th>
						<th class="text-center">
							Alamat
						</th>
						<th style="width: 15%" class="text-center">
							Actions
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
					required: "Nama Jenis IP harus diisi!"
				},

				keterangan: {
					required: "Keterangan harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/agent/simpan') ?>",
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
					url: "<?php echo base_url('administrator/agent/delete') ?>",
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
			url: '<?php echo site_url('administrator/agent/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama + '</td>' +
						'<td class="text-left">' + data[i].pj + '</td>' +
						'<td class="text-left">' + data[i].telp + '</td>' +
						'<td class="text-left">' + data[i].kodepos + '</td>' +
						'<td class="text-left">' + data[i].keterangan + '</td>' +
						'<td class="text-left">' + data[i].alamat + '</td>' +
						'<td class="project-actions text-right">' +
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
				//                    $('#mydata').dataTable();
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
			url: "<?php echo base_url('administrator/agent/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].nama);
				$('#e_alamat').val(data[0].alamat);
				$('#e_telp').val(data[0].telp);
				$('#e_kodepos').val(data[0].kodepos);
				$('#e_pj').val(data[0].pj);
				$('#e_keterangan').val(data[0].keterangan);
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
					required: "Wajib diisi!"
				},

				e_keterangan: {
					required: "Wajib diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/agent/update') ?>",
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
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
