<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>

	<section id="main" class="column">		
		<h4 class="alert_info">Danh sách trình độ học vấn.</h4>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>		
		<article class="module width_3_quarter">
    		<header>
                <h3 class="tabs_involved">Trình độ học vấn</h3>		
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
                                <th>STT</th>
                				<th>Mã TĐHV</th> 
                                <th>Tên TĐHV</th>
                                <th>Chuyên Ngành</th>
                				<th>Thao Tác</th> 
            				</tr> 
            			</thead> 
            			<tbody> 
                        <?php 
                        $i = 1;
                        foreach($list_hv as $hv_detail){  ?>
                            
                            <tr> 
                                <td><?php echo $i; ?></td>
               					<td><?php echo $hv_detail->get_matdhv(); ?></td> 
                				<td><?php echo $hv_detail->get_tdhv(); ?></td>
                                <?php 
                                    $chuyennganh = $hv_detail->get_chuyennganh(); 
                                    if(!empty($chuyennganh)){
                                        $out = $chuyennganh;
                                    }else{
                                        $out = "Không";
                                    }
                                
                                ?>
                                <td><?php echo $out; ?></td>
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
                                    <a href="<?php echo Configs::ABS_URL; ?>admin/trinhdohocvan/change.php?id=<?php echo $hv_detail->get_matdhv();?>&action=edit"><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_edit.png" title="Sửa" /></a>
                                    <a><input type="image" src="<?php echo Configs::ABS_URL;  ?>includes/images/icn_trash.png" title="Xóa" onclick="check_sure_del('<?php echo $hv_detail->get_matdhv(); ?>');"/></a>
                                    
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