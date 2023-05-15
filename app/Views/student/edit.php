<html>
    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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
    </head>
    <body>
        <div>
            <?php echo view('Common/header.php');?>
        </div>
        <div class="container">
            <div class="form-container">
                <h2 class="text-center">Update student</h2>
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
     
        <form action="<?=base_url('student/update/'.$student['sID']) ?>" method="POST" >
            <div class="mb-3">
            <div class="mb-3">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" value="<?=$student['firstName'] ?>" class="form-control"  name="firstName">
            </div>
            <div class="mb-3">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" value="<?=$student['lastName'] ?>" class="form-control" name="lastName">
            </div>
            <div class="mb-3">
                <label for="inputBirthday" class="form-label">Birthday</label>
                <input type="date" value="<?=$student['birthday'] ?>" class="form-control" name="birhtday" max="<?php echo date("Y-m-d");?>">
            </div>
            <div class="mb-3">
                <label for="inputAddresst" class="form-label">Address</label>
                <input type="text" value="<?=$student['address'] ?>" class="form-control" name="address">
            </div>
            <div class="mb-3">
                <label for="inputContact" class="form-label">Contact No</label>
                <input type="text" value="<?=$student['contactNumber'] ?>" class="form-control" name="contactNumber">
            </div>
            <div class="mb-3">
                <label for="inputDepartment" class="form-label">Department</label>
                <input type="text" value="<?=$student['department'] ?>" class="form-control" name="department">
            </div>
            <div class="mb-3">
                <label for="inputCourse" class="form-label">Course</label>
                <input type="text" value="<?=$student['course'] ?>" class="form-control" name="course">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        
    </body>


</html>