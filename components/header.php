<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
    <!-- css style -->
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        .bor{
            box-shadow: 0px 0px 1px black;
        }
        .toggle{
            
            color: black;
        }
        footer ul li {
            
            font-weight: 500;
        }
        .icon i{
            margin: 0 5px 0 5px;
        }
        :root{
            --color:rgb(239,73,146);
            --main-font:"PT Serif", serif;
            --footer-font:"Noto Sans", sans-serif;
        }
        .modal-lg {
            max-width: 700px; 
        }
        .forget{
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration:underline;
        }
        #women , #men{
            text-decoration:none;
        }
     </style>
<body>
           <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-white text-white">
                <h4 class="border-bottom border-1">
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" class="text-uppercase text-black">Login</a>
                </h4>
                <h4 class="">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" class="ms-3 fs-4 text-uppercase text-black">Register</a>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="POST" action="user_login.php">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control rounded-0" name="email" placeholder="enter email" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control rounded-0" name="password" placeholder="enter password" required>
                </div>
                <button type="submit" class="btn rounded-0 btn-dark w-100">Login</button>
                </form>
               <p class="text-center mt-3 ">
                <a href="" class="text-black">Forget your password? </a>
                </p>
                </p>
                <div class="d-flex flex-column gap-2">
                    <button class="btn w-100 border border-secondary rounded-0"><i class="fa-brands fa-google me-2"></i>Continue with Google</button>
                    <button class="btn w-100 border border-secondary rounded-0"><i class="fa-brands fa-facebook-f me-2"></i>Continue with Facebook</button>
                </div>
            </div>
            
            </div>
        </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-4">
                    <div class="d-flex">
                        <h4 class="border-bottom border-1">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" class=" fs-4 text-uppercase text-black">Register</a>
                        </h4>
                        <h4>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" class="text-uppercase ms-3 text-black">Login</a>
                        </h4>
                    </div>
                    <form style="font-weight: 600;">
                        <div class="row">
                        <div class="col-sm-12 mb-1">
                            <label>First Name</label>
                            <input type="text" class="form-control rounded-0" placeholder="First name">
                        </div>
                        <div class="col-sm-12 mb-1">
                            <label>Last Name</label>
                            <input type="text" class="form-control rounded-0" placeholder="Last name">
                        </div>
                        <div class="col-sm-12 mb-1">
                            <label>Gender</label>
                            <select class="form-select rounded-0">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                        </div>
                        <div class="col-sm-12 mb-1">
                            <label>Telephone</label>
                            <input type="text" class="form-control rounded-0" placeholder="Enter phone number">
                        </div>
                        <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="col-sm-12 mb-1">
                            <label>Country</label>
                            <input type="text" class="form-control rounded-0" placeholder="Country">
                        </div>
                        <div class="col-sm-12 mb-1">
                            <label>City/Province</label>
                            <input type="text" class="form-control rounded-0" placeholder="City or Province">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success rounded-0 w-100 my-2">CREATE ACCOUNT</button>
                        <a href="" class="fw-bold my-2 link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover d-block" style="text-align: center;">forget your password?</a>
                    </form>
                <!-- Divider -->
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1">
                    <span class="px-2">OR</span>
                    <hr class="flex-grow-1">
                </div>
                
                <!-- Social Buttons -->
                <div class="d-flex flex-column gap-2">
                    <button class="btn w-100 border border-secondary rounded-0"><i class="fa-brands fa-google me-2"></i>Continue with Google</button>
                    <button class="btn w-100 border border-secondary rounded-0"><i class="fa-brands fa-facebook-f me-2"></i>Continue with Facebook</button>
                </div>
                </div>
            </div>
        </div>


        <!-- Admin Login Modal -->
        <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Admin Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="admin_login.php">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-dark w-100">Login</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- header -->
      <div class="container-fluid position-sticky top-0 bg-light z-1 bor">
          <div class="container px-5 ">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid d-flex justify-content-between py-2">
                        <div>
            
                            <a class="navbar-brand" href="#">
                                <i class="fa-solid fa-bars fs-4"></i>
                            </a>
                        </div>
                        <img src="./src/logo/logo.png" style="width: 20%; height: 20%; margin-left: 50px;  margin-top: 5px;" alt="">
                        <div class="icon">
                            <i class="fa-solid fa-magnifying-glass fs-5"></i>
                            <i class="fa-regular fa-bell fs-5"></i>
                            <i class="fa-solid fa-user fs-5" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor:pointer;"></i>
                        </div>

                </div>
            </nav>
        </div>
      </div>


 
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- script -->