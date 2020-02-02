<?php 
/**
 * 邮件发送2
 *
 * @param: $name[string]        接收人姓名
 * @param: $email[string]       接收人邮件地址
 * @param: $subject[string]     邮件标题
 * @param: $content[string]     邮件内容
 * @param: $type[int]           0 普通邮件， 1 HTML邮件
 * @param: $notification[bool]  true 要求回执， false 不用回执
 *
 * @return boolean
 */
function send_mail($name, $email, $subject, $content, $type = 0, $notification=false){

    include_once('cls_smtp.php');

    //******************** 配置信息 ********************************
    $smtpserver = $GLOBALS['_CFG']['smtp_host'];//SMTP服务器
    $smtpserverport = $GLOBALS['_CFG']['smtp_port'];//SMTP服务器端口
    $smtpusermail = $GLOBALS['_CFG']['smtp_user'];//SMTP服务器的用户邮箱(发送者)
    $smtpemailto = $email;//发送给谁
    $smtpuser = $GLOBALS['_CFG']['smtp_user'];//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
    $smtppass = $GLOBALS['_CFG']['smtp_pass'];//SMTP服务器的授权码
    $mailtitle = $subject;//邮件主题
    $mailcontent = $content;//邮件内容
    $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    //************************ 配置信息 ****************************
    $smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug = true;//是否显示发送的调试信息

    // 发送邮件
    $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

    // var_dump($state);exit;

    // echo "<div style='width:300px; margin:36px auto;'>";
    if($state==""){
        // echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
        // echo "<a href='index.html'>点此返回</a>";
        // exit();
        return false;
    }
    // echo "恭喜！邮件发送成功！！";
    // echo "<a href='index.html'>点此返回</a>";
    // echo "</div>";
    return true;
}
 ?>