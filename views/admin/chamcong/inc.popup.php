<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Configs::ABS_URL;?>includes/css/popup.css" />
<script type="text/javascript" src="<?php echo Configs::ABS_URL; ?>includes/js/jquery.1.7.2.js"></script>
<script type="text/javascript" src="<?php echo Configs::ABS_URL; ?>includes/js/jquery.popup.min.js"></script>
<script type="text/javascript" language="JavaScript">
	$(function(){
		/* khởi tạo popup */
        $('input[rel*=miendatwebPopup]').showPopup({ 
        	top : 50, //khoảng cách popup cách so với phía trên
        	closeButton: ".close_popup" , //khai báo nút close cho popup
			scroll : true, //cho phép scroll khi mở popup, mặc định là không cho phép
        	onClose:function(){            	
        		//sự kiện cho phép gọi sau khi đóng popup, cho phép chúng ta gọi 1 số sự kiện khi đóng popup, bạn có thể để null ở đây
        	}
        });	
	});
</script>
<style>
	.center {margin:20px 0;width:100%;}
	#open_popup {color: #FEF4E9;
      float:left;margin-left:10px;
      border: solid 1px #DA7C0C;
      background: #F78D1D;
      background: -webkit-gradient(linear, left top, left bottom, from(#FAA51A), to(#F47A20));
      background: -moz-linear-gradient(top, #FAA51A, #F47A20);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
      display: inline-block;
      outline: none;
      cursor: pointer;
      text-align: center;text-decoration: none;font: 12px/100% Arial, Helvetica, sans-serif;padding: .5em 2em .55em;text-shadow: 0 1px 1px rgba(0, 0, 0, .3);-webkit-border-radius: .5em;-moz-border-radius: .5em;border-radius: .5em;-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
    }
    
    .wrap{width:462px;height:230px;border:1px solid black;}
    .date{width:50px; height:30px;float: left;padding:5px;border:1px solid black;margin: 2px;}
</style>