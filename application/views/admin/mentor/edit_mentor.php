<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/mentor/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/mentor/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id_mentor" value="<?php echo $mentor->id_mentor?>" />

							<div class="form-group">
								<label for="name">Nama Mentor</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="NAMA" value="<?php echo $mentor->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">NIP</label>
								<input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>"
								 type="text" name="nip" placeholder="NIP" value="<?php echo $mentor->nip ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jabatan</label>
								<input class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>"
								 type="text" name="jabatan" placeholder="JABATAN" value="<?php echo $mentor->jabatan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jabatan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="email"  name="email" placeholder="EMAIL" value="<?php echo $mentor->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">NO HP</label>
								<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								 type="text" name="no_hp" placeholder="NO HP" value="<?php echo $mentor->no_hp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('no_hp') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Status</label>
								<select class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" name="status"
								value="<?php echo $mentor->status ?>" >
									<option ><?php echo $mentor->status ?></option>  
									<option >Mentor 1</option>  
 									<option >Mentor 2</option> 
									
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
			
							</div>
							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>