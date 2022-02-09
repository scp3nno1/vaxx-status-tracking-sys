<?php

    // Error messages
    $lnameEmptyErr = "";
    $fnameEmptyErr = "";
    $emailEmptyErr = "";
    $passwordEmptyErr = "";
    $dateofhireEmptyErr = "";
    $lnameErr = "";
    $fnameErr = "";
    $emailErr = "";
    //$dateofhireErr = "";

    if(isset($_POST["submit"])) {
        // Set form variables
        $lname = checkInput($_POST["lname"]);
        $fname = checkInput($_POST["fname"]);
        $email = checkInput($_POST["email"]);
        $password = checkInput($_POST["password"]);
        $dateofhire = checkInput($_POST["dateofhire"]);
        
        // create flag varibale to determine whether to insert into db
        $okayToSaveInDB = TRUE;    

        // lName validation
        if(empty($lname)){
            $lnameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
            $okayToSaveInDB = FALSE;
        } // Allow letters and white space 
        else if(!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $lnameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
            $okayToSaveInDB = FALSE;
        } else {
           //echo $lname . '<br>';
        }

         // fName validation
         if(empty($fname)){
            $fnameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
            $okayToSaveInDB = FALSE;
        } // Allow letters and white space 
        else if(!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $nameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
            $okayToSaveInDB = FALSE;
        } else {
            //echo $fname . '<br>';
        }

        // Email validation
        if(empty($email)){
            $emailEmptyErr = '<div class="error">
                Email can not be left blank.
            </div>';
            $okayToSaveInDB = FALSE;
        } // E-mail format validation
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            $emailErr = '<div class="error">
                    Email format is not valid.
            </div>';
            $okayToSaveInDB = FALSE;
        } else {
            //echo $email . '<br>';
        }

        // Password validation
        if(empty($password)){
            $passwordEmptyErr = '<div class="error">
                Password can not be left blank.
            </div>';
            $okayToSaveInDB = FALSE;
        } else {
            //echo $password . '<br>';
        }

        // Date validation
        if(empty($dateofhire)){
            $dateofhireEmptyErr = '<div class="error">
            Date can not be left blank.
        </div>';
        $okayToSaveInDB = FALSE;
        } else {
            //echo $dateofhire . '<br>';
        }

        if($okayToSaveInDB){
            require_once("cdbcreds.php");
            echo "About to connect to Company Database.<br>";
            try {
              $employeeDBH = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
              $employeeDBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
              echo "Company Database connection succeeded.<br>";
            }
            catch(PDOException $e) {
                echo "There has been an issue 1.<br>" . $e->getMessage();
            }
            
            try {
                $employeeSQL = $employeeDBH->prepare("INSERT INTO employee (emp_lname, emp_fname, emp_email, emp_password, emp_dateofhire) VALUE 
                (:emp_lname, :emp_fname, :emp_email, :emp_password, :emp_dateofhire)");

                $employeeSQL->bindParam(':emp_lname', $lname);
                $employeeSQL->bindParam(':emp_fname', $fname);
                $employeeSQL->bindParam(':emp_email', $email);
                $hashpass = password_hash($password, PASSWORD_DEFAULT);
                $employeeSQL->bindParam(':emp_password', $hashpass);
                $employeeSQL->bindParam(':emp_dateofhire', $dateofhire);
                
                $employeeSQL->execute();

                echo "Data sent";
               
              }
              catch(PDOException $e) {
                  echo "There has been an issue 2.<br>" . $e->getMessage();
              }
    
        }  
    }
        function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
        }    
        
?>