<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>New Employee</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container mt-5">

    <h2 class="text-center mb-4">New Employee Form</h2>
    <h3 class="text-center mb-4">Please fill in the information!</h3>

    <!-- Form validation script -->
    <?php include('reg_emp_validation.php'); ?>
    
    <?//php var_dump($_POST); ?>

    <!-- Contact form -->
    <form action="" method="post" novalidate>
      
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Last Name</label>
        <div class="col-sm-8">
          <input type="text" name="lname" class="form-control" value="<?php echo $lname;?>">
          <!-- Error -->
          <?php echo $lnameEmptyErr; ?>
          <?php echo $lnameErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label">First Name</label>
        <div class="col-sm-8">
          <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
          <!-- Error -->
          <?php echo $fnameEmptyErr; ?>
          <?php echo $fnameErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="email" name="email" class="form-control"  value="<?php echo $email;?>">
          <!-- Error -->
          <?php echo $emailEmptyErr; ?>
          <?php echo $emailErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control"  value="">
          <!-- Error -->
          <?php echo $passwordEmptyErr; ?>
        </div>
      </div>

    <div class="form-group row">
    <label class="col-sm-4 col-form-label">Date of hire (YYYY-MM-DD)</label>
        <div class="col-sm-8">
          <input type="date" name="dateofhire" class="form-control" value="<?php echo $dateofhire;?>">
          <!-- Error -->
          <?php echo $dateofhireEmptyErr; ?>
          
        </div>
      </div>
    
      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>