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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pertanyaan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('admin/pertanyaan/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">ID Kategori</label>
								 <select name="id_kategori" class="form-control <?php echo form_error('id_kategori') ? 'is-invalid':'' ?>" >
								 	<option value='' selected>-pilih- </option>
								 		<?php 
								 			foreach ($id_kategori as $key => $value) {
								 				echo "<option value = '$value->id_kategori'> $value->nama_kategori</option>";
								 			}
								 		?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('id_kategori') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">ID Survey</label>
								 <select name="id_survey" class="form-control <?php echo form_error('id_survey') ? 'is-invalid':'' ?>" >
								 	<option value='' selected>-pilih- </option>
								 		<?php 
								 			foreach ($id_survey as $key => $value) {
								 				echo "<option value = '$value->id_survey'> $value->nama_survey</option>";
								 			}
								 		?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('id_survey') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Pertanyaan</label>
								<input class="form-control <?php echo form_error('pertanyaan') ? 'is-invalid':'' ?>"
								 type="text" name="pertanyaan" placeholder="Pertanyaan ?" />
								<div class="invalid-feedback">
									<?php echo form_error('pertanyaan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="text" name="tanggal" placeholder="Tanggal ?" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
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