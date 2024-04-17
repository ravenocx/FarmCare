<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmCare+ Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body, input, button, a {
            font-family: 'Poppins', sans-serif;
        }
        .registration-form {
            max-width: 400px;
            margin: 3rem auto;
        }
        .header-area {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header-area img {
            max-width: 100%;
            height: auto;
        }
        .welcome-text {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .file-input {
            border: 2px dashed #999;
            border-radius: .25rem;
            text-align: center;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .sign-up-button {
            background-color: #8D7B68; 
            border: none;
        }
        .sign-up-button:hover {
            background-color: #5d4037; 
        }
        .nav-tabs {
            border-bottom: 2px solid #000; 
        }
        .nav-link.active {
            border: none; 
            border-bottom: 2px solid #000; 
            color: black; 
        }
        .nav-item {
            margin-right: 5px; 
        }
        .nav-link {
            border: none;
            color: #aaa; 
        }
        .nav-link:hover {
            border: none; 
            color: black; 
        }
        .welcome-text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            bottom: calc(10% + -250px);
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
            font-family: 'Poppins', sans-serif; 
            font-style: normal; 
        }

        .welcome-text {
            font-weight: 700;
            font-size: 65px;
            color: #8D7B68;
        }  

        .header-area {
            position: absolute;
            top: calc(50% + 120px); 
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card border-0">
        <div class="card-body">
            <div class="row">
            <div class="col-6" style="background-color: #FFF8F0 ; position: relative; height: 100vh;">
            <div class="header-area">
            <img src="images/logo.png" style="height: 500px; width: 450px; margin-top: -200px;" alt="Cows">
            </div>
            <div class="welcome-text-container">
            <h2 class="welcome-text">Welcome to FarmCare+</h2>
    </div>
                </div>
                <div class="col-6">
                    <div class="mb-4">
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="nav-item text-center">
                                        <a class="nav-link " href="login.html">Log in</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nav-item text-center">
                                        <a class="nav-link active" href="register.html">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form>
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>

                                <input type="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Specialist</label>

                                <input type="text" class="form-control" placeholder="Specialist">
                            </div>
                            <div class="form-group">
                                <label class="form-label">University</label>

                                <input type="text" class="form-control" placeholder="University">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Graduate Year</label>

                                <input type="text" class="form-control" placeholder="Graduate Year">
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="form-label">Password</label>

                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group col">
                                    <label class="form-label">Confirmation</label>

                                    <input type="password" class="form-control" placeholder="Confirmation">
                                </div>
                            </div>
                            <div class="file-input">
                                <label class="form-label">Certification of Doctor</label>

                                <input type="file" class="form-control-file">
                                <small>Drag and drop here or browse</small>
                            </div>
                            <button type="submit" class="btn sign-up-button btn-block text-light">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
