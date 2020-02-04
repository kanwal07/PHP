<?php
class Student {
    private $studentId;
    private $lastName;
    private $address;
    private $birthDate;
    private $groupId;
    
    function __construct($studentId=null,$lastName=null,$address=null,$birthDate=null,$groupId=null){
        $this->studentId = $studentId;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->groupId = $groupId;
    }
    
    public function getStudentId()
    {
        return $this->studentId;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getBirthDate()
    {
        return $this->birthDate;
    }
    public function getGroupId()
    {
        return $this->groupId;
    }
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }
    
    public function getHeader(){
        $str = "<table border= '1'>";
$head ="<tr><th>Student Id</th><th>Last Name</th><th>Address</th><th>Birthdate</th><th>Group Id</th></tr>";
        return $str.$head;
    }

    public function getFooter(){
        return "</table>";
    }
    
    public function __toString(){
        $data = "<tr><td>$this->studentId</td><td>$this->lastName</td><td>$this->address</td>";
        $data = $data."<td>$this->birthDate</td><td>$this->groupId</td></tr>";
        return $data;
    }
    
    public function getAllStudents($connection){
        $counter = 0;
        $sqlStmt = "SELECT * from student";
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            $studentObj = new Student();
            $studentObj->setStudentId($oneRow['studentId']);
            $studentObj->setLastName($oneRow['lastName']);
            $studentObj->setAddress($oneRow['address']);
            $studentObj->setBirthDate($oneRow['birthDate']);
            $studentObj->setGroupId($oneRow['groupId']);
            $listOfStudents[$counter++]=$studentObj;
        }
        return $listOfStudents;
    }
    
    public function getAllStudentId($connection){
        $counter = 0;
        $sqlStmt = "Select studentId from student";
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            $studentObj = new Student();
            $studentObj->setStudentId($oneRow['studentId']);
            
            $listOfStudents[$counter++] = $studentObj;
        }
        return $listOfStudents;
    }
    
    public function getStudentById($connection){
        //$connection = strval($connection);
        $sqlStmt="Select * from student where studentId=:sid";
        //---- step 1 prepare
        $prepare = $connection->prepare($sqlStmt);
        //-----step 2 bind values
        //$prepare->bindValue(":sid", $this->studentId, PDO::PARAM_INT);
        $sid=$this->studentId;
        $prepare->bindValue(":sid",$sid , PDO::PARAM_INT);
        //echo "$this->studentId";
        //-----step 3 execute the query
        $prepare->execute();
        //-----step 4 fetch the result
        $result = $prepare->fetchAll();
        echo sizeof($result)."<br/>";
        
        //---- function should return a student object
        $studentObj="";
        
        if(sizeof($result) > 0)
        {
            // It means we have at least 1 row with that student id
            
            //we store the information into the variables
            $studentId = $result[0]["studentId"];
            $lastName = $result[0]["lastName"];
            $address = $result[0]["address"];
            $birthDate = $result[0]["birthDate"];
            $groupId = $result[0]["groupId"];
            echo "$lastName<br/>";
            
            //we fill the student object created above with the information fetched
            $studentObj = new Student($studentId, $lastName, $address, $birthDate, $groupId);
            
        }
        return $studentObj;
    }
    
    
}

?>