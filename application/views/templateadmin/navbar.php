 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#509a7f ;">
 	<!-- Left navbar links -->
 	<ul class="navbar-nav">
 		<li class="nav-item">
 			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
 		</li>
 		<li class="nav-item d-none d-sm-inline-block">
 			<a href="<?php echo base_url() . 'dashboard/index' ?>" class="nav-link">Home</a>
 		</li>
 	</ul>

 	<!-- SEARCH FORM -->
 	<form class="form-inline ml-3">
 		<div class="input-group input-group-sm">
 			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
 			<div class="input-group-append">
 				<button class="btn btn-navbar" type="submit">
 					<i class="fas fa-search"></i>
 				</button>
 			</div>
 		</div>
 	</form>

 	<!-- Right navbar links -->
 	<ul class="navbar-nav ml-auto">
 		<!-- Notifications Dropdown Menu -->
 		<li class="nav-item dropdown">
 			<a class="nav-link" data-toggle="dropdown" href="#">
 				<i class="far fa-bell"></i>
 				<span class="badge badge-danger navbar-badge count"></span>
 			</a>
 			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notif">
 			</div>
 		</li>
 		<li class="nav-item dropdown">
 			<a class="nav-link" data-toggle="dropdown" href="#">
 				<i class="far fa-user-circle"></i> Profile
 			</a>
 			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
 				<div class="dropdown-divider"></div>
 				<a href="#" class="dropdown-item">
 					<i class="fas fa-user"></i> Profile
 					<span class="float-right text-muted text-sm">Edit Profile</span>
 				</a>
 				<div class="dropdown-divider"></div>
 				<button href="#modalPassword" class="dropdown-item " type="button" role="button" data-toggle="modal">
 					<i class="fas fa-key"></i> Password Settings
 					<span class="float-right text-muted text-sm"> Password</span>
 				</button>
 				<div class="dropdown-divider"></div>
 				<a href="<?php echo base_url() . '/dashboard/logout'; ?>" class="dropdown-item">
 					<i class="fas fa-sign-out-alt"></i> Logout
 					<span class="float-right text-muted text-sm"></span>
 				</a>
 				<div class="dropdown-divider"></div>
 			</div>
 		</li>
 	</ul>
 </nav>
 <!-- /.navbar -->

 <section class="content">
 	<div id="modalPassword" class="modal fade" tabindex="-1">
 		<div class="modal-dialog modal-lg">
 			<div class="modal-content">
 				<form class="form-horizontal" role="form" id="formEditPassword">
 					<div class="card card-info">
 						<div class="modal-header">
 							<h4 class="modal-title">Edit Password</h4>
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 								<span aria-hidden="true">&times;</span>
 							</button>
 						</div>
 						<div class="card-body">
 							<div class="input-group mb-3">
 								<div class="input-group-prepend">
 									<span class="input-group-text"><i class="fas fa-key"></i></span>
 								</div>
 								<input type="password" id="password" name="password" class="form-control" placeholder="Password">
 							</div>

 							<div class="input-group mb-3">
 								<div class="input-group-prepend">
 									<span class="input-group-text"><i class="fas fa-key"></i></span>
 								</div>
 								<input type="password" id="passwordconfirm" name="passwordconfirm" class="form-control" placeholder="Password Confirm">
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
 </section>

 <script type="text/javascript">
 	if ($("#formEditPassword").length > 0) {
 		$("#formEditPassword").validate({
 			submitHandler: function(form) {
 				$('#btn_edit').html('Sending..');
 				$.ajax({
 					url: "<?php echo base_url('administrator/customer/updatepassword') ?>",
 					type: "POST",
 					data: $('#formEditPassword').serialize(),
 					dataType: "json",
 					success: function(response) {
 						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
 							'Ubah');
 						if (response == true) {
 							document.getElementById("formEditPassword").reset();
 							swalEditSuccess();
 							$('#modalPassword').modal('hide');
 						} else if (response == 400) {
 							passwordNotMatch();
 						} else {
 							swalEditFailed();
 						}
 					}
 				});
 			}
 		})
 	}

 	$(document).ready(function() {
 		function load_unseen_notification(view = '') {
 			$.ajax({
 				url:  "<?php echo base_url('administrator/customer/notification') ?>",
 				method: "POST",
 				data: {
 					view: view
 				},
 				dataType: "json",
 				success: function(data) {
 					$('.notif').html(data.notification);
 					if (data.unseen_notification > 0) {
 						// $('.count').html(data.unseen_notification);
 						$('.count').html('');

 					}
 				}
 			});
 		}
 		load_unseen_notification();

 		$(document).on('click', '.nav-item dropdown', function() {
 			$('.count').html('');
 			load_unseen_notification('yes');
 		});

 		setInterval(function() {
 			load_unseen_notification();;
 		}, 50000);

 	});
 </script>
