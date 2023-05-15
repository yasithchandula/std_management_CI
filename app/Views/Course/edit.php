<html>
    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
       
        <!-- SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

        <!-- SweetAlert2 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

        <style>
            .form-container {
                width: 70%;
                border: 1px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                margin: 10px auto;
                padding: 10px;
                background-color: #f2f2f2;
            }
        </style>

        <script>
            function showEditConfirmation(url) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to Update the course details",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            }
        </script>
    </head>
    <body>
        <div>
            <?php echo view('Common/header.php');?>
        </div>
        <div class="container">
            <div class="form-container">
                <h2 class="text-center">Edit Course</h2>
                <?php
                    /**
                     * - check weather if there are any erros in the response.
                     * - if errors present, the list of errors will be displayed.
                     */
                    if (session('errors')) :?>

                    <?php $erros['errors']=session('errors');?>

                    <div class="text-danger">
                        <ul>
                            <?php foreach ($erros['errors'] as $error):?>
                                <li><?=$error?></li>
                            <?php endforeach?>
                        </ul>
                    </div>

                <?php endif ?>
                <form action="<?=base_url('course_update/'.$course['cID']) ?>" method="POST">
                    <div class="form-group">
                        <label for="inputCourseID" class="form-label">Course ID</label>
                        <input type="text" class="form-control" value="<?=$course['cID'] ?>"  name="cID">
                    </div>
                    <div class="form-group">
                        <label for="inputDepartment" class="form-label">Department</label>
                        <input type="text" class="form-control" value="<?=$course['Department'] ?>" name="Department">
                    </div>
                    <div class="form-group">
                        <label for="inputCourse" class="form-label">Course</label>
                        <input type="text" class="form-control" value="<?=$course['Course'] ?>" name="Course">
                    </div>
                    <div class="form-group">
                        <label for="inputFee" class="form-label">Fee</label>
                        <input type="text" class="form-control" value="<?=$course['fee'] ?>" name="fee">
                    </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        
    </body>


</html>