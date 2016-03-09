<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>

	<section id="main" class="column">		
		<h4 class="alert_info">Danh sách hợp đồng.</h4>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>		
		<article class="module width_3_quarter">
    		<header>
                <h3 class="tabs_involved">Danh sách hợp đồng</h3>		
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
                                <th>STT</th>
                				<th>Mã Hợp Đồng</th> 
                                <th>Tên Hợp Đồng</th>
                                <th>Ngày Kí Kết</th>
                                <th>Ngày Hết Hạn</th>
                				<th>Thao Tác</th> 
            				</tr> 
            			</thead> 
            			<tbody> 
                        <?php 
                        $i = 1;
                        foreach($list_hd as $hd_detail){  ?>
                            
                            <tr> 
                                <td><?php echo $i; ?></td>
               					<td><?php echo $hd_detail->get_mahd(); ?></td> 
                				<td><?php echo $hd_detail->get_tenhd(); ?></td>
                                <td><?php echo $hd_detail->get_ngayky(); ?></td>
                                <?php 
                                    $ngayhethan = $hd_detail->get_ngayhethan();
                                    if(empty($ngayhethan)){
                                        $output = "NULL";
                                    }else{
                                        $output = $ngayhethan;
                                    }
                                 ?>
                                <td><?php echo $output; ?></td>
                				<td>
                                    <script>
                                        function check_sure_del(macv) {
                                            if (confirm("Are you sure to delete") == true) {
                                                window.location="change.php?action=delete&id="+macv; 
                                                return true;
                                            } else {
                                                return false;
                                            }
                                            
                                        }
                                    </script>
                                    <a href="<?php echo Configs::ABS_URL; ?>admin/hopdong/change.php?id=<?php echo $hd_detail->get_mahd();?>&action=edit"><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_edit.png" title="Sửa" /></a>
                                    <a><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_trash.png" title="Xóa" onclick="check_sure_del('<?php echo $hd_detail->get_mahd(); ?>');"/></a>
                                    
                                </td> 
            				</tr> 
                            
                        <?php $i++;} ?>
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