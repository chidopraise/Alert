<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert</title>
	<link href="<?php $control->path('images/logo.jpg'); ?>" rel="icon" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php $control->path('lib/style.css'); ?>" rel="stylesheet" />
	
	<?php
		if($control->page_id == 1){
			echo'
				<script>
					var page_id = 1;
				</script>
			';
		}elseif($control->page_id ==2){
			echo'
				<script>
					var page_id = 2;
				</script>
			';
		}
	?>
</head>