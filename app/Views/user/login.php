<html>
    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <style>
        /* Center the form horizontally and vertically */
        html, body {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        /* Add ocean blue background color */
        body {
            background-color: #e0ecff;
        }
        
        /* Add rounded corners and drop shadows to the form */
        .rounded-form {
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            padding: 20px;
            background-color: #f2f2f2;
            color: #555555;
            max-width: 600px; /* Set maximum width */
            width: 80%; /* Set width as a percentage */
        }

        /* Add background color for form*/
        .center-form{
            background-color:#b8d3ff;
        }
        
        /* Style the form inputs */
        input[type=text], input[type=password] {
            border-radius: 5px;
            border: none;
            padding: 10px;
            background-color: #ffffff;
            color: #555555;
        }
        
        /* Style the login button */
        .btn-success {
            background-color: #0077be;
            border-color: #0077be;
        }
        .btn-success:hover {
            background-color: #005fa3;
            border-color: #005fa3;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h1 style="text-align:left;font-size:50px;font-weight:bold">Student Management System</h1>
        <div class="container center-form">
            <div class="rounded-form">
                <div>
                    <h2>User Login</h2>
                </div>
                <?php
                /**
                 * - check weather if there are any erros in the response.
                 * - if errors present, the list of errors will be displayed.
                 */
                if (session('errors')) :?>
                    <?php $erros['errors']=session('errors');
                   ?>
                    <div class="text-danger">
                        <ul>
                            <?php foreach ($erros['errors'] as $error):?>
                            <li><?=$error?></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                <?php endif ?>
                <form action="<?=base_url('user_logger') ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="inputAddresst" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        </div>
                    <br>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
        </div>
    </body>
</html>
