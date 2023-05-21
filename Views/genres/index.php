<?php
include "../layout/top.php";
?>

<!-- Include necessary JavaScript libraries -->

<script>
    // Function to delete a genre
    function deleteGenre(genreId) {
        // Send an AJAX request to delete the genre
        $.ajax({
            url: "../../Controller/genre_delete.php",
            type: "POST",
            data: {
                genreId: genreId
            },
            success: function(response) {
                // Refresh the page after successful deletion
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    // Function to edit a genre
    function editGenre(genreId, genreType) {
        // Set the values in the edit modal
        $('#editGenreId').val(genreId);
        $('#editGenreType').val(genreType);

        // Show the edit modal
        $('#editModal').modal('show');
    }

    // Function to submit the edited genre
    function submitEditGenre() {
        var genreId = $('#editGenreId').val();
        var updatedGenre = $('#editGenreType').val();

        // Send an AJAX request to update the genre
        $.ajax({
            url: "../../Controller/genre_edit.php",
            type: "POST",
            data: {
                genreId: genreId,
                updatedGenre: updatedGenre
            },
            success: function(response) {
                // Refresh the page after successful edit
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        // Hide the edit modal
        $('#editModal').modal('hide');
    }
</script>

<div class="pagetitle">
    <h1>Genre</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Movies</li>
            <li class="breadcrumb-item active">Genre</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Genre</h5>
                    <form class="row g-3 needs-validation" method="POST" action="../../Controller/genre_create.php" novalidate>
                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid Genre!</div>
                        </div>
                        <div class="card-footer">
                            <button>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-7">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Genre List</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../Controller/genre_read.php';?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Right side columns -->
    </div>
</section>

<!-- Edit Genre Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Genre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editGenreType" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="editGenreType">
                    </div>
                    <input type="hidden" id="editGenreId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitEditGenre()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Genre Modal -->

<?php
include "../layout/bot.php";
?>
