<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>

	<section id="main" class="column">		
		<h4 class="alert_info">Danh sách khen thưởng kỷ luật.</h4>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>		
		<article class="module width_3_quarter">
    		<header>
                <h3 class="tabs_involved">Danh sách khen thưởng, kỷ luật.</h3>		
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
                                <th>STT</th>
                				<th>Mã KT-KL</th>
                                <th>Họ Tên Nhân Viên</th> 
                                <th>Loại</th>
                                <th>Lý Do</th>
                                <th>Ngày Lập</th>
                				<th>Thao Tác</th> 
            				</tr> 
            			</thead> 
            			<tbody> 
                        <?php 
                        $i = 1;
                        foreach($list_ktkl as $detail){  ?>
                            
                            <tr> 
                                <td><?php echo $i; ?></td>
               					<td><?php echo $detail->get_maktkl();?></td> 
                				<td><?php echo $detail->get_hoten(); ?></td>
                                <?php 
                                    $loai =  $detail->get_loai(); 
                                    if($loai == 1){
                                        $type = "Khen Thưởng";
                                    }else{
                                        $type = "Kỷ Luật";
                                    }
                                    
                                ?>
                                <td><?php echo $type; ?></td> 
                				<td><?php echo $detail->get_lydo(); ?></td>
                                <td><?php echo $detail->get_ngaylap(); ?></td>
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
                                    <a href="<?php echo Configs::ABS_URL; ?>admin/ktkl/change.php?id=<?php echo $detail->get_ID();?>&action=edit"><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_edit.png" title="Sửa" /></a>
                                    <a><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_trash.png" title="Xóa" onclick="check_sure_del('<?php echo $detail->get_ID(); ?>');"/></a>
                                    
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