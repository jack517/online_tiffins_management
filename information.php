

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal("show");
	});
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
				<p>Please Provide Correct Information</p>
                <form method="post" action="first.php">
<div class="form-group">
                        <input type="text" class="form-control" placeholder="Delivery Address" name="address">
                    </div>
                    <div class="form-group">
                        <input type="Number" class="form-control" placeholder="Phone Number" name="number">
                    </div>
                    <input type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

                                		