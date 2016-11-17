
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>后台管理</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="static/admin/bootstrap.min.css" rel="stylesheet" />
    <link href="static/admin/style.min.css" rel="stylesheet" />
    <link href="static/admin/dataTables.bootstrap.min.css" rel="stylesheet" />

</head>
<body>
<!-- begin #page-container -->
<div id="page-container">
    <div id="content">
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">华彩城亲子活动！</h4>
                </div>
                <div class="alert alert-info fade in">
                    后台数据,请勿泄露网站地址!——————》<a style="color: red;" href="index.php?a=export">导出数据,请点击！！！！</a>
                </div>
                <div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>微信名</th>
                            <th>名字</th>
                            <th>电话</th>
                            <th>类型</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ret as $k => $v){?>
                            <tr class="odd gradeX">
                                <td><?php echo $v['id'];?></td>
                                <td><?php echo $v['name'];?></td>
                                <td><?php echo $v['username'];?></td>
                                <td><?php echo $v['tell'];?></td>
                                <?php if($v['type'] == 1){?>
                                    <td>冬日暖阳</td>
                                <?php }else{?>
                                    <td>种下希望 收获幸福</td>
                                <?php }?>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="static/admin/jquery-1.9.1.min.js"></script>
<script src="static/admin/jquery-ui.min.js"></script>
<script src="static/admin/bootstrap.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="static/admin/jquery.dataTables.js"></script>
<script src="static/admin/dataTables.bootstrap.min.js"></script>
<script src="static/admin/dataTables.autoFill.min.js"></script>
<script src="static/admin/table-manage-autofill.demo.js"></script>
<script src="static/admin/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        TableManageAutofill.init();
    });
</script>
</body>
</html>

