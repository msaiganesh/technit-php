<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>CYBERHUNT | Leader Board</title>

	<link rel="stylesheet" type="text/css" href="css/style.css" />
  
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.backgroundPosition.js" type="text/javascript"></script>
	<style>
		a.action_link {
text-decoration: none;
}
	</style>
	<script type="text/javascript">
	
		$(function(){
		
		  $('#midground').css({backgroundPosition: '0px 0px'});
		  $('#foreground').css({backgroundPosition: '0px 0px'});
		  $('#background').css({backgroundPosition: '0px 0px'});
		
			$('#midground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 240000, 'linear');
			
			$('#foreground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 120000, 'linear');
			
			$('#background').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 480000, 'linear');
			
		});
	</script>
	
</head>

<body background="sherlock1.jpg" bgproperties="fixed" link="white" alink="white" vlink="white">
    <div id="background"></div>
	<div id="midground"></div>
	<div id="foreground"></div>
	
	
		
		
	


<?php
include"../conf.php";
	$val='<div id="page-wrap">
		
		<h1><center>CYBERHUNT 2k16<center></h1>';
					
			

   $sql="SELECT `username`,`college`, `lastcorrect`, `ques_sub` FROM `user` ORDER BY ques_sub DESC , lastcorrect ASC";
   $result=mysqli_query($conn,$sql);
   echo $val;
	$pgno=$_GET['pg'];
   echo display($result,$pgno);
   mysqli_close($conn);
   
  function display($result,$pgno)
	{
		$num=mysqli_num_rows($result);
		$r='';
	    $r.='<center>';
		$r.='<div>';
		$r.='<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;border:none;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-mb3i{background-color:#D2E4FC;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-6k2t{background-color:#D2E4FC;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg" width="700">
  <tr>
    <th class="tg-baqh" colspan="9"><h2>Hunters</h2></th>
  </tr>
  <tr>
    <td class="tg-6k2t">Rank</td>
    <td class="tg-6k2t">College</td>
    <td class="tg-6k2t" >User name</td>
    <td class="tg-6k2t" >Level</td>
  </tr>';
		
		$onPageEnteries=20;
		$i=$pgno*$onPageEnteries+1;
		$start_of_entry=$onPageEnteries*$pgno;
		for($p=1;$p<=($pgno*$onPageEnteries);$p+=1)
		{
			/*$r=$r.($p+1).' - '.($p * $onPageEnteries+1);
			if($p % 5==0)
			{$r.='<br>';}*/
			$row=mysqli_fetch_array($result);
		}
		$count=1;
		/*while($row=mysqli_fetch_array($result))
	    { if($count==$start_of_entry)
			{break;}
			$count+=1;
		}*/
		
	    while($row=mysqli_fetch_array($result))
	    {
		   $r.='<tr>';
		   $r.='<td class="tg-6k2t">'.$i.'</td>';
		   $r.='<td class="tg-6k2t">'.htmlspecialchars($row['college']).'</td>';
		   $r.='<td class="tg-6k2t">'.htmlspecialchars($row['username']).'</td>';
		   $r.='<td class="tg-6k2t">'.htmlspecialchars($row['ques_sub']).'</td>';
		   $r.='</tr>';
		   $i=$i+1;
		   if($count==$onPageEnteries)
		   {break;}
			$count+=1;
	    }
		
	    $r.='</table>';
		//echo $num;
		$k=$num/ $onPageEnteries;
		//echo $k;
		$host='http://staging.cyberhunt.co.in/recent_techniti/leader/';
		for($p=0;$p<$k;$p+=1)
		{
			$r.='<a class="action_link" href="'.$host.'leader.php?pg='.($p).'">';
			//<font size="3" face="comic sans MS" class="ahsjksdhs">
			//$r.='<nav class="cl-effect-1">';
			$r=$r.($p*$onPageEnteries+1).' - '.(($p+1) * $onPageEnteries).' &nbsp;&nbsp;&nbsp;&nbsp;';
			$r.='</a>';
			//$r.='</nav>';
			if($p % 6==0 && $p!=0)
			{$r.='<br>';}
		}
	    return $r;
    }
?>
			
<br/><br/><br/><br/>
			</div>
			<hr/>
			<div><p>copyright@ cyberhunt | techniti2k16 </p></div>
			</center>
			<!-- Related demos -->
			</div><!-- /container -->
		<script src="TweenLite.min.js"></script>
		<script src="EasePack.min.js"></script>
		<script src="rAF.js"></script>
		<script src="demo-1.js"></script>
</div>
</body></html>