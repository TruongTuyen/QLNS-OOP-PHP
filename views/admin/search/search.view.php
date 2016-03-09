<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>

	<section id="main" class="column">		
			<?php if($num_row == 0 ){ ?>
                <h4 class="alert_info">Không tìm thấy kết quả cho từ khóa: <i><?php echo $search; ?></i></h4>
            <?php }else{ ?>
		<article class="module width_3_quarter">
    		<header>
                <h3 class="tabs_involved"><?php echo $num_row; ?> Kết quả tìm kiếm cho từ khóa: <b><i><?php echo $search; ?></i></b></h3>		
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
                                <th>STT</th>
                				<th>Mã Nhân Viên</th> 
                                <th>Họ Tên</th>
                                <th>Ngày Sinh</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                				<th></th> 
            				</tr> 
            			</thead> 
            			<tbody> 
                        <?php 
                            $res = array();
                            while($row = $db->get_fetch()){
                            $res[] = $row;
                        } 
                        $i = 1;
                        foreach($res as $re){
                        ?>
                            <tr> 
                                <td><?php echo $i; ?></td>
               					<td><?php echo $re['manv']; ?></td> 
                				<td><?php echo $re['hoten']; ?></td>
                                <td><?php echo $re['ngaysinh']; ?></td>
                                <td><?php echo $re['diachi']; ?></td>
                                <td><?php echo $re['sdt']; ?></td>
                				<td>
                                    <a href="<?php echo Configs::ABS_URL; ?>admin/staff/detail.php?id=<?php echo $re['manv']?>&action=details">Chi Tiết</a>
                                </td> 
            				</tr> 
                        <?php $i++;} ?>    
            			</tbody> 
        			</table>
    			</div><!-- end of #tab1 -->
    		</div><!-- end of .tab_container -->
		</article><!-- end of content manager article -->
        
        <?php } ?>
		<div class="clear"></div>
		<div class="spacer"></div>
	</section>
</body>
</html>    