<?php
  
    // Connect to database 
    $connect=mysqli_connect("db","YashaswiniGA","root","leaveapproval");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
        $leave_id=$_GET['id'];
        $sql = mysqli_query($connect,"SELECT * FROM application where id =$leave_id") or die('query failed');
        if(mysqli_num_rows($sql) > 0){
            $user = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            if($user["status"]==1)
            {
                if($user["clORrh"]==='cl')
                {
                $cl=$user["cl_Count"]+$user["numberOfDays"];
                $sql="UPDATE `application` SET 
                    `status`=-1, `cl_Count`=$cl WHERE id='$leave_id'";
                    mysqli_query($connect,$sql);
                }
                if($user["clORrh"]==='rh')
                {
                $rh=$user["rh_Count"]+$user["numberOfDays"];
                $sql="UPDATE `application` SET 
                    `status`=-1, `rh_Count`=$rh WHERE id='$leave_id'";
                    mysqli_query($connect,$sql);
                }
                
            }
            else{
        $sql="UPDATE `application` SET 
            `status`=-1 WHERE id='$leave_id'";
        mysqli_query($connect,$sql);
            }
        }
    }
  
    // Go back to course-page.php
    header('location: leave-status-list.php');
?>