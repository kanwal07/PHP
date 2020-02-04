<?php

class Group {
    private $groupId;
    private $groupDesc;
    
    function __construct($groupId=null,$groupDesc=null){
        $this->groupId = $groupId;
        $this->groupDesc = $groupDesc;
    }
    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return mixed
     */
    public function getGroupDesc()
    {
        return $this->groupDesc;
    }

    /**
     * @param mixed $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @param mixed $groupDesc
     */
    public function setGroupDesc($groupDesc)
    {
        $this->groupDesc = $groupDesc;
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
    
    public function getAllGroupId($connection)
    {
        $counter = 0;
        $sqlStmt = "Select groupId from groups";
        foreach($connection->query($sqlStmt) as $oneRow)
        {
            $groupObj = new Group();
            $groupObj->setGroupId($oneRow['groupId']);
            //$groupObj->setGroupDesc($oneRow['groupDesc']);
            
            $listOfGroups[$counter++] = $groupObj;
        }
        return $listOfGroups;
    }
    
    public function getStudentByGroup($connection)
    {
        //$connection = strval($connection);
        $sqlStmt="Select * from student where groupId =:gid";
        //---- step 1 prepare
        $prepare = $connection->prepare($sqlStmt);
        //-----step 2 bind values
        $prepare->bindValue(":gid", $this->groupId, PDO::PARAM_INT);
        //-----step 3 execute the query
        $prepare->execute();
        //-----step 4 fetch the result
        $result = $prepare->fetchAll();
        
        //---- function should return a student object
        $studentObj="";
        
        if(sizeof($result) > 0)
        {
            // It means we have at least 1 row with that group id
            
            //we store the information into the variables
            $studentId = $result[0]["studentId"];
            $lastName = $result[0]["lastName"];
            $address = $result[0]["address"];
            $birthDate = $result[0]["birthDate"];
            $groupId = $result[0]["groupId"];
            
            //we fill the student object created above with the information fetched
            $studentObj = new Student($studentId, $lastName, $address, $birthDate, $groupId);
            
        }
        return $studentObj;
    }
    
  
}


?>