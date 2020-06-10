<?php







if(isset($_POST['searchFailed'])){


  $batch0 = $_POST['batch0'];
  $levelTerm0 = $_POST['std_level0'];

  if(empty($batch0) || empty($levelTerm0)) {

    echo "

      <script>
        alert (' Data can not be Empty');
        window.location.href= 'teacher.php';
      </script>

    ";
  }



  else{



    $levelTermPrint = "";



    if($levelTerm0 == 1) {
      $levelTermPrint = "Level: 1, Term: 1";
    }

    elseif ($levelTerm0 == 2) {
        $levelTermPrint = "Level: 1, Term: 2";
    }

    elseif ($levelTerm0 == 3) {
        $levelTermPrint = "Level: 2, Term: 1";
    }

    elseif ($levelTerm0 == 4) {
        $levelTermPrint = "Level: 2, Term: 2";
    }

    elseif ($levelTerm0 == 5) {
        $levelTermPrint = "Level: 3, Term: 1";
    }

    elseif ($levelTerm0 == 6) {
        $levelTermPrint = "Level: 3, Term: 2";
    }

    elseif ($levelTerm0 == 7) {
        $levelTermPrint = "Level: 4, Term: 1";
    }

    elseif ($levelTerm0 == 8) {
        $levelTermPrint = "Level: 4, Term: 2";
    }

























    require('fpdf182/fpdf.php');


    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con,'result_system');




    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();


    $pdf->SetFont('Arial','B',24);

    // CELL (width, height, text, border, End Line, [Align-L,C,R])










    $pdf->Cell(60, 20, '',0,0);
    $pdf->Cell(90, 20, $levelTermPrint,0,0);
    $pdf->Cell(40, 20, '',0,1);



    $pdf->SetFont('Arial','B',18);


    $pdf->Cell(80, 10, '',0,0);
    $pdf->Cell(90, 10, 'Batch : '.$batch0,0,0);
    $pdf->Cell(20, 10, '',0,1);




    $pdf->Cell(190, 10, '',0,1);


    $pdf->SetFont('Arial','B',11);



    $pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(50,50,100);












    $pdf->Cell(38, 10, 'ID',1,0,'',true);
    $pdf->Cell(38, 10, 'Course Code',1,0,'',true);
    $pdf->Cell(38, 10, 'Batch',1,0,'',true);
    $pdf->Cell(38, 10, 'Semister',1,0,'',true);
    $pdf->Cell(38, 10, 'Grade',1,1,'',true);






    $pdf->SetFont('Arial','',9);
    $pdf->SetDrawColor(50,50,100);






    $query0 = mysqli_query($con,"select coursecode,batch,semister,id,grade from add_result_sessional where batch = $batch0 and semister = $levelTerm0");
    $query1 = mysqli_query($con,"select coursecode,batch,semister,id,grade from add_result where batch = $batch0 and semister = $levelTerm0");
    $query2 = mysqli_query($con,"select coursecode,batch,semister,studentId,failed from failed_student where batch = $batch0 and semister = $levelTerm0");






    while($data = mysqli_fetch_array($query0)){

      $pdf->Cell(38, 5, $data['id'],1,0);
      $pdf->Cell(38, 5, $data['coursecode'],1,0);
      $pdf->Cell(38, 5, $data['batch'],1,0);
      $pdf->Cell(38, 5, $data['semister'],1,0);
      $pdf->Cell(38, 5, $data['grade'],1,1);

    }


    while($data = mysqli_fetch_array($query1)){

      $pdf->Cell(38, 5, $data['id'],1,0);
      $pdf->Cell(38, 5, $data['coursecode'],1,0);
      $pdf->Cell(38, 5, $data['batch'],1,0);
      $pdf->Cell(38, 5, $data['semister'],1,0);
      $pdf->Cell(38, 5, $data['grade'],1,1);

    }





    $pdf->AddPage();





    $pdf->SetFont('Arial','B',24);



    $pdf->Cell(60, 20, '',0,0);
    $pdf->Cell(90, 20, 'FAILED STUDENTS',0,0);
    $pdf->Cell(40, 20, '',0,1);


    $pdf->Cell(190, 10, '',0,1);
















    $pdf->SetFont('Arial','B',11);



    $pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(50,50,100);

















    $pdf->Cell(38, 10, 'ID',1,0,'',true);
    $pdf->Cell(38, 10, 'Course Code',1,0,'',true);
    $pdf->Cell(38, 10, 'Batch',1,0,'',true);
    $pdf->Cell(38, 10, 'Semister',1,0,'',true);
    $pdf->Cell(38, 10, 'Failed',1,1,'',true);




    $pdf->SetFont('Arial','',9);
    $pdf->SetDrawColor(50,50,100);



    while($data = mysqli_fetch_array($query2)){

      $pdf->Cell(38, 5, $data['studentId'],1,0);
      $pdf->Cell(38, 5, $data['coursecode'],1,0);
      $pdf->Cell(38, 5, $data['batch'],1,0);
      $pdf->Cell(38, 5, $data['semister'],1,0);
      $pdf->Cell(38, 5, $data['failed'],1,1);

    }









    $pdf->Output();







  }























}




















































 ?>
