<?php
	foreach(@$conn->query("SELECT `userLevel` FROM `user` WHERE id=".$_SESSION['id']."") as $isuserlevel){}
	if($isuserlevel['0']==0){
		echo '<li class="dropdown dropdown-big">
            <a href="?User=Index" ><span class="label label-success"><i class="icon-cloud"></i></span> 首页</a>
          </li>
          <!-- Sync to server link -->
          <li class="dropdown dropdown-big">
            <a href="?User=Signin" ><span class="label label-danger"><i class="icon-refresh"></i></span> 签到</a>
          </li>
					<li class="dropdown dropdown-big">
            <a href="?User=Certion" ><span class="label label-primary"><i class="icon-glass"></i></span> 认证</a>
          </li>';
	}
	elseif($isuserlevel['0']==1 || $isuserlevel['0']==2){
		echo '<li class="dropdown dropdown-big">
            <a href="?User=Index" ><span class="label label-success"><i class="icon-cloud"></i></span> 首页</a>
          </li>
          <!-- Sync to server link -->
          <li class="dropdown dropdown-big">
            <a href="?User=Signin" ><span class="label label-danger"><i class="icon-refresh"></i></span> 签到</a>
          </li>
			<li class="dropdown dropdown-big">
            <a href="?User=Certion" ><span class="label label-primary"><i class="icon-glass"></i></span> 认证</a>
          </li>
           <li class="dropdown dropdown-big">
            <a href="?User=Camilo" ><span class="label label-info"><i class="icon-asterisk"></i></span> 卡密</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Invite" ><span class="label label-warning"><i class="icon-leaf"></i></span> 邀请码</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Topup" ><span class="label label-success"><i class="icon-bullseye"></i></span> 充值</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Line" ><span class="label label-default"><i class="icon-random"></i></span> 线路管理</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Users" ><span class="label label-info"><i class="icon-user-md"></i></span> 用户管理</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Camprice" ><span class="label label-danger"><i class="icon-shopping-cart"></i></span> 卡密价格</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Certaudit" ><span class="label label-warning"><i class="icon-magnet"></i></span> 认证审核</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Setsite" ><span class="label label-primary"><i class="icon-cogs"></i></span> 站点设置</a>
          </li>';
	}
	elseif($isuserlevel['0']==3){
		echo '<li class="dropdown dropdown-big">
            <a href="?User=Index" ><span class="label label-success"><i class="icon-cloud"></i></span> 首页</a>
          </li>
          <!-- Sync to server link -->
          <li class="dropdown dropdown-big">
            <a href="?User=Signin" ><span class="label label-danger"><i class="icon-refresh"></i></span> 签到</a>
          </li>
			<li class="dropdown dropdown-big">
            <a href="?User=Certion" ><span class="label label-primary"><i class="icon-glass"></i></span> 认证</a>
          </li>
           <li class="dropdown dropdown-big">
            <a href="?User=Camilo" ><span class="label label-info"><i class="icon-asterisk"></i></span> 卡密</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Invite" ><span class="label label-warning"><i class="icon-leaf"></i></span> 邀请码</a>
          </li>
          <li class="dropdown dropdown-big">
            <a href="?User=Topup" ><span class="label label-success"><i class="icon-bullseye"></i></span> 充值</a>
          </li>';
	}
	
	
?>