<?php

require(__DIR__.'/../../src/bootstrap.php');
view('header');

?>

<div class="container">
    <div class="container text-center" style="background-color:#7DB2CC;" >
        <div class="row justify-content-around">

    <!-------------- LOGIN FORM COL  --------------------->

            <div class="col-4">
                <h1>Login</h1> 
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
            
<!------------------ END ------------------------>

<!-------------- REGISTER FORM COL   --------------------->

            <div class="col-4">
                <h1>Register</h1>
                <form class="row g-3" action="login.php" method="post">
                    <div class="col-md-6">
                        <label for="regFirst" class="form-label">First Name</label>
                        <input type="text" class="form-control"id="regFirst" placeholder="First Name" name="regFirst" aria-label="First Name">
                    </div>
                    <div class="col-md-6">
                        <label for="regLast" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="regLast" id="regLast" aria-label="Last Name">
                    </div>
                    <div class="col-12">
                        <label for="regEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="regEmail" name="regEmail" aria-label="Register Email" placeholder="Email Address">
                    </div>
                    <div class="col-md-6">
                        <label for="regPw" class="form-label">Password</label>
                        <input type="password" class="form-control"id="regPw" placeholder="Password" name="regPw" aria-label="Password">
                    </div>
                    <div class="col-md-6">
                        <label for="regConPw" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control"id="regConPw" placeholder="Confirm Password" name="regConPw" aria-label="Confirm Password">
                    </div>
                    <div class="col-md-4 form-check">
                        <label class="form-check-label" for="botCheck">I am human check</label>
                        <input type="checkbox" class="form-check-input" id="botCheck"> 
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>

        <!------------------ END ------------------------>

        </div>
    </div>
</div>


<?php view('footer'); ?>
