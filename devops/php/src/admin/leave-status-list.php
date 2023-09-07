<?php
  
    // Connect to database 
    $connect = mysqli_connect("db","YashaswiniGA","root","leaveapproval");
  
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql = "SELECT * FROM `application`";
    $Sql_query = mysqli_query($connect,$sql);
    $All_leave = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave List</title>
    <!-- <link rel="stylesheet" href="./Styles/stylesheet2.css"> -->
    <link rel="icon" href="./Images/favicon.ico">
     
    <!-- Using internal/embedded css -->
    <style>
        * {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Arial, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 10px;
  text-align: center;
  background: linear-gradient(to bottom right, #3daeda, #e53395);
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}







/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #white;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 90%; /* IE10 */
  flex: 90%;
  background-color:  #white;
  padding: 80px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
 background: linear-gradient(to bottom right, #3daeda, #e53395);
 color: white;	
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}


        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        table,th{
            border-style : solid;
            border-width : 1;
            text-align :center;
        }
        td{
            text-align :center;
        }
    </style>    
</head>
  
<body>

<div class="header">
<img src="./AdminImage/BMS_College_of_Engineering.svg.png" alt="B.M.S" height="120px" width="120px">
  <h1>BMS COLLEGE OF ENGINEERING</h1>
<p> ESTD. 1946 Autonomous Institute, Affiliated to VTU </p>
<pre>


</pre>
<h2> Leave List </h2>

  <p> </p>
</div>

    <div class= "main">
    <h2>Leave List Table</h2>
    <table style="width:100%">
        <!-- TABLE TOP ROW HEADINGS-->
        <tr>
            <th>Sr No.</th>
            <th>Name</th>
            <th>EmployeeID</th>
            <th>Number of days</th>
            <th>CL OR RH</th>
            <th>Leave from</th>
            <th>Leave To</th>
            <th>Reason</th>
            <th>Arrangements</th>
            <th>Leave Status</th>
            <th>Approve/Reject</th>
        </tr>
        <?php
  
            // Use foreach to access all the courses data
            $i=1;
            foreach ($All_leave as $row) { ?>
            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td><?php echo $row['numberOfDays']; ?></td>
                            <td><?php echo $row['clORrh']; ?></td>
                            <td><?php echo $row['leaveFrom']; ?></td>
                            <td><?php echo $row['leaveTo']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['altArrangements']; ?></td>
                <td><?php 
                        if($row['status']=="1") 
                            echo "Approved";
                        else if($row['status']=="-1") 
                            echo "Rejected";
                        else
                            echo "Pending";
                    ?>                          
                </td>
                <td>
                    <?php 
                        echo 
"<a href=reject.php?id=".$row['id']." class='btn red'>Reject</a>";
                        echo 
"<a href=accept.php?id=".$row['id']." class='btn green'>Accept</a>";
                    ?>
            </tr>
           <?php
           $i++;
                }
                // End the foreach loop 
           ?>
    </table>
            </div>
</body>

<div class="footer">
<div class="row">
  <div class="side">
    
    <h5>CONTACT US: </h5>
    
    <p>+91-80-26622130-35</p>
    
  </div>

<div class="side">
    
    <h5>Address:</h5>
    
    <p>P.O. Box No.: 1908, Bull Temple Road,
       Bangalore - 560 019
       Karnataka, India.</p>
    
  </div>


<div class="side">
    <h5>Fax:</h5>
    
    <p>+91-80-26614357</p>

<h5>Email:</h5>
    
    <p>info@bmsce.ac.in</p>
    
  </div>


 
</div>
  <h2> </h2>
</div>
  
</html>