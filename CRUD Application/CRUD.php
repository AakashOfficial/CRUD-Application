<?php
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$designation = $_POST['designation'];
$salary = $_POST['salary'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$search = $_POST['search'];

$con = mysqli_connect("localhost","root","") or die("Not connected to mysql database");
$c = "create database employee";
$res = mysqli_query($con,$c);

$db = mysqli_select_db($con,"employee");

$c = "create table employee(eid int,ename varchar(30),designation varchar(20),salary int,city varchar(20),mob bigint)";
$res = mysqli_query($con,$c);

if($_POST['insert']){
  if(empty($eid) || empty($ename) || empty($designation) || empty($salary) || empty($city) || empty($mobile)){
     echo "<script> alert('All the Fields Are Not Filled. Please Fill and Try Again Later');</script>";
  }else{
     $insert_Query = "insert into employee values($eid,'$ename','$designation',$salary,'$city',$mobile)";
	 $res = mysqli_query($con,$insert_Query);
	 echo "<script>alert('Record Inserted');</script>";
  }
}

if($_POST['delete']){
  if(empty($eid) && empty($name) && empty($designation) && empty($salary) && empty($city) && empty($mobile)){
     echo "<script>alert('At Least One Field Should Be Filled For Delete');</script>";
  }else{
     if(!empty($eid)){
         mysqli_query($con,"delete from employee where eid = $eid");
     }
	 if(!empty($ename)){
	   // 
	 } 
	 if(!empty($designation)){
	    mysqli_query($con,"delete from employee where designation = $designation");
	 }
	 if(!empty($salary)){
	    mysqli_query($con,"delete from employee where salary = $salary");
	 }
	 if(!empty($city)){
	    mysqli_query($con,"delete from employee where city = $city");
	 }
	 if(!empty($mobile)){
	    mysqli_query($con,"delete from employee where mob = $mobile");
	 }	 
	 echo "<script>alert('Record Deleted');</script>";
  }
}

if($_POST['update']){
  if(empty($eid) && empty($name) && empty($designation) && empty($salary) && empty($city) && empty($mobile)){
     echo "<script>alert('At Least One Field Should Be Filled For Update');</script>";
  }else{
     if(empty($eid)){
         echo "<script>alert('Employee id Should Be Filled For Updation');</script>";
     }else{
	    if(!empty($ename)){
	    mysqli_query($con,"update employee set ename = '$ename' where eid = $eid");
		}
		if(!empty($designation)){
	    mysqli_query($con,"update employee set designation = '$designation' where eid = $eid");
	    }
		if(!empty($salary)){
	    mysqli_query($con,"update employee set salary = $salary where eid = $eid");
	    }
	    if(!empty($city)){
	    mysqli_query($con,"update employee set city = '$city' where eid = $eid");
	    }
	    if(!empty($mobile)){
	    mysqli_query($con,"update employee set mob = $mobile where eid = $eid");
	    }	 
	 echo "<script>alert('Record Updated');</script>"; 
	 } 	 
	 }
  }
if($_POST['display']){
 if(empty($eid) && empty($name) && empty($designation) && empty($salary) && empty($city) && empty($mobile)){
     $res = mysqli_query($con,"select * from employee");
	 while($row=mysqli_fetch_row($res)){
	   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].'<br>';
	 }
 }else{
     // For Showing The Data By Using Employee ID
     if(!empty($eid)){
	    mysqli_query($con,"select * from employee where eid = $eid");
		
	 }
	 if(!empty($ename)){
	    mysqli_query($con,"select * from employee where ");
	 }
 }
}
  
if($_POST['searchbtn']){
  if(empty($search)){
    echo "<script>alert('The Search Field Should Be Fill');</script>";
  }else{
     $search_Query = "select * from employee where eid = $search || ename = '$search' || designation = '$search' || salary = $search || city = '$search' || mob = $search";
	 $res = mysqli_query($con,$search_Query);
	 <table>
	 <th>Employee Id</th>
	 <th>Employee Name</th>
	 <th>Employee Designation</th>
	 <th>Employee Salary</th>
	 <th>Employee City</th>
	 <th>Employee Mobile No</th>
	  while($row = mysqli_fetch_row($res)){
	   echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td></tr><br>';
	 }
	 </table>
  }
}    
?>
