<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<title>HomePage</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome!</h1>

	<div id="body">
		<p>Please, select one of the main categories below</p>

        <div class="row">
            <div class="col-6">

                <div class="form-group">
                    <label for="title">Select Category:</label>
                    <select name="cats" class="form-control" style="width:350px">
                        <option value="">--- Select Category ---</option>
                        <?php
                            foreach ($parents as $key => $value) {
                                echo "<option value='".$value->name."'>Category ".$value->name."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <h5>Your selected items:</h5>
                <div id="items"></div>
            </div>
        </div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="cats"]').on('change', function() {
            var catName = $(this).val();
            if(catName) {
                $.ajax({
                    url: "entity/generateChildren",
                    type: "POST",
                    dataType: "json",
                    data: {parent:catName},
                    success:function(data) {
                        $('select[name="cats"]').empty();
                        $('#items').append('<p>'+catName+'</p>');
                        $('select[name="cats"]').append('<option value="">--- Select Sub-Category ---</option>');
                        $.each(data, function(key, value) {
                            $('select[name="cats"]').append('<option value="'+ value.name +'">'+value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="cats"]').empty();
            }
        });
    });
</script>
</body>
</html>