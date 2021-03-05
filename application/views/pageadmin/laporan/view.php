<section class="content">
	<div id="modalTambah" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" role="form" id="formTambah">
					<div class="card card-info">
						<div class="modal-header">
							<h4 class="modal-title">Pilih Periode Pengiriman</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Periode Awal</label>
								<input required type="date" id="awal" name="awal" class="form-control" placeholder="Kategori Goods">
							</div>

							<div class="form-group">
								<label>Periode Akhir</label>
								<input required type="date" id="akhir" name="akhir" class="form-control" placeholder="Kategori Goods">
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer">
						<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
							<i class="ace-icon fa fa-save"></i>
							Cetak
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
			<h3 class="card-title">Laporan Pengiriman</h3>
		</div>
		<br>
		<form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>administrator/laporanpengiriman/laporanpengiriman">
			<div class="card card-info">
				<div class="modal-header">
					<h4 class="modal-title">Pilih Periode Pengiriman</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Periode Awal</label>
						<input required type="date" id="awal" name="awal" class="form-control">
					</div>

					<div class="form-group">
						<label>Periode Akhir</label>
						<input required type="date" id="akhir" name="akhir" class="form-control">
					</div>

					<div class="form-group">
						<label>Status Pengiriman</label>
						<select class="form-control select2" style="width: 100%;" name="status" id="status">
							<option value="10" selected="selected">-- Semua --</option>
							<option value="0">-- Proses Packing --</option>
							<option value="1">-- Proses Pengiriman --</option>
							<option value="2">-- Delivered / Selesai --</option>
						</select>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Cetak
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
		</form>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>

<script type="text/javascript">
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('administrator/laporanpengiriman/laporanpengiriman') ?>",
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


	$(document).ready(function() {
		$('#table_id').DataTable({
			"searching": true,
			"ordering": true,
			"responsive": true,
			"paging": true,
		});
	});
</script>
