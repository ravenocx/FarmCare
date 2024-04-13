<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body, input, button, a {
            font-family: 'Poppins', sans-serif;
            
        }
        .registration-form {
            max-width: 400px;
            margin: 3rem auto;
            font-weight: 500;
        }
        .header-area {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header-area img {
            max-width: 100%;
            height: auto;
        }
    
        .file-input {
            border: 2px dashed #999;
            border-radius: .25rem;
            text-align: center;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .login-button {
            position: absolute;
            bottom: 40px; /* Atur jarak button dari bagian bawah */
            left: 53%;
            transform: translateX(-50%);
            background-color: #8D7B68; /* Brown shade, similar to the button in the image */
            border: none;
        }
        
        .nav-tabs {
            border-bottom: 2px solid #000; /* Makes the bottom border black and thicker */
        }
        .nav-link.active {
            border: none; /* Removes the border from the active tab */
            border-bottom: 2px solid #000; /* Adds a black bottom border to the active tab */
            color: black; /* Makes the text color black */
            
        }
        .nav-item {
            margin-right: 5px; /* Optional: Adjusts the spacing between the tabs */
        }
        .nav-link {
            border: none; /* Removes the default border */
            color: #aaa; /* Sets a lighter color for the inactive tab */
        }
        .nav-link:hover {
            border: none; /* Ensures the border is removed on hover */
            color: black; /* Optional: Changes color on hover to black */
        }
        .welcome-text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            bottom: calc(10% + -250px);
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
            font-family: 'Poppins', sans-serif; /* Menetapkan font-family dengan benar */
            font-style: normal; /* Menggunakan nilai 'normal' untuk properti font-style */
        }

        .welcome-text {
            font-weight: 700;
            font-size: 65px;
            color: #8D7B68;
        }  

        .header-area {
            position: absolute;
            top: calc(50% + 120px); /* Mengatur posisi vertikal tepat di bawah teks */
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
                                        <a class="nav-link active" href="login.html">Log in</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nav-item text-center">
                                        <a class="nav-link " href="register.html">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group" style="margin-left: 20px">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                            <button type="submit" class="btn login-button btn-block text-light">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>