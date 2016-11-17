<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>后台管理</title>
	<link href="static/css/bootstrap.min.css" rel="stylesheet" />
	<link href="static/css/style.min.css" rel="stylesheet" />
</head>
<body>
<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">华彩城亲子活动！</h4>
    </div>
    <div class="panel-body">
        <a href="index.php?a=export">导出excl</a>
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
</body>
</html>
