<?php include "header.php"; ?>
<?php
if(isset($_GET['notes_id'])){
	$label = "Update Notes";
	$notes= $notes[0];
	$title = $notes['notes_title'];
	$description = $notes['notes_description'];
	$course = $notes['notes_subject'];
	$button_value = "UPDATE";
	$form_action = base_url('main/modify_notes/'.$notes['notes_id']);
}
else{
	$label = "Add Notes";
	$title = "";
	$description = "";
	$course = "";
	$button_value = "PUBLISH";
	$form_action = base_url('main/insert_notes');
}
?>
<!-- Add/Update Notes Form -->
<div class="cont">
<form class="form" action="<?php echo $form_action ?>" method="POST" enctype="multipart/form-data">
	<h2><?php echo $label; ?></h2>
	<!-- Title Input Field -->
	<div class="form-floating mb-3">
		<input type="text" name="notes_title" class="form-control" id="floatingInput" placeholder="title" value="<?php echo $title ?>" required/>
		<label for="notes_title" class="form-label" >Title</label>
	</div>
	<!-- Description Input Field -->
	<div class="form-floating mb-3">
		<input type="text" name="notes_description" class="form-control" id="floatingInput" placeholder="title" value="<?php echo $description ?>" required/>
		<label for="notes_description" class="form-label">Description</label>
	</div>
	<?php if(!isset($_GET['notes_id'])){ ?>
	<!-- File Input Field -->
    <div class="input-group mb-3">
        <input type="file" class="form-control" name="notes_file" required>
        <label class="input-group-text" for="notes_file">Upload</label>
    </div>
	<?php } ?>
	<!-- Subject Input Field -->
    <div class="form-floating">
		<select class="form-select" name="notes_subject">
			<?php
			foreach($options as $values){
				if(array_values($values)[0]==$course)
				{
					$selected = 'selected';
				}
				else
				{
					$selected = '';
				}
				echo "<option ".$selected." value='".array_values($values)[0]."'>".array_values($values)[1]."</option>";
			}
			?>
		</select>
		<label for="notes_subject">Course</label>
	</div><br>
	<!-- Submit Button -->
	<input class="btn btn-light rounded-5" type="submit" name="insert_notes" value="<?php echo $button_value; ?>"></input>
</form>
</div>
<?php include "footer.php"; ?>