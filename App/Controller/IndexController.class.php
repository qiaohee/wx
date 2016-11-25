<?php
class IndexController extends BaseController {
    protected function _init(){
        header("Content-Type:text/html; charset=utf-8");
        include('App/Lib/jssdk.php');
        include('App/Lib/Wechat.class.php');

        //分享
        $jssdk = new JSSDK('wx091f708185659476', '69f74ea8fb47c5585967073b537f262a');
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);

        $onMenuShare = array();
        $onMenuShare['imgUrl'] = imgUrl; //图片地址
        $onMenuShare['lineLink'] = lineLink; //分享地址
        $onMenuShare['shareTitle'] = shareTitle; //标题
        $onMenuShare['descContent'] = descContent; //内容
        $this->assign('onMenuShare', $onMenuShare);

        //数据操作
        $this->db = M();
    }

    public function IndexAction(){
        //获取openid
        $openid = $_SESSION["openid"];
        if(empty($openid)) {
            $code = $_GET['code'];
            if (empty($code)) {
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
        }
        $this->display();
    }

    //固定方法,不能删除
    public function LoginAction(){
        $wc = new Wechat();
        $uri = APP_URL;
        $state = 123;
        $openid_url = $wc->get_authorize_url($uri,$state);
        header("Location:{$openid_url}");
    }

    public function ListAction(){
        $ret = $this->db->query("select * from hcsh order by id desc");
        $this->assign('ret',$ret);
        $this->display();
    }

    public function ExportAction(){
        error_reporting(E_ALL);
        include('App/Lib/PHPExcel/PHPExcel.php');
        include('App/Lib/PHPExcel/PHPExcel/Writer/Excel5.php');
        $objPHPExcel = new PHPExcel();

        $ret = $this->db->query("select * from hcsh order by id desc");

        if(empty($ret))
        {
            echo "没有数据导出";
            exit;
        }

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','序号');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','微信名');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','名字');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','电话');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','报名类型');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1','时间');

        //把数据循环写入excel中
        foreach($ret as $key => $value){
            $key+=2;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$key,$value['id']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$key,$value['name']);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$key,$value['username']);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$key,$value['tell']);
            if($value["type"]==1){
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,"冬日暖阳");
            }else{
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,"种下希望 收获幸福");
            }
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$key,date("Y-m-d",$value['time']));
        }
        $objPHPExcel->getActiveSheet()->setTitle(appname);

        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save(str_replace('.php', '.xls', __FILE__));
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Content-Disposition:attachment;filename=".appname.".xls");
        header("Content-Transfer-Encoding:binary");
        $objWriter->save("php://output");
    }
}
