  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="<?php echo base_url() . 'dashboard/index' ?>" class="brand-link">
  		<img src="<?= base_url() ?>assets/file/website/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  		<span class="brand-text font-weight-light">Dashboard</span>
  	</a>

  	<!-- Sidebar -->
  	<div class="sidebar">
  		<!-- Sidebar user panel (optional) -->
  		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  			<div class="image">
  				<img src="<?= base_url() ?>assets/file/profile/<?= $this->session->userdata('image'); ?>" class="img-circle elevation-2" alt="User Image">
  			</div>
  			<div class="info">
  				<a href="#" class="d-block"><?= $this->session->userdata('name'); ?></a>
  			</div>
  		</div>

  		<!-- Sidebar Menu -->
  		<nav class="mt-2">
  			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  				<li class="nav-item has-treeview menu-open">
  					<a href="<?php echo base_url() . 'dashboard/index' ?>" class="nav-link active">
  						<i class="nav-icon fas fa-tachometer-alt"></i>
  						<p>
  							Dashboard
  						</p>
  					</a>
  				</li>
  				<li class="nav-header">USER</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-users"></i>
  						<p>
  							Daftar User
  						</p>
  					</a>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/role'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-universal-access"></i>
  						<p>
  							Role
  						</p>
  					</a>
  				</li>
  				<li class="nav-header">PENGIRIMAN</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/pengiriman'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-truck-moving"></i>
  						<p>
  							Daftar Pengiriman
  						</p>
  					</a>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/selesai'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-truck-loading"></i>
  						<p>
  							Pengiriman Selesai
  						</p>
  					</a>
  				</li>
  				<li class="nav-header">MASTER</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-chart-pie"></i>
  						<p>
  							Master Data
  							<i class="right fas fa-angle-left"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/barang'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Barang</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/kategorigoods'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Kategori Goods</p>
  							</a>
  						</li>

  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/agent'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Agent</p>
  							</a>
  						</li>

  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/ekspedisi'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Ekspedisi</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/driver'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Driver</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-header">PENGATURAN</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-cogs"></i>
  						<p>
  							Konfigurasi
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="pages/examples/invoice.html" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Integrasi API</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/biayadimensi'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p> Biaya Dimensi </p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/biayakg'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p> Biaya Kg </p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/profile'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Profile Perusahaan</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-header">LAPORAN</li>
  				<li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-book"></i>
  						<p>
  							Jenis Laporan
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/laporanpengiriman'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Laporan Pengiriman </p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . '/dashboard/logout'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-sign-out-alt"></i>
  						<p>
  							Logout
  						</p>
  					</a>
  				</li>
  			</ul>
  		</nav>
  		<!-- /.sidebar-menu -->
  	</div>
  	<!-- /.sidebar -->
  </aside>
