<!DOCTYPE html>
<html lang="en">
<?php include '../components/user/head.php' ?>
<body class="homepage" data-bs-theme="dark" >
    <!-- Modal Registration -->
    <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="process.php" method="POST">  <!-- Backend route for registration -->
                            <div class="modal-body">
                                <div class="input-group flex-nowrap mb-3">
                                    <span class="input-group-text"><i class="bi bi-person text-primary"></i></span>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter your First Name..." required>
                                </div>

                                <div class="input-group flex-nowrap mb-3">
                                    <span class="input-group-text"><i class="bi bi-person text-primary"></i></span>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter your Last Name..." required>
                                </div>

                                <div class="input-group flex-nowrap mb-3">
                                    <span class="input-group-text"><i class="bi bi-envelope text-primary"></i></span>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your Email..." required>
                                </div>

                                <div class="input-group flex-nowrap mb-3">
                                    <span class="input-group-text"><i class="bi bi-lock text-primary"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Enter your Password..." required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="reg" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>