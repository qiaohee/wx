<?php
class IndexController extends BaseController {
    protected function _init(){
        header("Content-Type:text/html; charset=utf-8");
        include('App/Lib/jssdk.php');
        include('App/Lib/Wechat.class.php');
    }

    public function IndexAction(){
        //获取openid
        $openid = $_SESSION["openid"];
        if(empty($openid)) {
            if ($_GET['code'] == "") {
                $this->redirect('index.php?a=login');
            } else {
                $wc = new Wechat();
                $re = $wc->get_access_token($_GET['code']);

                $access_token = $re['access_token'];
                $openid = $re['openid'];
                $re = $wc->get_user_info($access_token, $openid);
                $headimgurl = $re['headimgurl'];
                $nickname = $re['nickname'];
                //昵称
                $strEncode = '';
                $length = mb_strlen($nickname, 'utf-8');
                for ($i = 0; $i < $length; $i++) {
                    $_tmpStr = mb_substr($nickname, $i, 1, 'utf-8');
                    if (strlen($_tmpStr) >= 4) {
                        $strEncode .= '';
                    } else {
                        $strEncode .= $_tmpStr;
                    }
                }
                $nickname = $strEncode;
                $_SESSION["nickname"] = $nickname;
                //用户头像，openid
                $_SESSION["headimgurl"] = $headimgurl;
                $_SESSION["openid"] = $openid;
            }
        }

        if(!empty($openid)){
            $time = time();
            $time = date("Y-m-d", $time);
            $temp_time = strtotime($time);
            $openid = $_SESSION["openid"];
            $name = $_SESSION["nickname"];
            $head = $_SESSION["headimgurl"];
            echo $openid;
            exit;
        }

        //分享
        $jssdk = new JSSDK('wx091f708185659476', '69f74ea8fb47c5585967073b537f262a');
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);

        $onMenuShare = array();
        $onMenuShare['imgUrl'] = '1'; //图片地址
        $onMenuShare['lineLink'] = '1'; //分享地址
        $onMenuShare['shareTitle'] = '1'; //标题
        $onMenuShare['descContent'] = '1'; //内容

        $this->assign('onMenuShare', $onMenuShare);
        $this->display();
    }

    public function LoginAction(){
        $wc = new Wechat();
        $uri = "http://wx.seacore.com.cn/web2016/SinglePHP/index.php";
        $state = 123;
        $ss = $wc->get_authorize_url($uri,$state);
        header("Location:{$ss}");
    }
}
