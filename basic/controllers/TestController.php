<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/25
 * Time: 17:32
 */

namespace app\controllers;

use app\models\TestForm;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{

    /**-------------------------------     接受参数     ----------------------------------
     */

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $getData = $request->get('id', 'get default value');
        $postData = $request->post('id', 'post default value');


        $requestInfo = [];
        $requestInfo['$request->isGet'] = $request->isGet;
        $requestInfo['$request->isPost'] = $request->isPost;
        $requestInfo['$request->url'] = $request->url;
        $requestInfo['$request->userIP'] = $request->userIP;
        $requestInfo['$request->userAgent'] = $request->userAgent;
        $requestInfo['$request->userHost'] = $request->userHost;



        // 返回所有参数
        $requestInfo['$request->bodyParams'] = $request->bodyParams;
        // 返回所有id参数
        $requestInfo['getBodyParam'] = $request->getBodyParam('id');

        $params = $request->bodyParams;

        var_dump($requestInfo);

        $say = 'Hellow， 丁先生';
        return $this->render('index', ['message'=>$say, 'id'=>$getData]);


    }

    /**-------------------------------     响应     ----------------------------------
     */

    public function actionDemo(){
        $response = Yii::$app->response;
        // 重定向
//        $response->statusCode = '302';
        $response->headers->add('Location', 'https://www.imooc.com/search/?words=yii');
        // 修改header 头部
//        $response->headers->add('pragma', 'no-cache');
//        $response->headers->remove('pragma');
//        $response->headers->set('pragma', 'max-age=5');
        // 下载文件
//        $response->headers->add('Content-disposition', 'attachment; filename="a.jpg"');
        $response->sendFile('./favicon.ico');
    }



    /**-------------------------------     session 组件     ----------------------------------
     */

    public function actionSessionDemo(){
        $session = Yii::$app->session;
        var_dump($session->isActive);
//        $session->open();

        // 方法1 ：
        $session->set('name', 'Tom');
        $session->get('name');
        $session->remove('name');

        // 方法2：
        $session['mobile'] = '16619950134';
        echo $session['mobile'];
    }


    /**-------------------------------     cookies 组件     ----------------------------------
     */

    public function actionCookieDemo(){
        // 待写入数据
        $data = ['name'=>'user_id', 'value'=>'19'];
        // cookie模型
        $cookiseModel = new Yii\web\Cookie($data);
        // 响应-cookie组件
        $cookies_req = Yii::$app->response->cookies;

        $cookies_req->add($cookiseModel);
        $cookies_req->remove('user_id');


        // 读取cookie
        $cookies_res = Yii::$app->request->cookies;
        print_r($cookies_res->get('user_id'));
        echo $cookies_res->getValue('user_id', 20);

    }

    /**-------------------------------     视图     ----------------------------------
     */

    public function actionViewDemo(){
        $data = ['a'=>'蘑菇'];

        // render 呈现视图并在可用时应用布局。
        return $this->render('view-demo', ['data'=>$data]);

        // renderPartial 在不应用布局的情况下呈现视图。
//        return $this->renderPartial('view-demo', ['data'=>$data]);

        // renderContent 通过应用布局呈现静态字符串。
//        return $this->renderContent('view-demo');

    }

    /**-------------------------------     表单     ----------------------------------
     */

    public function actionFormDemo(){
        $model = new TestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('formdata', ['model'=>$model]);
        } else {
            return $this->render('formdemo', ['model'=>$model]);
        }
    }

    /**-------------------------------     日志     ----------------------------------
     */

    public function actionLogDemo(){
        $message = '哈哈哈哈哈' . date('Y-m-d H:i:s');
        Yii::info($message,'yii\sss');
        Yii::warning($message,'debug');
//        Yii::error($message,'debug');
//        Yii::trace($message,'debug');
//        Yii::error($message,'toMe');

        echo $message;

    }

    /**-------------------------------     邮件     ----------------------------------
     */
    public function actionEmailDemo(){
        $mail= \Yii::$app->mailer->compose();
        $mail->setTo('916392142@qq.com');
        $mail->setSubject("邮件测试");
//        $mail->setTextBody('zheshi ');   //发布纯文字文本
        $mail->setHtmlBody("<br>问我我我我我");    //发布可以带html标签的文本
        if($mail->send()){
            echo "success";
        }else{
            echo "failse";
        }
        exit;
    }



























}