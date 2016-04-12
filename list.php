<?php 
include 'header.php'; 
?>
<title>Survey List by Johan Setyobudi</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?php
	
 require_once('./dao/surveyDAO.php');
   $surveyDAO = new surveyDAO();
           $surveys = $surveyDAO->getSurvey();
            if($surveys){
                  echo '<br>';
			echo '<div id="content" class="clearfix">';
		    echo '<table>';
            echo '<table border=\'1\'>';
            echo '<tr><th>First Name</th><th>Last Name</th><th>Email Address</th></tr>';
                foreach($surveys as $survey){
                    echo '<tr>';
                    echo '<td>' . $survey->getFirstName() . '</td>';
                    echo '<td>' . $survey->getLastName() . '</td>';
                    echo '<td>' . $survey->getEmail() . '</td>';
                    echo '</tr>';
                }
			echo '</table>';
			echo '</div>';
            }           
        ?>
<?php include 'footer.php';?>


