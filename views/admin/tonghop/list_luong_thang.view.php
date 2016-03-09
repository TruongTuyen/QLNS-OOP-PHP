<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>
<script type="text/javascript">
    $(document).ready(function(){
       var choose_month;
       var choose_type;
       choose_month = $("select[name=thang]").val();
       choose_type = $("select[name=loai]").val();
       
       $("select[name=thang]").change(function(){
            choose_month = $(this).val();
       });
       
       $("select[name=loai]").change(function(){
            choose_type = $(this).val();
       });
       
       $("input[type=button]").click(function(){
            $.ajax({
                url: '<?php echo Configs::ABS_URL; ?>ajax/luongthang.php',
                type: "post",
                data:{"month":choose_month},
                dataType: 'json',
                success: function(result){
                    console.log(result);
                    var html = "";
                    
                    var i=1;
                    $.each(result, function(key, item){
                        html += "<tr>"; 
                           html+=    "<td>"+i+"</td>";
                   		   html+=    "<td>"+item["manv"]+"</td>";
                    	   html+=    "<td>"+item["fullname"]+"</td>";
                           html+=    "<td>"+item["songaycong"]+"</td>";
                    	   html+=    "<td>"+item["luongthuclinh"]+"</td>";
                		html+=  "</tr>";
                        $("tbody").html(html);
                        i++;
                    });
                }
           });
        
       });
       
       
        
    });

</script>
	<section id="main" class="column">		
			<div style="float: right;margin-right:30px;margin-top:10px;">
                    <div style="float: left;">
                                <label>
                                    <span style="font-size: 16px;">Chọn Tháng:</span>
                                    <select name="thang">
                                        <?php
                                            $current_month = date('m');
                                            foreach($list_month as $key=>$value){
                                            
                                        ?>
                                            <option value="<?php echo $value; ?>" <?php if($current_month == $value){echo "selected='selected'";} ?>><?php echo $value; ?></option>
                                        
                                        <?php } ?>
                                        
                                    </select>
                                </label>    
                    </div>
                    
                    <div style="float: right;"><input class="alt_btn" style="padding:7px 5px;margin-top:17px;margin-left:10px;border-radius:5px;color:white;cursor:pointer;" type="button" value="Lấy Danh Sách"  /></div>
                    
                
            </div>		
		<article class="module width_3_quarter">
            
    		<header>
                <h3 class="tabs_involved" >Danh sách khen thưởng.</h3>	
                
    		</header>
    		<div class="tab_container">
    			<div id="tab1" class="tab_content">
        			<table class="tablesorter" cellspacing="0"> 
            			<thead> 
            				<tr> 
                                <th>STT</th>
                				<th>Mã NV</th>
                                <th>Họ Tên</th> 
                                <th>Số Ngày Công</th>
                                <th>Lương Thực Lĩnh</th>
            				</tr> 
            			</thead> 
            			<tbody> 
                            <?php
                                foreach($list_staff as $key=>$value){
                                 $i=1;   
                                 $songaycong = $luong_thang->get_so_ngay_cong($value->get_staff_id(),$current_month);
                                 $luongcb_hesoluong = $luong_thang->get_luongcoban_hesoluong($value->get_staff_id());
                                 
                                 $luong_thuc_linh = $luong_thang->tinh_luong_thuc_linh($songaycong,$luongcb_hesoluong["luongcoban"],$luongcb_hesoluong["hesoluong"]);
                                 $luong_formated = $luong_thang->currency_format($luong_thuc_linh);  
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                    				<td><?php echo $value->get_staff_id(); ?></td>
                                    <td><?php echo $value->get_staff_fullname(); ?></td> 
                                    <td><?php echo $songaycong; ?></td>
                                    <td><?php echo $luong_formated; ?></td>
                                </tr>
                            <?php        
                               $i++; }
                            ?>
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