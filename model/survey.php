<?php
	class survey{
		private $firstName;
		private $lastName;
		private $email;
		
		function __construct($firstName, $lastName, $email){
			$this->setFirstName($firstName);
			$this->setLastName($lastName);
			$this->setEmail($email);
		}
		
		public function getFirstName(){
			return $this->firstName;
		}
		
		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}
		
		public function getLastName(){
			return $this->lastName;
		}
		
		public function setLastName($lastName){
			$this->lastName = $lastName;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
	}
?>