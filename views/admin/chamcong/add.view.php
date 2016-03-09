<?php include Configs::ABS_PATH . "/views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH . "/views/admin/user/sidebar.view.php"; ?>

<style>
    .wrap{width:462px;height:230px;border:1px solid black;float:left;}
    .date{width:50px; height:30px;float: left;padding:5px;margin: 2px;}
    .date:hover{cursor:pointer;}
    .chuthich{width:150px;float:right;margin-right:70px;}
    .chuthich table{width:200px;}
    .chuthich table td{margin-left: 5px;}
    .chuthich table td.green_box,
    .chuthich table td.yellow_box,
    .chuthich table td.red_box{width:50px;height:30px;}
    .chuthich table td.green_box{background:#0E8E2C; }
    .chuthich table td.yellow_box{background: rgb(142, 70, 18);}
    .chuthich table td.red_box{background: #2A1907;}
    
    .red {
      background: #2A1907;
      color: white;
      font: bold;
    }
    .green {
      background: #0E8E2C;
      color: white;
    }
    .yellow {
      background: rgb(142, 70, 18);
      color: white;
    }
    
</style>


<script type="text/javascript">
    $(document).ready(function(){
        
        $("input[type=radio]").click(function(){
           var name = $(this).attr("name");
           var value = $(this).attr("value");
           var current = $(this);
           $.ajax({
                url: "<?php echo Configs::ABS_URL; ?>ajax/ajax.php",
                type: "POST",
                data:{"method":"add","manv":name,"trangthai":value},
                dataType: "html",
                success: function(result_01){
                    if(result_01==1){
                        $('input:not(:checked)').parent().removeClass("checked_cc");
                        $('input:not(:checked)').parent().removeClass("error_cc");
                        //$('input:checked').parent().addClass("checked_cc");
                        $(current).parent().addClass("checked_cc");
                        confirm("Đã cập nhật dữ liêu.");
                        
                    }else{
                        $('input:not(:checked)').parent().removeClass("error_cc");
                        $('input:not(:checked)').parent().removeClass("error_cc");
                        //$('input:checked').parent().addClass("error_cc");
                        $(current).parent().addClass("error_cc");
                        confirm("Lỗi! Không thể cập nhật dữ liệu.");
                    }
                }
            
           });
           //$(this).next().removeClass("checked_cc"); 
           
        });
//        $('input').click(function () {
//            $('input:not(:checked)').parent().removeClass("error_cc");
//            $('input:checked').parent().addClass("error_cc");
//        });  
    });

    $(document).ready(function(){
       $("input[name=open_popup]").click(function(){
            var current_click = $(this);
            var manv = $(this).parent().attr("id");
            var thang = $(this).attr("class");
            $.ajax({
                url: "<?php echo Configs::ABS_URL; ?>ajax/load_chamcong_table.php",
                type: "POST",
                dataType: "json",
                data:{"method":"get_status","manv":manv,"thang":thang},
                success: function(result){
                    var html = '';
                    html += "<div class='wrap' id='"+result["manv"]+"'>";
                        $.each(result["ngaythang"],function(key,item){
                            var trangthai;
                            if(result["tinhtrang"][item] == 1){
                                trangthai = "Yes";
                            }else if(result["tinhtrang"][item] == 2){
                                trangthai = "No";
                            }else{
                                trangthai = "None";
                            }
                            if(trangthai==="Yes"){
                                $(".date").addClass("red");
                            }
                            if(trangthai==="Yes"){
                                html += "<div class='date green' id='"+item+"'>"+item+"</div>";
                            }
                            if(trangthai==="No"){
                                html += "<div class='date yellow' id='"+item+"'>"+item+"</div>";
                            }
                            if(trangthai==="None"){
                                html += "<div class='date red' id='"+item+"'>"+item+"</div>";
                            }
                        });
                    html += "</div>";
                    html +="<div class='chuthich'>";
                                    html+="<table>";
                                        html+="<tr>"
                                            html+="<td class='green_box'></td>";
                                            html+="<td>Đi làm</td>";
                                        html+="</tr>";
                                        html+="<tr>";
                                            html+="<td class='yellow_box'></td>";
                                            html+="<td>Nghỉ</td>";
                                        html+="</tr>";
                                        html+="<tr>";
                                            html+="<td class='red_box'></td>";
                                            html+="<td>Chưa có dữ liệu</td>";
                                        html+="</tr>";
                                    html+="</table>";
                                html+=" </div>";
                    $(".info_popup").html(html);
                    
                    //Cap nhat du lieu tu bang tong hop
                    //Click thì gủi dữ lieu tien hanh update
                    $("div.wrap").on("click",".date", function(){
                    //$("div.wrap > .date").click(function(){
                        var current_click = $(this);
                        var date_trans = $(this).attr("id");
                        var manv = $(this).parent().attr("id");
                        $.ajax({
                           url:"<?php echo Configs::ABS_URL; ?>ajax/edit_chamcong_table.php",
                           type:"post",
                           dataType:"json",
                           data:{"data":date_trans,"manv":manv,"method":"edit"},
                           success:function(result_02){
                                console.log(result_02);
                                
                                if(result_02["ketqua"] == "sucess" && result_02["trangthai"] == "2"){
                                    current_click.removeClass("green");
                                    current_click.addClass("yellow");
                                }
                                if(result_02["ketqua"] == "sucess" && result_02["trangthai"] == "1"){
                                    current_click.removeClass("yellow");
                                    current_click.addClass("green");
                                }

                                
                           }//
                           
                        });//day
                        return false;
                    }); //Day a
                    
                    //Ket thuc gui du lieu update
                }
                
            }); //vi tri
       }); 
    });
    
 
                    
                    
        
</script>

<section id="main" class="column">
		
		
        <?php if(isset($message)){
            echo "<h4 class='alert_success'>{$message}</h4>";
        } ?>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>
        <?php
            if(isset($error) && !empty($error)){
                foreach($error as $er){
                    echo "<h4 class='alert_error'>{$er}</h4>";
                }
            }
        
         ?>
		
		<?php $time_now = date("d-m-Y"); ?>
        
		<div class="clear"></div>
		
		<article class="module width_full">
            <form action="" method="post" enctype="multipart/form-data">
			<header><h3>Bảng Chấm Công:<span class="date_chamcong"> Ngày <?php echo $time_now; ?></span></h3></header>
				<div class="module_content">
                        <table class="bordered" >
                        
                            <thead>
                                <tr>
                                    <th rowspan="2">STT</th>
                                    <th rowspan="2">Mã Nhân Viên</th>
                                    <th rowspan="2">Họ Tên</th>
                                    <th colspan="2">Trạng Thái</th>
                                    <th rowspan="2">Chi Tiết</th>
                                </tr> 
                                <tr>
                                    <th>Đi Làm</th>
                                    <th>Nghỉ</th>
                                    
                                </tr>     
                            </thead>
                            
                            <tbody>
                                <div id="popup_content" class="popup">
                                	<div class="popup-header">
                                		<h2>Chi Tiết Chấm Công Tháng <?php echo date("m-Y"); ?></h2>
                                		<a class="close_popup" href="javascript:void(0)"></a>
                                	</div>
                                    
                                	<div class="info_popup">
                                		
                                        
                                	</div><!--Popup hien thi thong tin -->
                                </div>
                            <?php 
                                $i = 1;
                                $y = 0;
                                /////////////////////////////////////////////////////////
                                
                                ////////////////////////////////////////////////////////
                                $thang = date("m");
                                $list = $chamcong->get_list_trangthai_chamcong_by_date(date("Y-m-d")); 
                                
                                foreach($list_staff as $detail){ 
                                   $manv = $detail->get_staff_id();
                                   if(!empty($list)){
                                            $trangthai_checked = $list[$y]->get_trangthai();
                                    
                            ?>
                                <tr>
                                    <td><?php echo $i; ?>
                                            
                                    </td>
                                    <td><?php echo $manv; ?></td>
                                    <td><?php echo $detail->get_staff_fullname(); ?></td>
                                    <td><input type="radio" name="<?php echo $detail->get_staff_id(); ?>" value="1" <?php if($trangthai_checked==1){echo "checked='checked'";} ?>  /><span></span></td>
                                    <td><input type="radio" name="<?php echo $detail->get_staff_id(); ?>" value="2" <?php if($trangthai_checked==2){echo "checked='checked'";} ?> /><span></span></td>
                                    <td >
                                        <div align="center" class="center" id="<?php echo $detail->get_staff_id(); ?>" >
                                        	<input type="button" id="open_popup" name="open_popup" rel="miendatwebPopup" href="#popup_content" class="<?php echo $thang; ?>" value="Xem Chi Tiết"/>
                                        </div>
                                    </td>
                                </tr>
                                
                            <?php $i++;$y++; }else { ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $detail->get_staff_id(); ?></td>
                                    <td><?php echo $detail->get_staff_fullname(); ?></td>
                                    <td><input type="radio" name="<?php echo $detail->get_staff_id(); ?>" value="1"/><span></span></td>
                                    <td><input type="radio" name="<?php echo $detail->get_staff_id(); ?>" value="2"/><span></span></td>
                                    <td >
                                        <div align="center" class="center" id="<?php echo $detail->get_staff_id(); ?>">
                                        	<input type="button" id="open_popup" name="open_popup" rel="miendatwebPopup" href="#popup_content" value="Xem Chi Tiết"/>
                                        </div>
                                    </td>
                                </tr>
                            
                            <?php $i++; }}  ?>    
                            </tbody>
                        
                        </table>
                        
				</div>
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>