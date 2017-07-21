<img src = '<?=ADMIN_PATH_IMG?>s_db.png'>&nbsp;<b>THÊM MỚI TÀI KHOẢN ĐĂNG NHẬP</b>
<hr>
<br/>

<?php

if(!empty($data['error']))
{
	echo "<div id = 'error'>";
	echo "<h2>Lỗi!</h2>";
	echo "<ul>";
	echo getError($data['error']);
	echo "</ul>";
	echo "</div>";
}
?>


<form action = '<?php echo BASE_URL_ADMIN?>user/add' method = 'post' name = 'formadd'>
	<table>
		<tr>
			<td>UserName</td>
			<td><input type = 'text' name = 'txtuser' size = '50' value = '<?php if(isset($_POST['txtuser'])) echo $_POST['txtuser'];?>'></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type = 'password' name = 'txtpass' size = '50'></td>
		</tr>
		<tr>
			<td>RePassword</td>
			<td><input type = 'password' name = 'txtrepass' size = '50'></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type = 'text' name = 'txtemail' size = '50' value = '<?php if(isset($_POST['txtemail'])) echo $_POST['txtemail'];?>'></td>
		</tr>
	<!--
		<tr>
			<td>Level</td>
			<td><select name = 'level' style = 'width:150px;'>
					<option value = '' checked>- - Chọn level - -</option>
					<option value = '1'>Super Manager</option>
					<option value = '2'>User</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Premission</td>
			<td><input type = 'text' name = 'user' size = '50'></td>
		</tr> -->
		<th colspan = '2'>
			<input type  = 'submit' value = 'Thêm mới' name = 'addnew' class = 'checkdata'>
			<input type  = 'reset' value = 'Làm lại' class = 'checkdata'>
		</th>
	</table>
</form>