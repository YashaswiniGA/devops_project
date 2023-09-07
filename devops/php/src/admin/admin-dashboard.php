<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave List</title>
    <link rel="stylesheet" href="./Styles/stylesheet2.css">
    <link rel="icon" href="./Images/favicon.ico">
    <title>Admin-Dashboard</title>

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
a { 
font-weight: bold; 
display:inline-block; 
font-size: 25px;
text-decoration:none;
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
<h2> Admin Dashboard </h2>

  <p> </p>
</div>


<div class= "main">
    <?php include "database.php";?>

    <div class="container">
     <center><h2>Welcome to admin Dashboard</h2></center>
     <div>
        <a href="leave-status-list.php">Leave List</a>
</div>
        <h1> User Records</h1>
        <table class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>EmployeeID</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody >
                <?php
                $i=1;
                $query="Select *from signup";
                $res=mysqli_query($connect,$query);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php $i++;}} else{
                        echo "No record Found!";
                    }?>
                    </tbody>
                </table>
                </div>
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