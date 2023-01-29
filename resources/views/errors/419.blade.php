
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Session Expired </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
    
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center">
                        <div class="mb-5">
                            <a class="btn btn-primary" href="{{url()->previous()}}">Back to Previous</a>
                        </div>
                        <h1 class="error-text  font-weight-bold">419</h1>
                        <h4 class="mt-4"><i class="fa fa-times-circle text-danger"></i> Session Expired!</h4>
                        <p>Your session for the request has expired.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>