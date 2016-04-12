<?php include 'header.php';
 $title =  'Basic Survey by Johan Setyobudi';
 $output = str_replace('%TITLE%',$title,$output);
 echo $output;
 require_once('./dao/surveyDAO.php');
 try {
    $surveyDAO = new surveyDAO();
    $hasError = false;
    $errorMessages = Array();

    if(isset($_POST['firstName']) || isset($_POST['lastName']) 
        || isset($_POST['emailAddress'])) {

        if(empty($_POST['firstName'])) {
            $errorMessages['customerFirstNameError'] = 'Please enter a first name.';
            $hasError = true;
        }

          if(empty($_POST['lastName'])) {
            $errorMessages['customerLastNameError'] = 'Please enter a last name.';
			$hasError = true;
		  }
           

        if(empty($_POST['emailAddress']) || !(preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9_.+-]+.[a-zA-Z0-9_.+-]+$/", $_POST['emailAddress']))) {
            $errorMessages['emailAddressError'] = 'Please enter a valid email address in the form of example@example.com.';
            $hasError = true;
        }

  

        if(!$hasError) {
		    $survey = new survey($_POST['firstName'], $_POST['lastName'], $_POST['emailAddress']);
            $addSuccess = $surveyDAO->addSurvey($survey);
            echo '<h3>' .$addSuccess . '</h3>';
        }
    }
 }
 
 catch(Exception $e){
            //If there were any database connection/sql issues,
            //an error message will be displayed to the user.
            echo '<h3>Error on page.</h3>';
            echo '<p>' . $e->getMessage() . '</p>';            
        }
 ?>		
       <h1>Basic Survey by Johan Setyobudi</h1>
		<br>
                    <h2>Sign up for our survey!</h2>
                    <p>Please fill out the following form!</p>
                    <form name="survey" id="survey" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstName" id="firstName" size='40'value="<?php echo isset($_POST['firstName']) ? $_POST['firstName']: '';?>">
                                <?php if(isset($errorMessages['customerFirstNameError'])) {
                                    echo '<span style=\'color:red\'>' .$errorMessages['customerFirstNameError'] . '</span>';
                                }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastName" id="lastName" size='40' value="<?php echo isset($_POST['lastName']) ? $_POST['lastName']: '';?>">
                                     <?php if(isset($errorMessages['customerLastNameError'])) {
                                    echo '<span style=\'color:red\'>' .$errorMessages['customerLastNameError'] . '</span>';
                                }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40' value="<?php echo isset($_POST['emailAddress']) ? $_POST['emailAddress']: '';?>"> 
                                    <?php if(isset($errorMessages['emailAddressError'])) {
                                    echo '<span style=\'color:red\'>' .$errorMessages['emailAddressError'] . '</span>';
                                }

                                    ?></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Submit'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
	</div> <!-- End Wrapper -->
    </body>
<?php include 'footer.php';
?>