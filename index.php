<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">		
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script>
		$(function() {
			$("h3").on("click", function() {
				$("#slide").slideToggle("fast");
			});
		});
	</script>
</head>
<body>

	<?php
		include_once('./simple_html_dom.php'); 
		$html = file_get_html('http://www.pedalro.kr/station/station.do?method=stationState&menuIdx=st_01');
		
		$t1 = $html->find('body table tbody tr td table tbody tr td table tbody tr td table tbody tr td table tbody tr td table tbody tr td table tbody tr td table tbody tr');
		$cnt=0;
		$list_cnt=0;
		$list = array(array(),array(),array());
		foreach($t1 as $d) {
			$name1 = $d->childNodes(0)->plaintext;
			$total1 = $d->childNodes(2);
			$left1 = $d->childNodes(4);
			$cnt++;
			if($cnt==12 || $cnt==13 || $cnt==24 || $cnt==73) {
				$list[$list_cnt][0] = $name1;
				$list[$list_cnt][1] = $total1;
				$list[$list_cnt][2] = $left1;
				$list_cnt++;
			}
			$name2 = $d->childNodes(5)->plaintext;
			$total2 = $d->childNodes(7);
			$left2 = $d->childNodes(9);
			$cnt++;
			if($cnt==12 || $cnt==13 || $cnt==24 || $cnt==73) {
				$list[$list_cnt][0] = $name2;
				$list[$list_cnt][1] = $total2;
				$list[$list_cnt][2] = $left2;
				$list_cnt++;
			}
		}
	?>
	<div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">GET ANSAN BIKE</h3>
      </div>

      <div class="jumbotron">
        <h1>Real-Time Ansan Bike Information</h1>
      </div>
    <div id="slide">
	<div class="row">
		<div class="container">
     	<div class="col-xs-12 col-sm-12 box">
     		<?php echo "<br><h4>".$list[0][0]."</h4>"?><br><br><?php echo "<h4>".$list[0][1]."</h4><h4>total</h4>"?><br><br>
     		<h4 class="left"><?php echo $list[0][2]."</h4><h4>left</h4><br><br>"?>
     	</div>
     	
     	<div class="col-xs-12 col-sm-12 box" >
     		<?php echo "<br><h4>".$list[1][0]."</h4>"?><br><br><?php echo "<h4>".$list[1][1]."</h4><h4>total</h4>"?><br><br>
     		<h4 class="left"><?php echo $list[1][2]."</h4><h4>left</h4><br><br>"?>
     	</div>
     	
     	<div class="col-xs-12 col-sm-12 box" >
     		<?php echo "<br><h4>".$list[2][0]."</h4>"?><br><br><?php echo "<h4>".$list[2][1]."</h4><h4>total</h4>"?><br><br>
     		<h4 class="left"><?php echo $list[2][2]?></h4><h4>left</h4><br><br>
     	</div>
     	
     	<div class="col-xs-12 col-sm-12 box" >
     		<?php echo "<br><h4>".$list[3][0]."</h4>"?><br><br><?php echo "<h4>".$list[3][1]."</h4><h4>total</h4>"?><br><br>
     		<h4 class="left"><?php echo $list[3][2]."</h4><h4>left</h4><br><br>"?>
     	</div>
     </div>
 	</div>
    </div>
	

    </div> <!-- /container -->
    <script>
    	var h4 = document.getElementsByClassName("left");
    	for(var i=0;i<4;i++) {
    		if(h4[i].innerHTML<10) {
    			h4[i].style.color = "red";
    		}else if(h4[i].innerHTML>=10 && h4[i].innerHTML<13) {
    			h4[i].style.color = "DarkOrange";
    		}
    	}
    </script>
</body>
</html>