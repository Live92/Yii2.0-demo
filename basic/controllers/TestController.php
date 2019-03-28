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
    // 接受参数
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

    // 响应
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



    // session 组件
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



    // cookies 组件
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
        print_r($cookies_res->get(''));
        echo $cookies_res->getValue('user_id', 20);

    }

    // 表单
    public function actionFormDemo(){
        $model = new TestForm();
        $this->renderPartial();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('formdata', ['model'=>$model]);
        } else {
            return $this->render('formdemo', ['model'=>$model]);
        }
    }
}