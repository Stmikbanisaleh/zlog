<section class="content">
	<div id="modalEdit" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formEdit">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Edit Profile Perusahaan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input required type="hidden" id="e_id" name="e_id" >
								<input required type="text" id="e_nama_perusahaan" name="e_nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
							</div>

							<div class="form-group">
								<label>Telp 1</label>
								<input type="text" id="e_telp1" name="e_telp1" class="form-control" placeholder="Telp 1">
							</div>

							<div class="form-group">
								<label>Telp 2</label>
								<input type="text" id="e_telp2" name="e_telp2" class="form-control" placeholder="Telp 2">
							</div>

							<div class="form-group">
								<label>Kabupaten</label>
								<input type="text" id="e_kabupaten" name="e_kabupaten" class="form-control" placeholder="Kabupaten">
							</div>
						
							<div class="form-group">
								<label>Kecamatan</label>
								<input type="text" id="e_kecamatan" name="e_kecamatan" class="form-control" placeholder="Kecamatan">
							</div>

							<div class="form-group">
								<label>Kode Pos</label>
								<input type="text" id="e_kode_pos" name="e_kode_pos" class="form-control" placeholder="Kode Pos">
							</div>

							<div class="form-group">
								<label>Nama Jalan</label>
								<input type="text" id="e_nama_jalan" name="e_nama_jalan" class="form-control" placeholder="Alamat / Jalan">
							</div>

							<div class="form-group">
								<label>Footer 1</label>
								<input type="text" id="e_footer1" name="e_footer1" class="form-control" placeholder="Footer 1">
							</div>

							<div class="form-group">
								<label>Footer 2</label>
								<input type="text" id="e_footer2" name="e_footer2" class="form-control" placeholder="Footer 2">
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
			<h3 class="card-title"><?= $page_name; ?></h3>
		</div>
		<br>
		<!-- <div class="col-sm-2">
			<button href="#modalTambah" type="button" role="button" data-toggle="modal"
			 class="btn btn-block btn-primary"><a class="ace-icon fa fa-plus bigger-120"></a> Add Role</button>
		</div> -->
		<br>
		<div class="card-body p-0">
			<table id="table_id" class="table table-bordered table-hover projects">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th class="text-center">
							Nama Perusahaan
						</th>
						<th class="text-center">
							Telp 1
						</th>
						<th class="text-center">
							Telp 2
						</th>
						<th class="text-center">
							Kabupaten
						</th>
						<th class="text-center">
							Kecamatan
						</th>
						<th class="text-center">
							Kode Pos
						</th>
						<th class="text-center">
							Nama Jalan
						</th>
						<th class="text-center">
							Footer 1
						</th>
						<th class="text-center">
							Footer 2
						</th>
						<th  class="text-center">
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
					required: "Wajib diisi!"
				},

				keterangan: {
					required: "Wajib diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/profile/simpan') ?>",
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
					url: "<?php echo base_url('administrator/profile/delete') ?>",
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
			url: '<?php echo site_url('administrator/profile/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-left">' + no + '</td>' +
						'<td class="text-left">' + data[i].nama_perusahaan + '</td>' +
						'<td class="text-left">'+  data[i].no_telp1 +'</td>' +
						'<td class="text-left">'+  data[i].no_telp2 +'</td>' +
						'<td class="text-left">' + data[i].kabupaten + '</td>' +
						'<td class="text-left">' + data[i].kecamatan + '</td>' +
						'<td class="text-left">' + data[i].kode_pos + '</td>' +
						'<td class="text-left">' + data[i].nama_jalan + '</td>' +
						'<td class="text-left">' + data[i].kata_footer1 + '</td>' +
						'<td class="text-left">' + data[i].kata_footer2 + '</td>' +
						'<td class="project-actions text-right">' +
						'   <button  class="btn btn-primary btn-sm item_edit"  data-id="' + data[i].id + '">' +
						'      <i class="fas fa-folder"> </i>  Edit </a>' +
						'</button> &nbsp' +
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
			url: "<?php echo base_url('administrator/profile/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama_perusahaan').val(data[0].nama_perusahaan);
				$('#e_telp1').val(data[0].no_telp1);
				$('#e_telp2').val(data[0].no_telp2);
				$('#e_footer1').val(data[0].kata_footer1);
				$('#e_footer2').val(data[0].kata_footer2);
				$('#e_kabupaten').val(data[0].kabupaten);
				$('#e_kecamatan').val(data[0].kecamatan);
				$('#e_kode_pos').val(data[0].kode_pos);
				$('#e_nama_jalan').val(data[0].nama_jalan);

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
                    url: "<?php echo base_url('administrator/profile/update') ?>",
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
