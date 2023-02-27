<?php 
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
                <form class="row g-3" action="loginRegister.php" method="post">
                    <div class="col-md-6">
                        <label for="fName2" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fName2" placeholder="First Name" name="fName2" value="<?php isset($_POST['fName2']) ? htmlspecialchars($_POST['fName2'], ENT_QUOTES) : '' ?>" aria-label="First Name" required><small><?= $errors['fName2'] ?? '' ?></small>
                    </div>
                    <div class="col-md-6">
                        <label for="lName2" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lName2" value="<?php isset($_POST['lName2']) ? htmlspecialchars($_POST['lName2'], ENT_QUOTES) : '' ?>" id="lName2" aria-label="Last Name" required>
                        <small><?= $errors['lName2'] ?? '' ?></small>
                    </div>
                    <div class="col-12">
                        <label for="uName2" class="form-label">Username</label>
                        <input type="text" class="form-control" id="uName2" name="uName2" aria-label="Register Username" value ="<?php isset($_POST['uName2']) ? htmlspecialchars($_POST['uName2'], ENT_QUOTES) : '' ?>" placeholder="Username" required>
                        <small><?= $errors['uName2'] ?? '' ?></small>
                    </div>
                    <div class="col-12">
                        <label for="email2" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email2" name="email2" aria-label="Register Email" placeholder="Email Address" required>
                        <small><?= $errors['email2'] ?? '' ?></small>
                    </div>
                    <div class="col-md-6">
                        <label for="pw2" class="form-label">Password</label>
                        <input type="password" class="form-control"id="pw2" placeholder="Password" name="pw2" value ="<?php isset($_POST['pw2']) ? htmlspecialchars($_POST['pw2'], ENT_QUOTES) : '' ?>" aria-label="Password" required>
                        <small><?= $errors['pw2'] ?? '' ?></small>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control"id="confirm2" placeholder="Confirm Password" name="confirm2" value ="<?php isset($_POST['fName2']) ? htmlspecialchars($_POST['confirm2'], ENT_QUOTES) : '' ?>" aria-label="Confirm Password" required><small><?= $errors['confirm2'] ?? '' ?></small>
                    </div>
                    <div class="col-md-4 form-check">
                        <label class="form-check-label" for="bot2">I am human check</label>
                        <input type="checkbox" class="form-check-input" id="bot2" required> 
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
