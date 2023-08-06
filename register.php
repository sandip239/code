
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"></h1>
                </div>
                <!-- Add your main content here -->
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Registration Form</h3>
                                </div>
                                <div class="card-body">
                                    <form id="form" method="POST" action="">
                                        
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="form3Example4c" name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="repassword" name="confirmPassword" required>
                                        </div>
                                        <div class="d-grid">
                                            
                                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
      $('#form').validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          },
          repassword: {
            required: true,
            equalTo: '#form3Example4c'
          },

        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Name must be at least 3 characters long"
          },
          email: {
            required: "Please enter your email",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Password must be at least 6 characters long"
          },
          repassword: {
            required: "Please repeat your password",
            equalTo: "Passwords do not match"
          },

        },
        submitHandler: function(form) {
          // Handle the form submission
          form.submit();
        }
      });
    });
  </script>
