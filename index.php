<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD AJAX</title>
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/2.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./custom.css">
</head>
<body>
<div class="container">
    <h3> CRUD PHP AJAX </h3>


    <form id="appForm" enctype="multipart/form-data">
        <div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name <span class="field-required">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Address <span class="field-required">*</span></label>
                    <input type="text" name="address" id="address" placeholder="address" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Image">Image <span class="field-required">*</span></label>
                    <input type="file" name="image" id="image" placeholder="image" class="form-control">
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <input type="hidden" name="dataId" id="dataId" value="" />
                <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary"><i class="fa fa-spinner fa-spin" id="spinnerLoader" ></i> <span id="buttonLabel">Save</span> </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead id="thead" style="background-color:#135361">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="crudData"></tbody>
    </table>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- TODO: test if this library can handle file uploads  -->
<!-- <script src="https://malsup.github.io/jquery.form.js"></script> -->
<script src="./ajax.js"></script>
<script src="https://cdn.usebootstrap.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
</body>
</html>
