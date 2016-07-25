<?php 
	foreach(@$conn->query("SELECT * FROM `user` WHERE `id`=".$_SESSION['id']."") as $indexseleuser){}
	if($indexseleuser['isLine']=="0" || $indexseleuser['lineName']=="0"){
		echo '<div class="alert alert-success">
                      你现在还没有绑定云免账户，绑定账户之后就可以直接查看云免信息了，点击下方按钮进行绑定吧！
                                          </div>
                                          <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="bangdingid" class="btn btn-success">绑定云免账号</button>
                                  </div>
                                </div>';
	}
	else{
		foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$indexseleuser['isLine']."'") as $indexseleline){}
		$connindex = new PDO('mysql:host='.$indexseleline['sqlhost'].';port='.$indexseleline['sqlport'].';dbname='.$indexseleline['sqldata'].';
					charset=utf8', ''.$indexseleline['sqlname'].'', ''.$indexseleline['sqlpswd'].'');
		foreach(@$connindex->query("SELECT * FROM `test` WHERE `username`='".$indexseleuser['lineName']."'") as $indexselename){}			
		switch(@$indexselename['mo']){
			case 0:$indexmo="天数";break;
			case 1:$indexmo="流量";break;
			case 2:$indexmo="混合";break;
		}
		echo '<div class="row">
                      <div class="col-md-4">
                        <div class="well">
                          <h2>'.$indexmo.'</h2>
                          <p>模式</p>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="well">
                          <h2>'.floor(($indexselename['quota']-$indexselename['now'])/1024/1024).'</h2>
                          <p>剩余流量</p>                        
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="well">
                          <h2>'.$indexselename['zq'].'</h2>
                          <p>剩余天数</p>
                        </div>';
	}
	
?>
					
                       </form>
                      </div>
					</div>
                   </div>
                   </div>