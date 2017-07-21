<img src = '<?php echo ADMIN_PATH_IMG?>s_db.png'>&nbsp;<b>CẬP NHẬT TÀI KHOẢN ĐĂNG NHẬP</b>
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


<form action = '<?php echo BASE_URL_ADMIN?>user/edit/<?php echo $data['info']['Id']?>' method = 'post' name = 'formadd'>
	<table>
		<tr>
			<td>UserName</td>
			<td><input type = 'text' name = 'txtuser' size = '50' value = '<?php echo $data['info']['username']?>'></td>
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
			<td><input type = 'text' name = 'txtemail' size = '50' value = '<?php echo $data['info']['email']?>'></td>
		</tr>
		<!--
		<tr>
			<td>Level</td>
			<td><select name = 'level' style = 'width:150px;'>
					<option value = '' selected>- - Chọn level - -</option>
					<option value = '1' <?php if($data['info']['level'] == 1) echo "selected"; ?>>Super Manager</option>
					<option value = '2' <?php if($data['info']['level'] == 2) echo "selected"; ?>>User</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Premission</td>
			<td><input type = 'text' name = 'user' size = '50'></td>
		</tr> -->
		<th colspan = '2'>
			<input type  = 'submit' value = 'Cập nhật' name = 'edituser' class = 'checkdata'>
			<input type  = 'reset' value = 'Làm lại' class = 'checkdata'>
		</th>
	</table>
</form>