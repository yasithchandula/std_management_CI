<html>
<head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        body {
            background-color: #ADD8E6;
        }
        
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .form-wrapper {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <?php echo view('Common/header.php');?>
    <div class="container">
        <div class="form-wrapper">
            <h2>User Dashboard</h2>
            <div class="mb-6" style="padding:20px">
                <div class="mb-3">
                    <a class="btn btn-primary btn-lg" href="<?=base_url('student')?>" style="margin-left:10px">Student Management</a>
                </div>
                <div class="mb-3">
                    <br>    
                    <a class="btn btn-primary btn-lg" href="<?=base_url('course')?>" style="margin-left:10px">Course Management</a>
                </div>
                <div class="mb-3">
                    <br>    
                    <a class="btn btn-danger btn-lg" href="<?=base_url('user_logout')?>" style="margin-left:10px">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
