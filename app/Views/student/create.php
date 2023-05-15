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
                    text: "Do you want to Add the student to the system",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Add!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return true;
                    }
                });
            }

            function preventAction(){
                event.preventDefault();

                if(showEditConfirmation(<?=base_url('student_store') ?>)){
                    return true;
                };

                

            }
        </script>

    </head>
    <body class="body">
        <div>
            <?php echo view('Common/header.php');?>
        </div>
        <div class="container">
            <div class="form-container">
                <h2 class="text-center">Add new student</h2>
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
                <form action="<?=base_url('student_store') ?>" method="POST" >
                    <div class="form-group">
                        <label for="inputFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control"  name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="inputLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName">
                    </div>
                    <div class="form-group">
                        <label for="inputBirthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" max="<?php echo date("Y-m-d");?>" name="birhtday">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="inputContact" class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="contactNumber">
                    </div>
                    <div class="form-group">
                        <label for="inputDepartment" class="form-label">Department</label>
                <input type="text" class="form-control" name="department">
            </div>
            <div class="form-group">
                <label for="inputCourse" class="form-label">Course</label>
                <input type="text" class="form-control" name="course">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        
    </body>


</html>