<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Policy</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CSS;?>bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CSS;?>bootstrap-theme.min.css" />
<link href="//cdn.datatables.net/fixedheader/3.1.0/css/fixedHeader.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/fixedheader/3.1.0/js/dataTables.fixedHeader.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script src="<?php echo JS;?>bootstrap.min.js"></script>
<script src="<?php echo JS; ?>policy.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo CSS.'common.css'?>" />
<script type="text/javascript">
    var baseUrl = "<?php echo APP_URL; ?>";
</script>
</head>
<body style="line-height:3.5">
    <center>
    <div class="main">
        <div class="page-header"><h1>Edit Policy</h1></div>
            <form autocomplete="off" action="<?php echo site_url('policy/updatePolicy'); ?>" method="post" id="add-policy" enctype='multipart/form-data' >
    			<table>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text"  id="first_name" name="first_name"class="form-control" value="<?php echo $policyDetails['first_name'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name *</td>
                        <td>
                            <input type="text"  id="last_name" name="last_name"class="form-control" required value="<?php echo $policyDetails['last_name'];?>">
                        </td>
                    </tr>
					<tr>
                        <td>Policy Number *</td>
                        <td>
                            <input id="policy_number" type="number" name="policy_number" class="form-control" required value="<?php echo $policyDetails['policy_number'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Start Date *<br/></td>
                        <td>
                            <input type="text" name="start_date" class="date form-control" id="start_date" required onchange="validateDate('start_date');" value="<?php echo $policyDetails['start_date'];?>">   
                        </td>
                    </tr>
                    <tr>
                        <td>End Date *</td>
                        <td>
                            <input type="text" name="end_date" id="end_date" class="date form-control" required onchange="validateDate('end_date');" value="<?php echo $policyDetails['end_date'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Premium</td>
                        <td>
                            <input type="number" name="premium" id="premium" class="form-control" value="<?php echo $policyDetails['premium'];?>">
                        </td>
                    </tr>
                    <input type="hidden" id="base-url" value="<?php  echo base_url(); ?>">
                    <input type="hidden" name="policyId" value="<?php  echo $policyDetails['id']; ?>">
        			<tr>
        				<td class="text-center" colspan="2">
                            <input type="submit" name="submitBtn" id="addPolicy" class="btn btn-primary" value="Update" />
                            <input type="submit" class="btn btn-primary" value="Back" onclick="window.history.back();"/>
        				</td>
        			</tr>
        		</table>
    	   </form>
    	</div>
    </div>
    </center>
</body>
</html>
