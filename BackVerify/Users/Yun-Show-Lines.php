<?php
	if(!isset($_SESSION['lineselect'])){
		foreach(@$conn->query("SELECT `id` FROM `line` LIMIT 0,1") as $firstids){}
		foreach(@$conn->query("SELECT * FROM `line` WHERE id=".$firstids['0']."") as $firstid){}
		@$conn1 = new PDO('mysql:host='.$firstid['sqlhost'].';port='.$firstid['sqlport'].';dbname='.$firstid['sqldata'].';charset=utf8', ''.$firstid['sqlname'].'', ''.$firstid['sqlpswd'].'');
		echo '<!--线路选择-->
                    <div class="form-group">
                                  <div class="col-lg-8">
                                    <select name="linese" class="form-control">';
        foreach(@$conn->query("SELECT `sqlhost` FROM `line` ") as $linesall){
        	echo '<option>'.$linesall['sqlhost'].'</option>';
        }        
        echo '</select>
        
                                  </div>
                                  <button type="button" name="linesebtn" class="btn btn-success">确定</button>
                     </div> 
                     <!--线路选择END-->';
	}
	else{
		foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$_SESSION['lineselect']."'") as $firstid){}
		@$conn1 = new PDO('mysql:host='.$firstid['sqlhost'].';port='.$firstid['sqlport'].';dbname='.$firstid['sqldata'].';charset=utf8', ''.$firstid['sqlname'].'', ''.$firstid['sqlpswd'].'');
		echo '<!--线路选择-->
                    <div class="form-group">
                                  <div class="col-lg-8">
                                    <select name="linese" class="form-control">';
        foreach(@$conn->query("SELECT `sqlhost` FROM `line` ") as $linesall){
        	if($linesall['sqlhost']==$_SESSION['lineselect']){
        		echo "<option selected>".$linesall['sqlhost']."</option>";
        	}
			else{
				echo "<option>".$linesall['sqlhost']."</option>";
			}
        }        
        echo '</select>
        
                                  </div>
                                  <button type="button" name="linesebtn" class="btn btn-success">确定</button>
                     </div> 
                     <!--线路选择END-->';
	}
	
	
	
?>