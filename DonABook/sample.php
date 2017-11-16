<?php
/* 
echo "d1 ".$date1=date("03-12-2016")."<br>";
echo "d2 ".$date2=date("03-10-2016")."<br>";
//$diff=date_diff($date2,$date1);
//echo $diff->format("%a days");
//$date=date('2016-10-03');
//echo date("Y-m-d",strtotime('+1 month'));
echo "Dates<br>";
$bool1=$date1>=$date2;
$bool2=$date1<=$date2;
//echo "d1 >= d2 $date1>$date2 $bool1 <br>";
//echo "d1 <= d2 $date1<$date2 $bool2 <br>";

//if($bool2==0){
//	echo "d1< d2 value is 0";
//}
$daten=date($date1);
$ndate=date_create($daten);

echo date('Y-m-d',strtotime('+1 month',strtotime(date_format($ndate,"Y-m-d"))));


$date = '2008-06-04';
list($year, $month, $day) = explode('-', $date);
$next = date('Y-m-d', mktime(0, 0, 0, $month + 1, $day, $year));
echo "Next <br>".$next;

echo "<br>".$date=date('Y-m-d');
list($year,$month,$day)=explode('-',$date);
$nextm=date('Y-m-d',mktime(0, 0, 0, $month +1 ,$day,$year));
echo "New ".$nextm."<br>";

echo date($date);

*/

$date="04-11-2017";
 echo "Strtotime date ".$ndate=strtotime($date);
 echo "<br> date ".$cdate=date('Y-m-d',$ndate);
 echo "<br> ndate ".date($date); 
?>