<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
        /* Center the table */
        .container-md {
            margin: 0 auto;
            width: 90%;
            padding-top: 10px;
        }

        .container-sm{
            margin: 0 auto;
            width:60%;
        }

        /* Add rounded corners and drop shadow to the table */
        .table {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Set the table header color to light blue */
        .table thead th {
            background-color: #e7f2fb;
        }

        /* Set the background color of the "Add New Student" button to light blue */
        .btn-primary {
            background-color: #4d9df2;
            border-color: #4d9df2;
        }

        /* Set the hover background color of the "Edit" and "Delete" buttons to light blue */
        .btn-warning:hover, .btn-danger:hover {
            background-color: #4d9df2;
            border-color: #4d9df2;
        }

        .hd {
            padding-top: 10px;
            margin: 0 auto;
            text-align: center;
        }

        .newButton {
            align-items: flex-end;
            margin: 0 auto;
            float: inline-end;
        }

        /* Add table borders */
        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Add padding to table cells */
        table.table-bordered td,
        table.table-bordered th {
            padding: 0.75rem;
            vertical-align: middle;
        }

        .row{
            padding-left: 60px;
        }

        .search{
            padding-left: 60px;
        }
    </style>

    <script>
        function showEditConfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to edit the student details",
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

        function showDeleteConfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "The Student details will be permently deleted from the system!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
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

    <h1 class="hd">Student List</h1>
    <div class="row addstudent">
        <a href="<?=base_url("student_add")?>" class="btn btn-primary btn-lg float-end">Add New Student</a>
    </div>

    <div class="container-sm">
        <br>
        <form action="<?=base_url('std_search')?>" method = "POST">
        <input type="text" class="form-control" name = "searchkey" />
        <input type="submit" class="btn btn-outline-secondary" value = "Search" />
        </form>
    </div>

    <div class="container-md">
        <table class="table table-bordered">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Department</th>
                    <th scope="col">Course</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($student as $row) : ?>
                    <tr>
                    <th scope="row"><?=$row['sID']?></th>
                    <td><?=$row['firstName']?></td>
                    <td><?=$row['lastName']?></td>
                    <td><?=$row['birthday']?></td>
                    <td><?=$row['contactNumber']?></td>
                    <td><?=$row['address']?></td>
                    <td><?=$row['department']?></td>
                    <td><?=$row['course']?></td>
                    <td><button class="btn btn-warning" onclick="showEditConfirmation('<?=base_url('student/edit/'.$row['sID'])?>')">Edit</button></td>
                    <td><button class="btn btn-danger" onclick="showDeleteConfirmation('<?=base_url('student/delete/'.$row['sID'])?>')">Delete</button></td>
                    </tr>
                    <?php endforeach?>  
                </tbody>
                </table>
            </div>
        
    </body>
    
</html>