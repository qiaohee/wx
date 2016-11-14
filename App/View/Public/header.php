<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="text/css" href="static/css/reset.css">
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <script type="text/javascript" src="static/js/jquery.js"></script>
    <script src="static/js/pub.js"></script>
    <script src="static/layer/layer.js"></script>
    <script type="text/javascript">
        new function (){
            var _self = this;
            _self.width = 750;//设置默认最大宽度
            _self.fontSize = 100;//默认字体大小
            _self.widthProportion = function(){var p = (document.body&&document.body.clientWidth||document.getElementsByTagName("html")[0].offsetWidth)/_self.width;return p>1?1:p<0.32?0.32:p;};
            _self.changePage = function(){
                document.getElementsByTagName("html")[0].setAttribute("style","font-size:"+_self.widthProportion()*_self.fontSize+"px !important");
            }
            _self.changePage();
            window.addEventListener('resize',function(){_self.changePage();},false);
        };
    </script>
</head>
<body>