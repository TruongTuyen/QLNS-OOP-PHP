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
                url: '<?php echo Configs::ABS_URL; ?>ajax/ktkl.php',
                type: "post",
                data:{"month":choose_month,"type":choose_type},
                dataType: 'json',
                success: function(result){
                    console.log(result);
                    var html = "";
                    
                    var i=1;
                    $.each(result, function(key, item){
                        html += "<tr>"; 
                           html+=    "<td>"+i+"</td>";
                   		   html+=    "<td>"+item["maktkl"]+"</td>";
                    	   html+=    "<td>"+item["hoten"]+"</td>";
                           html+=    "<td>"+item["loai"]+"</td>";
                    	   html+=    "<td>"+item["lydo"]+"</td>";
                           html+=    "<td>"+item["ngaylap"]+"</td>";
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
                        <span style="font-size: 16px;">Chọn Tháng:</span><select name="thang">
                                    <?php
                                        $current_month = date('m');
                                        foreach($list_month as $key=>$value){
                                        
                                    ?>
                                        <option value="<?php echo $value; ?>" <?php if($current_month == $value){echo "selected='selected'";} ?>><?php echo $value; ?></option>
                                    
                                    <?php } ?>
                                        
                                    </select>
                                </label>    
                    </div>
                    <div style="float: left;">
                        <span style="font-size: 16px;">Chọn Loại:</span><select name="loai" >
                                        <option value="1" selected="selected">Khen Thưởng</option>
                                        <option value="2">Kỷ Luật</option>
                                    </select>
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
                				<th>Mã KTKL</th>
                                <th>Họ Tên Nhân Viên</th> 
                                <th>Loại</th>
                                <th>Lý Do</th>
                                <th>Ngày Lập</th>
            				</tr> 
            			</thead> 
            			<tbody> 
                            <?php
                                foreach($list_kt as $key=>$value){
                                 $i=1;   
                                    
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                    				<td><?php echo $value->get_maktkl(); ?></td>
                                    <td><?php echo $value->get_hoten(); ?></td> 
                                    <td><?php echo "Khen Thưởng" ?></td>
                                    <td><?php echo $value->get_lydo(); ?></td>
                                    <td><?php echo $value->get_ngaylap(); ?></td>
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