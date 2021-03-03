			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title">Master Barang</h3>
									<div class="card-tools">
										<a href="#" class="btn btn-tool btn-sm">
											<i class="fas fa-download"></i>
										</a>
										<a href="#" class="btn btn-tool btn-sm">
											<i class="fas fa-bars"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Nama Barang</th>
												<th>Kategori</th>
												<th>Satuan</th>
												<th>More</th>
											</tr>
										</thead>
										<tbody>
											<?php $items = $this->db->query("select a.nama ,b.nama as kategori, a.satuan from barang a join kategorigoods b on a.kategorigoods = b.id")->result_array();
											foreach ($items as $value) { ?>
												<tr>
													<td>
														<img src="<?= base_url() ?>/assets/adminlte/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
														<?= $value['nama'] ?>
													</td>
													<td><?= $value['kategori'] ?></td>
													<td>
														<?= $value['satuan']; ?>
													</td>
													<td>
														<a href="<?php echo base_url() . '/administrator/barang'; ?>" class="text-muted">
															<i class="fas fa-search"></i>
														</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.card -->

							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Jumlah Pengiriman Barang</h3>
										<a href="javascript:void(0);">View Report</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">820</span>
											<span>Jumlah Pengiriman</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 12.5%
											</span>
											<span class="text-muted">Sejak Minggu terakhir</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="visitors-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square text-primary"></i> Minggu Ini
										</span>

										<span>
											<i class="fas fa-square text-gray"></i> Minggu Kemarin
										</span>
									</div>
								</div>
							</div>
						</div>
						<!-- /.col-md-6 -->
						<div class="col-lg-6">
							<!-- TABLE: LATEST ORDERS -->
							<div class="card">
								<div class="card-header border-transparent">
									<h3 class="card-title">Latest Orders</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<div class="table-responsive">
										<table class="table m-0">
											<thead>
												<tr>
													<th>Airway Bill</th>
													<th>Surat Jalan</th>
													<th>Vendor</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php $listPengiriman = $this->db->query("select a.id,a.airwaybill, a.nomor, a.keterangan, b.nama as agent, c.nama as driver from pengiriman a
												 join agent b on a.agent = b.id
												 join driver c on a.driver = c.id order by a.createdAt desc limit 10")->result_array();
												foreach ($listPengiriman as $value) {
												?>
													<tr>
														<td><a href="<?php echo base_url() . '/administrator/pengiriman/detail?id=' . $value['id']; ?>"><?= $value['airwaybill']; ?></a></td>
														<td><?= $value['nomor']; ?></td>
														<td>
															<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $value['agent'] ?></div>
														</td>
														<?php if ($value['keterangan'] == 0) { ?>
															<td><span class="badge badge-danger">Packing</span></td>
														<?php } else if ($value['keterangan'] == 1) { ?>
															<td><span class="badge badge-warning">Shipped</span></td>
														<?php } else { ?>
															<td><span class="badge badge-success">Delivered</span></td>
														<?php } ?>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
									<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
									<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
								</div>
								<!-- /.card-footer -->
							</div>
							<!-- /.card -->
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Pengiriman Berdasarkan Goods</h3>
										<a href="javascript:void(0);">View Report</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">Rp. 18.230.000</span>
											<span>Total Pendapatan</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 33.1%
											</span>
											<span class="text-muted">Since last month</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="sales-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square text-primary"></i> DG
										</span>

										<span>
											<i class="fas fa-square text-gray"></i> NONDG
										</span>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col-md-6 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
