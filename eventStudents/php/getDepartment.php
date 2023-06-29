<? 
    
    $deptID = 0;

    //Get department name by ID
    function getDept($db, $id){
        $queryDept = "SELECT d_Name FROM t_departments";
        $deptResult = @mysqli_query($db, $queryDept);

        if($deptResult){
            while($row = mysqli_fetch_array($deptResult)){
                return $row['d_ID'];
            }
        }else{
            return "Error retreiving Department name".mysqli_error($db);
        }
    }