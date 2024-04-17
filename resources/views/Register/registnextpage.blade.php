
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
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
        .signup-button {
            position: absolute;
            bottom: 40px; 
            left: 53%;
            transform: translateX(-50%);
            background-color: #8D7B68; 
            border: none;
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
            <img src="Images/Image Sapi.png" style="height: 500px; width: 500px; margin-top: -200px;" alt="Cows">
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
                                        <a class="nav-link active" href="register.html">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form>
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Phone Number</label>
                                    <input type="phonenumber" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Password</label>
                                        <!-- Tambahkan kotak teks untuk Password -->
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Confirm</label>
                                        <!-- Tambahkan kotak teks untuk Confirm -->
                                        <input type="password" class="form-control" placeholder="Password Confirmation">
                                    </div>
                                </div>
                            <button type="submit" class="btn signup-button btn-block text-light">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
