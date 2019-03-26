<?php
/**
 * Created by PhpStorm.
 * User: dinghongchao@benbang.com
 * Date: 2019/3/25
 * Time: 17:32
 */

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $request = \YII::$app->request;
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




    public function actionDemo(){
        $response = \YII::$app->response;
        $response->statusCode = '302';
        $response->headers->add('Location', 'https://www.imooc.com/search/?words=yii');
    }


    public function actionDemo02(){
        $response = \YII::$app->response;
        $response->statusCode = '302';
        $response->headers->add('Location', 'https://www.imooc.com/search/?words=yii');
    }
}