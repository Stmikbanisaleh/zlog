      <!-- Default box -->
      <div class="card">
      	<div class="card-header">
      		<h3 class="card-title"><?= $page_name ?></h3>

      		<div class="card-tools">
      			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      				<i class="fas fa-minus"></i></button>
      			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      				<i class="fas fa-times"></i></button>
      		</div>
      	</div>
      	<div class="card-body">
      		<div class="row">
      			<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
      				<div class="row">
      					<div class="col-12 col-sm-4">
      						<div class="info-box bg-light">
      							<div class="info-box-content">
      								<span class="info-box-text text-center text-muted">#</span>
      								<span class="info-box-number text-center text-muted mb-0">#</span>
      							</div>
      						</div>
      					</div>
      					<div class="col-12 col-sm-4">
      						<div class="info-box bg-light">
      							<div class="info-box-content">
      								<span class="info-box-text text-center text-muted">Total Item Barang</span>
      								<span class="info-box-number text-center text-muted mb-0"><?php $totalitem = $this->db->query("select sum(satuan) as total from pengiriman_detail where id_pengiriman =$id")->result_array(); ?>
      									<?= $totalitem[0]['total'] ?> (item)</span>
      							</div>
      						</div>
      					</div>
      					<div class="col-12 col-sm-4">
      						<div class="info-box bg-light">
      							<div class="info-box-content">
      								<span class="info-box-text text-center text-muted">Estimasi Pengiriman</span>
      								<span class="info-box-number text-center text-muted mb-0"><?= $estimasi_day ?> Hari <span>
      							</div>
      						</div>
      					</div>
      				</div>
      				<div class="row">
      					<div class="col-12">
      						<h4>Recent Activity</h4>

      						<?php
								$activity = $this->db->query("select * from pengiriman_detail_transport where id_pengiriman = $id")->result_array();
								foreach ($activity as $value) { ?>
      							<div class="post">
      								<div class="user-block">
      									<img class="img-circle img-bordered-sm" src="<?= base_url() ?>assets/adminlte/dist/img/user2-160x160.jpg" alt="user image">
      									<span class="username">
      										<a href="#">PT Z log</a>
      									</span>
      									<span class="description">Di update pada - <?= $value['waktu_update'] ?></span>
      								</div>
      								<!-- /.user-block -->
      								<p>
      									<?= $value['keterangan']; ?>
      								</p>
      								<?php if ($value['file'] != null) {
										?>
      									<p>
      										<a href="<?php echo base_url().'assets/file/photo/'.$value['file']?>" target="_blank" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Download Lampiran</a>
      									</p>
      								<?php } ?>
      							</div>
      						<?php } ?>
      					</div>
      				</div>
      			</div>
      			<div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
      				<h3 class="text-primary"><i class="fas fa-paint-brush"></i> Keterangan</h3>
      				<p class="text-muted"><?= $keterangan; ?></p>
      				<br>
      				<?php
						$agent = $this->db->query("select b.nama, b.telp, b.alamat , b.pj 
					from pengiriman a join agent b on a.agent = b.id where a.id = $id ")->result_array();
						foreach ($agent as $value) { ?>
      					<div class="text-muted">
      						<p class="text-sm">Client Company
      							<b class="d-block"><?= $value['nama'] ?></b>
      							<?= $value['alamat']; ?> <br>
      							<?= $value['telp']; ?>
      						</p>
      						<p class="text-sm">Penanggung Jawab
      							<b class="d-block"><?= $value['pj'] ?></b>

      						</p>
      					</div>
      				<?php } ?>
      				<h5 class="mt-5 text-muted">List Barang</h5>
      				<ul class="list-unstyled">
      					<?php $listItem = $this->db->query("select a.nama , a.satuan, b.satuan as jml , b.berat from barang a join pengiriman_detail b
						  on a.id = b.barang where b.id_pengiriman = $id")->result_array();
							foreach ($listItem as $value) { ?>
      						<li>
      							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> <?= $value['nama'] ?> (<?= $value['jml'] ?>)</a>
      						</li>
      					<?php } ?>
      				</ul>
      				<div class="text-center mt-5 mb-3">
      					<a href="#" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Print Surat Jalan</a>
      				</div>
      			</div>
      		</div>
      	</div>
      	<!-- /.card-body -->
      </div>
      <!-- /.card -->
