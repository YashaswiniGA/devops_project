<?php
session_start();
        $user_id = $_SESSION['employeeID'];
        ?>
 
 <!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
        $connect = mysqli_connect("db", "YashaswiniGA", "root", "leaveapproval");
         
        if($connect === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        
        
        $clORrh=$_POST['clORrh'];
        $employeeID=$_POST['employeeID'];
        $name=$_POST['name'];
        $division=$_POST['division'];
        $designation=$_POST['designation'];
        $numberOfDays=$_POST['numberOfDays'];
        $leaveFrom=$_POST['leaveFrom'];
        $leaveTo=$_POST['leaveTo'];
        $reason=$_POST['reason'];
        $altArrangements=$_POST['altArrangements'];

        if($user_id!=$employeeID)
        {
            echo("<script>alert('Please enter valid employeeID')</script>");
            echo("<script>window.location = 'application.php';</script>");
        }
         

        $date1 = strtotime($leaveFrom);
    $date2 = strtotime($leaveTo);
    $diff = $date2 - $date1;
   $days = floor($diff / (60 * 60 * 24));
   if($days<0)
   {
    echo("<script>alert('Please enter valid date')</script>");
    echo("<script>window.location = 'application.php';</script>");
   }
   if($days+1!=$numberOfDays)
   {
    echo("<script>alert('Number of days of leave and the dates you have mentioned are not matching')</script>");
    echo("<script>window.location = 'application.php';</script>");
   }

else
{
        
        $sql = mysqli_query($connect,"SELECT * FROM application where employeeID='$employeeID' ORDER BY id DESC LIMIT 1") or die('query failed');
        if(mysqli_num_rows($sql) > 0){
            $user = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            if($clORrh==='cl')
            {
                if($user["cl_Count"]<$numberOfDays)
                {
                    echo("<script>alert('Leave limit exceeded')</script>");
                    echo("<script>window.location = 'application.php';</script>");
                     die();
                }
                $cl_Count=$user["cl_Count"];
                $rh_Count=$user["rh_Count"];
                $status=0;

                $sql = "INSERT INTO application(clORrh, employeeID, name, division, designation, numberOfDays, leaveFrom, leaveTo, reason, altArrangements, cl_Count, rh_Count, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($connect, $sql);

                if (!$stmt) {
                die("Query error: " . mysqli_error($connect));
                }
                mysqli_stmt_bind_param($stmt, "sssssissssiii", $clORrh, $employeeID, $name, $division, $designation, $numberOfDays, $leaveFrom, $leaveTo, $reason, $altArrangements, $cl_Count, $rh_Count, $status);
                mysqli_stmt_execute($stmt);
                echo("<script>alert('Information has been saved')</script>");
             echo("<script>window.location = 'logout.php';</script>");
            }

            else
            {
                if($user["rh_Count"]<$numberOfDays)
                {
                    echo("<script>alert('Leave limit exceeded')</script>");
                    echo("<script>window.location = 'application.php';</script>");
                     die();
                }
                $cl_Count=$user["cl_Count"];
                $rh_Count=$user["rh_Count"];

                $sql = "INSERT INTO application(clORrh,employeeID,name,division,designation,numberOfDays,leaveFrom,leaveTo,reason,altArrangements,cl_Count,rh_Count,status ) 
        VALUES ('$clORrh','$employeeID','$name','$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count','0')";
        if(mysqli_query($connect, $sql)){
            echo("<script>alert('Information has been saved')</script>");
            echo("<script>window.location = 'logout.php';</script>");
        }
            }
        }
        else
        {
            $cl_Count=15;
                $rh_Count=3;
                $sql = "INSERT INTO application(clORrh,employeeID,name,division,designation,numberOfDays,leaveFrom,leaveTo,reason,altArrangements,cl_Count,rh_Count,status ) 
            VALUES ('$clORrh','$employeeID','$name','$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count','0')";
            if(mysqli_query($connect, $sql)){
                echo("<script>alert('Information has been saved')</script>");
                echo("<script>window.location = 'logout.php';</script>");
             }
            else{
                echo("<script>alert('Leave limit exceeded')</script>");
                    echo("<script>window.location = 'application.php';</script>");
                     die();
            }
        }
    }
        mysqli_close($connect);
        ?>
    </center>
</body>
 
</html>