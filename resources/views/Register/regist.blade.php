<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign Up Form</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .row{
            padding: 30px
        }
        .welcome{
            background: #f2f2f2;
        }
        .text-Welcome{
            padding: 150px 0px ;
            font-size: 74px; /* atur ukuran font*/
            font-weight: 900;
            text-align: center;
            width: 80%;
        }
        
        .img-welcome img {
           width: 600px; /* atur ukuran img*/
           height: auto; /* atur ukuran img*/
           border-radius: 5px;
           object-fit: cover; 
        }
        .login-register{
            padding: 20px;
        }
        .text-login-register{
            font-size: 18px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
        }
        .full-line {
            height: 2px; /* Ketebalan garis */
            background-color: black; /* Warna garis */
            width: 100%; /* Lebar penuh */
            margin-top: 10px; /* Jarak antara Sign Up dan garis */
        }
        .btn-outline {
            background-color: #ffffff;
            border-radius: 8px;
            height: 48px;
        }
        .fill-or{
            padding: 16px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-6">
            <div class="welcome">
                <div class="container">
                    <h1 class="text-Welcome">Welcome to PetCare+ </h1>
                </div>
                <div class="container">
                    <div class="img-welcome">
                         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbDcTan3S0G8I2pPXn0t8zPPdf8AR12OR0-4BmPMWBDA&s" alt="">
                     </div>
                </div>
            </div>
           
        </div>
        <div class="col-6">
            <div class="login-register">
                <div class="row">
                    <div class="col-6">
                        <div class="container">
                            <div class="text-login-register" href="">
                                Sign In
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="container">
                            <div class="row" style="padding: 0px; width: 100%;">
                                <div class="text-login-register">
                                     Sign Up
                                </div>
                                <div class="full-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-register-fill">
                <div class="contaner">
                    <div class="row" style="padding-top: 0px !important">
                        <div class="col-12">
                            <div class="container">
                                <button type="button" class="btn-outline w-100" href="">Sign Up as User</button>
                            </div>
                        </div>
                        <div class="container">
                            <h4 class="fill-or">or</h4>
                        </div>
                        <div class="col-12">
                            <div class="container">
                                <button type="button" class="btn-outline w-100" href="">Sign Up as Veterinarian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>