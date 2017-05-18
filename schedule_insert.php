<html>
 <head>
  <title>PHP Denemesi</title>
 </head>
 <body>
 <?php 
session_start();

include "dbconnect.php";

$eko_id=$_SESSION['userSession'];


  	$gelen1 = $_POST['m-9'];
  	$gelen2= $_POST['m-10'];
  	$gelen3=  $_POST['m-11'];
    $gelen4=  $_POST['m-12'];
    $gelen5=  $_POST['m-13'];
    $gelen6=  $_POST['m-14'];
    $gelen7=  $_POST['m-15'];
    $gelen8=  $_POST['m-16'];
    $gelen9=  $_POST['m-17'];
    $gelen10 = $_POST['tu-9'];
    $gelen11= $_POST['tu-10'];
    $gelen12=  $_POST['tu-11'];
    $gelen13=  $_POST['tu-12'];
    $gelen14=  $_POST['tu-13'];
    $gelen15=  $_POST['tu-14'];
    $gelen16=  $_POST['tu-15'];
    $gelen17=  $_POST['tu-16'];
    $gelen18=  $_POST['tu-17'];
    $gelen19 = $_POST['w-9'];
    $gelen20= $_POST['w-10'];
    $gelen21=  $_POST['w-11'];
    $gelen22=  $_POST['w-12'];
    $gelen23=  $_POST['w-13'];
    $gelen24=  $_POST['w-14'];
    $gelen25=  $_POST['w-15'];
    $gelen26=  $_POST['w-16'];
    $gelen27=  $_POST['w-17'];
    $gelen28= $_POST['th-9'];
    $gelen29= $_POST['th-10'];
    $gelen30=  $_POST['th-11'];
    $gelen31=  $_POST['th-12'];
    $gelen32=  $_POST['th-13'];
    $gelen33=  $_POST['th-14'];
    $gelen34=  $_POST['th-15'];
    $gelen35=  $_POST['th-16'];
    $gelen36=  $_POST['th-17'];
    $gelen37 = $_POST['fr-9'];
    $gelen38= $_POST['fr-10'];
    $gelen39=  $_POST['fr-11'];
    $gelen40=  $_POST['fr-12'];
    $gelen41=  $_POST['fr-13'];
    $gelen42=  $_POST['fr-14'];
    $gelen43=  $_POST['fr-15'];
    $gelen44=  $_POST['fr-16'];
    $gelen45=  $_POST['fr-17'];
  	

$m9=explode('!',$gelen1);
$m10=explode('!',$gelen2);
$m11=explode('!',$gelen3);
$m12=explode('!',$gelen4);
$m13=explode('!',$gelen5);
$m14=explode('!',$gelen6);
$m15=explode('!',$gelen7);
$m16=explode('!',$gelen8);
$m17=explode('!',$gelen9);
$tu9=explode('!',$gelen10);
$tu10=explode('!',$gelen11);
$tu11=explode('!',$gelen12);
$tu12=explode('!',$gelen13);
$tu13=explode('!',$gelen14);
$tu14=explode('!',$gelen15);
$tu15=explode('!',$gelen16);
$tu16=explode('!',$gelen17);
$tu17=explode('!',$gelen18);
$w9=explode('!',$gelen19);
$w10=explode('!',$gelen20);
$w11=explode('!',$gelen21);
$w12=explode('!',$gelen22);
$w13=explode('!',$gelen23);
$w14=explode('!',$gelen24);
$w15=explode('!',$gelen25);
$w16=explode('!',$gelen26);
$w17=explode('!',$gelen27);
$th9=explode('!',$gelen28);
$th10=explode('!',$gelen29);
$th11=explode('!',$gelen30);
$th12=explode('!',$gelen31);
$th13=explode('!',$gelen32);
$th14=explode('!',$gelen33);
$th15=explode('!',$gelen34);
$th16=explode('!',$gelen35);
$th17=explode('!',$gelen36);
$fr9=explode('!',$gelen37);
$fr10=explode('!',$gelen38);
$fr11=explode('!',$gelen39);
$fr12=explode('!',$gelen40);
$fr13=explode('!',$gelen41);
$fr14=explode('!',$gelen42);
$fr15=explode('!',$gelen43);
$fr16=explode('!',$gelen44);
$fr17=explode('!',$gelen45);

