<?php
include "../layout/top.php";
include "../../Controller/genre_select.php";	
?>
<div class="pagetitle">
	<h1>Movies</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Movies</li>
		</ol>
	</nav>
</div><!-- End Page Title -->
<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<button type="button" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#basicModal">
						Add Movie
					</button>
				</div>
				<div class="card-body">
					<h5 class="card-title">Movie List</h5>
					<!-- Table with stripped rows -->
					<table class="table datatable">
						<thead>
							<tr>
								<th scope="col" >#</th>
								<th scope="col">Image</th>
								<th scope="col">Title</th>
								<th scope="col">Actor</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php include '../../Controller/movie_read.php';?>
						</tbody>
					</table>
					<!-- End Table with stripped rows -->
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="basicModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Basic Modal</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" action="../../Controller/movie_create.php" enctype="multipart/form-data">

					<div class="row">
						<div class="col-6">
							<label for="title">Title:</label>
							<input class="form-control" type="text" id="title" name="title" required><br>
						</div>
						<div class="col-6">
							<label for="cast">Cast:</label>
							<input class="form-control" type="text" id="cast" name="cast" required><br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="director">Director:</label>
							<input class="form-control" type="text" id="director" name="director" required><br>
						</div>
				        <div class="col-6">
            <label for="img_path">Image:</label>
            <input class="form-control" type="file" id="img_path" name="img_path" accept="image/png, image/gif, image/jpeg" required><br>
        </div>
					</div>
					<!-- Genre select field -->
					<div class="row">
		        <div class="col-6">
            <label for="genre">Genre:</label>
            <select id="genre" name="genre[]" class="form-control" multiple required>
                <?php foreach ($genres as $genre) { ?>
                    <option value="<?php echo $genre['id']; ?>"><?php echo $genre['genreType']; ?></option>
                <?php } ?>
            </select><br>
        </div>
						<!-- Contact number field -->
						<div class="col-6">
							<label for="yourEmail" class="form-label">Contact Number</label>
							<input class="form-control" type="text" name="contact" class="form-control" id="yourEmail" required>
							<div class="invalid-feedback">Please enter your Cellphone number!</div>
						</div>
					</div>
					<!-- End of Genre select field and contact number field -->
					<div class="row">
						<div class="col-12">
							<label for="description">Description:</label>
							<textarea class="form-control" id="description" name="description" required></textarea><br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="duration">Duration (in minutes):</label>
							<input class="form-control" type="number" id="duration" name="duration" required><br>
						</div>
						<div class="col-6">
							<label for="release_year">Release Year:</label>
							<input class="form-control" type="number" id="release_year" name="release_year" required><br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="price">Price:</label>
							<input class="form-control" type="number" id="price" name="price" required><br>
						</div>
						<div class="col-6">
							<label for="quantity">Quantity:</label>
							<input class="form-control" type="number" id="quantity" name="quantity" required><br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label for="availability">Availability:</label>
							<select class="form-control" id="availability" name="availability" required>
								<option value="1">Available</option>
								<option value="0">Not Available</option>
							</select><br>
						</div>
						<div class="col-6">
							<label for="borrowed">Borrowed:</label>
							<select class="form-control" id="borrowed" name="borrowed" required>
								<option value="0">Not Borrowed</option>
								<option value="1">Borrowed</option>
							</select><br>
						</div>
					</div>
					<!-- Submit button -->
					<button type="submit">Create Movie</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div><!-- End Basic Modal-->
<?php
include "../layout/bot.php";
?>
