<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Maklum Balas</title>
</head>
<body>

<div class="w3-center">
    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>
<?php include "include/nav.php"; ?>
<div class="w3-container">
    <div class="w3-cell-row">
        
        <div class="w3-container w3-cell">
        	<h4 class="w3-center" id="mesej"></h4>
        	<form action="" method="post" id="formMaklumbalas">	       	
            <table class="w3-table w3-border">
                <tbody>
                	<tr>
                		<th>Nama</th>
                		<td><input type="text" name="nama" class="w3-input w3-border" required></td>
                		<th>Email</th>
                		<td><input type="email" name="email" class="w3-input w3-border" required></td>
                	</tr>
                	<tr>
                		<th>Maklum Balas</th>
                		<td colspan="3"><textarea name="maklumbalas" class="w3-input w3-border" cols="10" placeholder="Maklum Balas"></textarea></td>
                	</tr>
                	<tr>
                		<td colspan="4" class="w3-center"><input type="submit" name="hantar" class="w3-button w3-light-gray" value="Hantar">&nbsp;<input type="reset" class="w3-button w3-light-gray" value="Batal"></td>
                	</tr>
                </tbody>
            </table>
            </form>
        </div>

    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>
<script src="js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#formMaklumbalas').on('submit', function(e){
			e.preventDefault();
			var data = $(this).serialize();
			console.log(data);
			$.ajax({
				url: "processFeedback.php",
				method: "POST",
				data: data,
				success: function(data){
					$('#mesej').html(data);
				},
				error: function() {
			        alert('error handling here');
			    }
			});
		});
	});
</script>
</html>