<?php
 
  require '../Includes/common.php';
  $school_id = $_COOKIE['school_id'];
  $table = "school".$school_id.".teachers";
  $id = $_COOKIE['cookie'];
  $status = $_POST['exam'];
  $query = "Select * from $table where id = '$id'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $row1 = mysqli_fetch_array($result);
  $class = $row1['class'];
  $sec = $row1['sec'];
  $filename = $_FILES['image']['name'];
  $fileError = $_FILES['image']['error'];
  $fileSize = $_FILES['image']['size'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $ext = explode('.',$filename);
  $actualext = strtolower(end($ext));
  $allowed = array('xls','xlsx');
  $table1 = "school".$school_id.".class_".$class."_".$status;
       if(in_array($actualext, $allowed))
       {
           if($fileError==0)
           {
               if($fileSize<3145728)
               {
                   $id = $_COOKIE['cookie'];
                   $upload_id = "school".$school_id."_class".$class.$sec.$status.".xlsx"; 
                   $destination = "../Uploads/Excel/"."$upload_id";
                   move_uploaded_file($fileTmpName, $destination);
                   include("..\Libraries\PHPExcel-1.8\Classes\PHPExcel\IOFactory.php");
                   $obj = PHPExcel_IOFactory::load($destination);
                   foreach($obj->getWorksheetIterator() as $worksheet)
                   {  
                      $total_row = $worksheet->getHighestRow();
                      for($row = 2;$row<=$total_row;$row++)
                      {
                           $sch_id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                           $table = "school".$school_id.".students";
                           $query1 = "select * from $table where class = '$class' and sec = '$sec' and current_sch_id = '$sch_id'";
                           $result1 = mysqli_query($con, $query1) or die(msyqli_error($con));
                           $count = mysqli_num_rows($result1);
                           if($count!=0)
                           {
                           $row2 = mysqli_fetch_array($result1);
                           $sch_id = $row2['id'];
                           $roll = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                           $name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
                           $eng = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
                           $math = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                           $social = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
                           $hindi = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
                           $science = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
                           $total = $eng+$math+$social+$hindi+$science;
                           $percentage = $total/5;
                           $query = "insert into $table1(id,student_name,eng,math,social,hindi,science,total,percentage,sec,roll) values('$sch_id','$name','$eng','$math','$social','$hindi','$science','$total','$percentage','$sec','$roll')";
                           $result = mysqli_query($con, $query) or die(mysqli_errno($con));
                           header('location:../PHP/index_teacher.php');
                           }
                       }
      
                     }
               }
           }
       }
?>
