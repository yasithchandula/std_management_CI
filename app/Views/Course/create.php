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
                <h2 class="text-center">Add new Course</h2>
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
                <form action="<?=base_url('course_store') ?>" method="POST">
                    <div class="form-group">
                        <label for="inputCourseID" class="form-label">Course ID</label>
                        <input type="text" class="form-control"  name="cID">
                    </div>
                    <div class="form-group">
                        <label for="inputDepartment" class="form-label">Department</label>
                        <input type="text" class="form-control"  name="Department">
                    </div>
                    <div class="form-group">
                        <label for="inputCourse" class="form-label">Course</label>
                        <input type="text" class="form-control" name="Course">
                    </div>
                    <div class="form-group">
                        <label for="inputFee" class="form-label">Fee</label>
                        <input type="text" class="form-control" name="fee">
                    </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        
    </body>


</html>