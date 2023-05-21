<?php
include "../layout/top.php";   
?>
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
                    <form class="row g-3 needs-validation" method="POST" action="../../Controller/customer_create.php" novalidate>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label"for="fName">First Name:</label>
                                <input class="form-control" type="text" id="fName" name="fName" required>
                                <div class="invalid-feedback">Please enter a valid Values!</div>
                            </div>
                            <div class="col-4">
                                <label class="form-label"for="mName">Middle Name:</label>
                                <input class="form-control" type="text" id="mName" name="mName">
                                <div class="invalid-feedback">Please enter a valid Values!</div>
                            </div>
                            <div class="col-4">
                                <label class="form-label"for="lName">Last Name:</label>
                                <input class="form-control" type="text" id="lName" name="lName" required>
                                <div class="invalid-feedback">Please enter a valid Values!</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label"for="address">Address:</label>
                            <textarea class="form-control" type="text" id="address" name="address" required></textarea>
                            <div class="invalid-feedback">Please enter a valid Values!</div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <label class="form-label"for="contactNo">Contact No:</label>
                                <input class="form-control" type="text" id="contactNo" name="contactNo" required>
                                <div class="invalid-feedback">Please enter a valid Values!</div>
                            </div>
                            <div class="col-6">
                                <label class="form-label"for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" required>
                                <div class="invalid-feedback">Please enter a valid Values!</div>
                            </div>

                        </div>
                        <div class="card-footer">
                           <input class="form-control" type="submit" value="Create Customer">
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
                                <th scope="col">Name</th>
                                <th scope="col">Contact No.</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../../Controller/customer_read.php';?>
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

<script type="text/javascript">
        function deleteCustomer(x) {
        // Send an AJAX request to delete the genre
        $.ajax({
            url: "../../Controller/customer_delete.php",
            type: "POST",
            data: {
                Id: x
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


</script>
<?php
include "../layout/bot.php";   
?>
