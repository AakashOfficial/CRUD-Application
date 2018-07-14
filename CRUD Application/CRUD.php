<?php
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$designation = $_POST['designation'];
$salary = $_POST['salary'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];

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
     echo "<script>alert('At Least One Field Should Be Filled');</script>";
  }else{
     if(!empty($eid)){
         mysqli_query($con,"delete from employee where eid = $eid");
     }
	 if(!empty($ename)){
	    mysqli_query($con,"delete from employee where ename = $ename");
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
	 echo "<script>alert('Deleted');</script>";
  }
}
?>