$sql = "INSERT INTO prof_schedule(prof_eko_id,course_code,room_number,start_time,end_time,day)
VALUES ('$eko_id', '$m9[0]', '$m9[1]', '9:00','9:50','monday'),
        ('$eko_id', '$m10[0]', '$m10[1]', '10:00','11:50','monday'),
        ('$eko_id', '$m11[0]', '$m11[1]', '11:00','12:50','monday'),
        ('$eko_id', '$m12[0]', '$m12[1]', '12:00','12:50','monday'),
        ('$eko_id', '$m13[0]', '$m13[1]', '13:00','13:50','monday'),
        ('$eko_id', '$m14[0]', '$m14[1]', '14:00','14:50','monday'),
        ('$eko_id', '$m15[0]', '$m15[1]', '15:00','15:50','monday'),
        ('$eko_id', '$m16[0]', '$m16[1]', '16:00','16:50','monday'),
        ('$eko_id', '$m17[0]', '$m17[1]', '17:00','17:50','monday'),

        ('$eko_id', '$tu9[0]', '$tu9[1]', '9:00','9:50','tuesday'),
        ('$eko_id', '$tu10[0]', '$tu10[1]', '10:00','11:50','tuesday'),
        ('$eko_id', '$tu11[0]', '$tu11[1]', '11:00','12:50','tuesday'),
        ('$eko_id', '$tu12[0]', '$tu12[1]', '12:00','12:50','tuesday'),
        ('$eko_id', '$tu13[0]', '$tu13[1]', '13:00','13:50','tuesday'),
        ('$eko_id', '$tu14[0]', '$tu14[1]', '14:00','14:50','tuesday'),
        ('$eko_id', '$tu15[0]', '$tu15[1]', '15:00','15:50','tuesday'),
        ('$eko_id', '$tu16[0]', '$tu16[1]', '16:00','16:50','tuesday'),
        ('$eko_id', '$tu17[0]', '$tu17[1]', '17:00','17:50','tuesday'),

        ('$eko_id', '$w9[0]', '$w9[1]', '9:00','9:50','wednesday'),
        ('$eko_id', '$w10[0]', '$w10[1]', '10:00','11:50','wednesday'),
        ('$eko_id', '$w11[0]', '$w11[1]', '11:00','12:50','wednesday'),
        ('$eko_id', '$w12[0]', '$w12[1]', '12:00','12:50','wednesday'),
        ('$eko_id', '$w13[0]', '$w13[1]', '13:00','13:50','wednesday'),
        ('$eko_id', '$w14[0]', '$w14[1]', '14:00','14:50','wednesday'),
        ('$eko_id', '$w15[0]', '$w15[1]', '15:00','15:50','wednesday'),
        ('$eko_id', '$w16[0]', '$w16[1]', '16:00','16:50','wednesday'),
        ('$eko_id', '$w17[0]', '$w17[1]', '17:00','17:50','wednesday'),

        ('$eko_id', '$th9[0]', '$th9[1]', '9:00','9:50','thursday'),
        ('$eko_id', '$th10[0]', '$th10[1]', '10:00','11:50','thursday'),
        ('$eko_id', '$th11[0]', '$th11[1]', '11:00','12:50','thursday'),
        ('$eko_id', '$th12[0]', '$th12[1]', '12:00','12:50','thursday'),
        ('$eko_id', '$th13[0]', '$th13[1]', '13:00','13:50','thursday'),
        ('$eko_id', '$th14[0]', '$th14[1]', '14:00','14:50','thursday'),
        ('$eko_id', '$th15[0]', '$th15[1]', '15:00','15:50','thursday'),
        ('$eko_id', '$th16[0]', '$th16[1]', '16:00','16:50','thursday'),
        ('$eko_id', '$th17[0]', '$th17[1]', '17:00','17:50','thursday'),

        ('$eko_id', '$fr9[0]', '$fr9[1]', '9:00','9:50','friday'),
        ('$eko_id', '$tr10[0]', '$fr10[1]', '10:00','11:50','friday'),
        ('$eko_id', '$fr11[0]', '$fr11[1]', '11:00','12:50','friday'),
        ('$eko_id', '$fr12[0]', '$fr12[1]', '12:00','12:50','friday'),
        ('$eko_id', '$fr13[0]', '$fr13[1]', '13:00','13:50','friday'),
        ('$eko_id', '$fr14[0]', '$fr14[1]', '14:00','14:50','friday'),
        ('$eko_id', '$fr15[0]', '$fr15[1]', '15:00','15:50','friday'),
        ('$eko_id', '$fr16[0]', '$fr16[1]', '16:00','16:50','friday'),
        ('$eko_id', '$fr17[0]', '$fr17[1]', '17:00','17:50','friday')";

if ($DBcon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $DBcon->error;
}

$DBcon->close();
 ?>
 </body>
</html>