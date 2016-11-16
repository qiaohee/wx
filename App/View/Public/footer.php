<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"> </script>
<script src="static/js/audioplayer.js"></script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage']
    });
    var imgUrl ="<?php echo $onMenuShare['imgUrl'];?>";
    //var lineLink="http://wx.seacore.com.cn/wxzsmz/hsjh/game/APP/index.php";
    var lineLink="<?php echo $onMenuShare['lineLink'];?>";
    //分享朋友
    var shareTitle="<?php echo $onMenuShare['shareTitle'];?>";
    var descContent="<?php echo $onMenuShare['descContent'];?>";
    wx.ready(function () {
        wx.showOptionMenu();
        var shareData = {
            title: shareTitle,
            desc: descContent,
            link: lineLink,
            imgUrl: imgUrl,
            success:function(){
            },
            cancel:function(){
            }
        };
        wx.onMenuShareAppMessage(shareData);
        wx.onMenuShareTimeline(shareData);
    });
</script>
</body>
</html>