<aside id="sidebar" class="column">
		<form class="quick_search" action="<?php echo Configs::ABS_URL; ?>admin/search/search.php" method="post">
			<input name="seach" type="text" value="Tìm kiếm theo tên hoặc mã nhân viên" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"/>
		</form>
		<hr/>
		<h3>Nhân Viên</h3>
		<ul class="toggle" class="active">
			<li class="icn_staff"><a href="<?php echo Configs::ABS_URL; ?>admin/staff/add.php">Thêm nhân viên</a></li>
			<li class="icn_list_staff"><a href="<?php echo Configs::ABS_URL; ?>admin/staff/list.php">Danh sách nhân viên</a></li>
			
		</ul>
		<h3>Người dùng</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo  Configs::ABS_URL; ?>admin/user/add.php">Thêm Người Dùng</a></li>
			<li class="icn_view_users"><a href="<?php echo  Configs::ABS_URL; ?>admin/user/list.php">Danh Sách Người Dùng</a></li>
		</ul>
        <h3>Chức Vụ</h3>
		<ul class="toggle">
			<li class="icn_chucvu"><a href="<?php echo  Configs::ABS_URL; ?>admin/chucvu/add.php">Thêm Chức Vụ</a></li>
			<li class="icn_list_chucvu"><a href="<?php echo  Configs::ABS_URL; ?>admin/chucvu/list.php">Danh Sách Chức Vụ</a></li>
		</ul>
        <h3>Phòng Ban</h3>
		<ul class="toggle">
			<li class="icn_phongban"><a href="<?php echo  Configs::ABS_URL; ?>admin/phongban/add.php">Thêm Phòng Ban</a></li>
			<li class="icn_list_phongban"><a href="<?php echo  Configs::ABS_URL; ?>admin/phongban/list.php">Danh Sách Phòng Ban</a></li>
		</ul>
        <h3>Trình Độ Học Vấn</h3>
		<ul class="toggle">
			<li class="icn_hocvan"><a href="<?php echo  Configs::ABS_URL; ?>admin/trinhdohocvan/add.php">Thêm Trình Độ Học Vấn</a></li>
			<li class="icn_list_hocvan"><a href="<?php echo  Configs::ABS_URL; ?>admin/trinhdohocvan/list.php">Danh Sách Trình Độ Học Vấn</a></li>
		</ul>
        <h3>Hợp Đồng</h3>
		<ul class="toggle">
			<li class="icn_hopdong"><a href="<?php echo  Configs::ABS_URL; ?>admin/hopdong/add.php">Thêm Hợp Đồng</a></li>
			<li class="icn_list_hopdong"><a href="<?php echo  Configs::ABS_URL; ?>admin/hopdong/list.php">Danh Sách Hợp Đồng</a></li>
		</ul>
        <h3>Lương Thỏa Thuận</h3>
		<ul class="toggle">
			<li class="icn_luongthoathuan"><a href="<?php echo  Configs::ABS_URL; ?>admin/luongthoathuan/add.php">Thêm Thỏa Thuận Lương</a></li>
			<li class="icn_dsthoathan"><a href="<?php echo  Configs::ABS_URL; ?>admin/luongthoathuan/list.php">Danh Sách Thỏa Thuận Lương</a></li>
		</ul>
        <h3>Sổ Bảo Hiểm</h3>
		<ul class="toggle">
			<li class="icn_sbh"><a href="<?php echo  Configs::ABS_URL; ?>admin/sobaohiem/add.php">Thêm Sổ Bảo Hiểm</a></li>
			<li class="icn_list_sbh"><a href="<?php echo  Configs::ABS_URL; ?>admin/sobaohiem/list.php">Danh Sách Sổ Bảo Hiểm</a></li>
		</ul>
		<h3>Khen Thưởng, Kỷ Luật</h3>
		<ul class="toggle">
			<li class="icn_khenthuong"><a href="<?php echo  Configs::ABS_URL; ?>admin/ktkl/add.php">Thêm Khen Thưởng, Kỷ Luật</a></li>
			<li class="icn_list_khenthuong"><a href="<?php echo  Configs::ABS_URL; ?>admin/ktkl/list.php">Danh Sách Khen Thưởng, Kỷ Luật</a></li>
		</ul>
        <h3>Chấm Công</h3>
		<ul class="toggle">
			<li class="icn_chamcong"><a href="<?php echo  Configs::ABS_URL; ?>admin/chamcong/add.php">Chấm Công</a></li>
		</ul>
		<h3>Tổng Hợp</h3>
		<ul class="toggle">
			<li class="icn_khenthuong"><a href="<?php echo Configs::ABS_URL; ?>admin/tonghop/list_kt_kl.php">Khen thưởng, kỷ luật theo tháng</a></li>
			<li class="icn_security"><a href="<?php echo Configs::ABS_URL; ?>admin/tonghop/list_luong_thang.php">Bảng lương theo tháng</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; <?php echo date("Y"); ?> Website Admin</strong></p>
			<p>Theme by <a href="http://localhost">Truong Tuyen Group</a></p>
		</footer>
	</aside><!-- end of sidebar -->