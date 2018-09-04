<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax - Autocomplete Search</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style type="text/css">
		.form-container { width: 300px; margin: 60px auto; }
		ul { background: #bdc3c7; border-radius: 5px;}
		ul li { padding: 8px 12px; cursor: pointer; }
		li:hover { background: #eee; }
	</style>
</head>
<body>

	<div class="form-container form-group">
		<label for="country">Search Country : </label>
		<input type="text" name="country" id="country" class="form-control">
		<div id="country-list"></div>
	</div>

	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#country').keyup(function(){
				var query = $(this).val();

				if(query != ''){
					$.ajax({
						url:"search.php",
						method:"POST",
						data:{query:query},
						success: function(data){
							$('#country-list').fadeIn();
							$('#country-list').html(data);
						}

					});
				} else {
					$('#country-list').fadeOut();
				}
			});

			$(document).on('click','li', function(){
				$('#country').val($(this).text());
				$('#country-list').fadeOut();
			}); 

			$('#country').focusout(function(){
				$('#country-list').fadeOut();
			});
		});

	</script>
	
</body>
</html>