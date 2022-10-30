<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
        <link href="//cdn.datatables.net/fixedheader/3.1.0/css/fixedHeader.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/fixedheader/3.1.0/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
        <script src="<?php echo JS;?>bootstrap.min.js"></script>
        <script src="<?php echo JS; ?>policy.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS.'common.css'?>" />
        <script type="text/javascript">
            var baseUrl = "<?php echo APP_URL; ?>";
        </script>
    </head>
    <body>
        <div id="main">
            <div style="width:80%;padding:20px;" class="page-header"><h1>Policy List</h1><br/>
                <a class="btn btn-primary" style="text-decoration:none;" href="<?php echo APP_URL; ?>policy/add">Add Policy</a><br/><br/>
                <?php $successMessage = $this->session->flashdata("successMessage");
                if ($successMessage != "") { ?><div class="alert alert-success"><?php echo $successMessage ?></div><?php } ?>
                <div style="margin-top:10px;">
                    <div>
                        <table cellpadding="0" class="table resi-table table-bordered table-responsive" cellspacing="0" border="0" id="policy_list" width="100%" >
                            <thead>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Policy Number</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Premium</th>
                                <th>Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
