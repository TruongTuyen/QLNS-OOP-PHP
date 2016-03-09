$("div.wrap > .date").dblclick(function(){
                        var date_trans = $(this).attr("id");
                        var manv = $(this).parent().attr("id");
                        $.ajax({
                           url:"<?php echo Configs::ABS_URL; ?>ajax/edit_chamcong_table.php",
                           type:"post",
                           dataType:"json",
                           data:{"data":date_trans,"manv":manv,"method":"edit"},
                           success:function(result_02){
                                console.log(result_02);
                                var out = '';
                                out += "<div class='wrap' id='"+result_02["manv"]+"'>";
                                    $.each(result_02["ngaythang"],function(key,item){
                                        var trangthai;
                                        if(result_02["tinhtrang"][item] == 1){
                                            trangthai = "Yes";
                                        }else if(result_02["tinhtrang"][item] == 2){
                                            trangthai = "No";
                                        }else{
                                            trangthai = "None";
                                        }
                                        if(trangthai==="Yes"){
                                            $(".date").addClass("red");
                                        }
                                        if(trangthai==="Yes"){
                                            out += "<div class='date green' id='"+item+"'>"+item+"</div>";
                                        }
                                        if(trangthai==="No"){
                                            out += "<div class='date yellow' id='"+item+"'>"+item+"</div>";
                                        }
                                        if(trangthai==="None"){
                                            out += "<div class='date red' id='"+item+"'>"+item+"</div>";
                                        }
                                    });
                                out += "</div>";
                                 
                                out +="<div class='chuthich'>";
                                    out+="<table>";
                                        out+="<tr>"
                                            out+="<td class='green_box'></td>";
                                            out+="<td>Đi làm</td>";
                                        out+="</tr>";
                                        out+="<tr>";
                                            out+="<td class='yellow_box'></td>";
                                            out+="<td>Nghỉ</td>";
                                        out+="</tr>";
                                        out+="<tr>";
                                            out+="<td class='red_box'></td>";
                                            out+="<td>Chưa có dữ liệu</td>";
                                        out+="</tr>";
                                    out+="</table>";
                                out+=" </div>";
                                $(".info_popup").html(out);
                                
                           }
                        });
                    }); //End update data