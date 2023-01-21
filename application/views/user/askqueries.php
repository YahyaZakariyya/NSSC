<?php include "header.php"; ?>

<!-- Add Query Form -->
<div class="row justify-content-center">
<div class="cont">
<form class="form" action="<?php echo base_url('main/insert_query') ?>" method="POST">
	<!-- Query Input Field -->
	<h2>Ask Query</h2>
    <div class="form-floating  mb-3">
        <textarea class="form-control" placeholder="Input a query here" id="floatingTextarea2" style="height: 100px" name="query"></textarea>
        <label for="floatingTextarea2">Query</label>
    </div>
	<!-- Query Catagory Input Field -->
    <div class="form-floating  mb-3">
		<select class="form-select" name="query_catagory">
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
		<label for="query_catagory">Catagory</label>
	</div>
	<!-- Submit Button -->
	<input type="submit" name="ask_query" class="btn btn-light rounded-5" value="ASK"></input>
</form>
</div>
</div>
<?php include "footer.php"; ?>