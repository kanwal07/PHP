<?php
class Teacher{
    private $teacherId;
    private $name;
    private $phone;
    private $email;
    
    //null in the parameters means that we can have an empty constructor too or we can skip any of the parameters
    function __construct($teacherId=null, $name=null, $phone=null, $email=null){
        $this->teacherId = $teacherId;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    public function getTeacherId(){
        return $this->teacherId;
    }
    public function getName(){
        return $this->name;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getEmail(){
        return $this->email;
    }
    
    public function setTeacherId($teacherId){
        $this->teacherId = $teacherId;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPhone($phone){
        $this->phone=$phone;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    
    public static function getHeader(){
        $str = "<table border='1'>";
        $head = "<tr><th>Teacher ID </th><th>Teacher Name</th>";
        $head = $head. "<th>Phone</th><th>Email</th></tr>";
        return $str.$head;
    }
    
    public static function getFooter(){
        return "</table>";
    }
    
    public function __toString(){
        $data = "<tr><td>$this->teacherId</td><td>$this->name</td>";
        $data = $data."<td>$this->phone</td><td>$this->email</td>";
        return $data;
    }
    
    //CRUD methods
    
    public function create($connection){
        $teacherId = $this->teacherId;
        $name = $this->name;
        $phone = $this->phone;
        $email = $this->email;
        
        $sqlStmt = "INSERT into teacher values ($teacherId,'$name','$phone','$email')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
    public function updatePhone($connection){
        $teacherId = $this->teacherId;
        $phone = $this->phone;
        $sqlStmt = "UPDATE teacher set phone = $phone where teacherId = $teacherId";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
    public function delete($connection)
    {
        $teacherId=$this->teacherId;
        $sqlStmt = "DELETE from teacher where teacherId = $teacherId";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    
    public function getAllTeachers($connection){
        $counter = 0;
        $sqlStmt = "SELECT * from teacher";
        foreach($connection->query($sqlStmt) as $oneRow){
            $teacherObj = new Teacher();
            $teacherObj->setTeacherId($oneRow['teacherId']);
            $teacherObj->setName($oneRow['name']);
            $teacherObj->setPhone($oneRow['phone']);
            $teacherObj->setEmail($oneRow['email']);
            $listOfTeachers[$counter++]=$teacherObj;
        }
        return $listOfTeachers;
    }
    
    public function displayAllTeachers($listOfTeachers){
        echo Teacher::getHeader();
        foreach($listOfTeachers as $oneTeacher)
        {
            echo $oneTeacher;
        }
        echo Teacher::getFooter();
    }
    
    public function getTeacherById($connection)
    {
        $sqlStmt = "Select * from teacher where teacherId =:tid";
        //---- step 1 prepare 
        $prepare = $connection->prepare($sqlStmt);
        //-----step 2 bind values
        $prepare->bindValue(":tid", $this->teacherId, PDO :: PARAM_INT);
        //-----step 3 execute the query
        $prepare->execute();
        //-----step 4 fetch the result
        $result = $prepare->fetchAll();
        
        //---- function should return a teacher object
        $tObj="";
        
        if(sizeof($result) > 0)
        {
            // It means we have at least 1 row with that teacher id
            
            //we store the information into the variables
            $teacherId = $result[0]["teacherId"];
            $name = $result[0]["name"];
            $phone = $result[0]["phone"];
            $email = $result[0]["email"];
            
            //we fill the teacher object created above with the information fetched
            $tObj = new Teacher($teacherId, $name, $phone, $email);
            
        }
        return $tObj;
        
    }
}
?>