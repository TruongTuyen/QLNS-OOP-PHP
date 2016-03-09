<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>

	<section id="main" class="column">		
		<h4 class="alert_info">Danh sách tất cả người dùng có trong hệ thống.</h4>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>		
		<article class="module width_3_quarter">
    		<header>
                <h3 class="tabs_involved">Quản lý người dùng</h3>		
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
               					<th>ID</th> 
                				<th>Email</th> 
                				<th>Họ Tên</th>
                                <th>Giới tính</th> 
                				<th>Quyền</th> 
                                <th>Ngày Tạo</th>
                				<th>Thao Tác</th> 
            				</tr> 
            			</thead> 
            			<tbody> 
                        <?php 
                        foreach($userList as $user_detail){  ?>
                            
                            <tr> 
               					<td><?php echo $user_detail->get_ID(); ?></td> 
                				<td><?php echo $user_detail->get_email(); ?></td> 
                				<td><?php echo $user_detail->get_fullname();  ?></td> 
                                <td><?php echo $user_detail->get_sex(); ?></td>
                				<td><?php echo ($user_detail->get_role() ==1) ? "Người quản trị" : "Người dùng thường"; ?></td> 
                                <?php $date = $user_detail->get_date_created()?>
                                <td><?php echo $date; ?></td>
                				<td>
                                    <a href="<?php echo Configs::ABS_URL; ?>admin/user/change.php?id=<?php echo $user_detail->get_ID();?>&action=edit"><input type="image" src="<?php echo Configs::ABS_URL;  ?>libraries/images/icn_edit.png" title="Sửa" /></a>
                                    <a><input type="image" src="<?php echo Configs::ABS_URL;  ?>libraries/images/icn_trash.png" title="Xóa" onclick="check_sure(<?php echo $user_detail->get_ID(); ?>);"/></a>
                                    <script>
                                        function check_sure(id) {
                                            if (confirm("Are you sure to delete") == true) {
                                                window.location="change.php?action=delete&id="+id; 
                                                return true;
                                            } else {
                                                return false;
                                            }
                                            
                                        }
                                    </script>
                                </td> 
            				</tr> 
                        <?php } ?>
            			</tbody> 
        			</table>
    			</div><!-- end of #tab1 -->
    		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>
</body>
</html>    