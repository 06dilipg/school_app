<html>
	<head>
		<title>CI Image Upload</title>
	</head>
	<body>
		<?php
		echo $this->session->flashdata('msg');
		echo form_open_multipart();
		echo form_upload('file');
		echo form_submit('upload', 'Upload');
		echo form_close();
		?>
		
		<table>
			<tr>
				<td>File</td>
				<td>Action</td>
			</tr>
			<?php
			if ($get_image->num_rows() > 0) {
				foreach ($get_image->result() as $data) {
					echo '<tr>';
					echo '<td>'.img(array('src' => 'uploads/'.$data->file_name, 'height' => '120', 'width' => '80')).'</td>';
					echo '<td>'.anchor(base_url('uploads/'.$data->file_name), 'View').' | '.anchor('welcome/delete_image/'.$data->image_ID, 'Delete').'</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr>';
				echo '<td colspan="2">Image is empty!</td>';
				echo '</tr>';
			}
			?>
		</table>
	</body>
</html>