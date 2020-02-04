<?php
class Employee {
    
    private $empId;
    private $empName;
    private $empType;
    private $salary;
    private $commission;
    private static $sequence = 100;

    
    
    //Constructor
    function __construct($empName,$empType,$salary,$commission)
    {
        $this->empId = self::$sequence++;
        $this->empName = $empName;
        $this->empType = $empType;
        $this->salary = $salary;
        $this->commission = $commission;
    }
    
    //Setters and Getters
    /**
     * @return number
     */
    public function getEmpId()
    {
        return $this->empId;
    }

    /**
     * @return mixed
     */
    public function getEmpName()
    {
        return $this->empName;
    }

    /**
     * @return mixed
     */
    public function getEmpType()
    {
        return $this->empType;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @param number $empId
     */
    public function setEmpId($empId)
    {
        $this->empId = $empId;
    }

    /**
     * @param mixed $empName
     */
    public function setEmpName($empName)
    {
        $this->empName = $empName;
    }

    /**
     * @param mixed $empType
     */
    public function setEmpType($empType)
    {
        $this->empType = $empType;
    }

    /**
     * @param mixed $salary
     */
  /*  public function setSalary($salary)
    {
        $this->salary = $salary;
    }
*/
    /**
     * @param mixed $commission
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    }
    
    //__toString()
    public function __toString()
    {
        $string1= "<tr><td>$this->empId</td><td>$this->empName</td>";
        
        if($this->empType=='F')
        {
            $string2 = "<td>Full Time</td>";
        }
        else if($this->empType == 'P')
        {
            $string2 = "<td>Part Time</td>";
        }
        else {
            $string2 = "<td>Temporary</td>";
        }
        
        $string3 = "<td>$this->salary</td><td>$this->commission</td></tr>";
        
        return $string1.$string2.$string3;
    }
    
    public static function header()
    {
        echo "<table border='1'>";
        echo "<tr><th>Employee Id</th><th>Employee Name</th><th>Employee Type</th>
            <th>Salary</th><th>Commission</th></tr>";
    }
    
    public static function footer()
    {
        echo "</table>";
    }
    
    //method overloading
    
    public function __call($method, $params)
    {
        switch($method)
        {
            case 'setSalary':
                if(count($params)==1) //providing new salary
                {
                    $this->salary = $params[0];   
                }
                else if(count($params)==2) 
                {
                    if($params[0]==$this->salary) //adding amount to existing salary
                    {
                        $this->salary = $this->salary + $params[1];
                    }
                    else //increasing the salary per percentage
                    {
                        $percentage = $params[1];
                        $this->salary = $this->salary + $this->salary * $percentage;
                    }
                    
                }
                
                else 
                {
                   $this->salary = $this->salary; 
                }
                    
                break;
        }
        
    }

}


?>