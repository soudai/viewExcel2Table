<?php require_once '../load.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title><?= $title ?></title>
        <link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
    </head>
    <body style="margin-top: 70px">
        <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="/"><?= $title ?></a>
        </header>
        <div class="bs-doc s-nav" id="content" style="margin-bottom: 70px">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($excel_data as $sheet_name => $sheet): ?>
                        <h1><?= $sheet_name ?></h1>
                        <table class="table table-hover table-striped" style="">
                            <thead>
                                <tr>
                                    <?= get_header($sheet) ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?= get_body($sheet) ?>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
