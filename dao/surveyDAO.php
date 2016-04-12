<?php
require_once('abstractDAO.php');
require_once('./model/survey.php');
/**
 * @author Johan Setyobudi
 */
class surveyDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
			throw $e;
        } 
    }
    
    /*
     * Returns an array of survey objects. If no survey exists, returns false.
     */
    public function getSurvey(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM survey');
        $surveys = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new mailing list object, and add it to the array.
                $survey = new survey($row['firstName'], $row['lastName'], $row['emailAddress']);
                $surveys[] = $survey;
            }
            $result->free();
            return $surveys;
        }
        $result->free();
        return false;
    }
	
     
    public function addSurvey($survey){
        
        if(!$this->mysqli->connect_errno){
   
            $query = 'INSERT INTO survey (firstName,lastName,emailAddress) 
                      VALUES (?,?,?)';
         
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('sss', 
                    $survey->getFirstName(),
                    $survey->getLastName(), 
                    $survey->getEmail());
		
			//Execute the statement
					$stmt->execute();
		
			 if($stmt->error){
				 if ($this->mysqli->errno == 1062) {
					return 'Duplicate entry for ' . $survey->getEmail() . '. Entry not added.';
				} else {
					return $stmt->error;
				}
            } else {
				return 'Thank you, your email address of ' . $survey->getEmail() . ' added to the survey';
			}
        		
			}  else {
            return 'Could not connect to Database.';
        }        
    }    
}
?>