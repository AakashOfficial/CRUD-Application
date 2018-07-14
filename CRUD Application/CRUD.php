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
?>