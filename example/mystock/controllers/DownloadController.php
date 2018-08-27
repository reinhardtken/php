<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 8/26/18
 * Time: 11:56 AM
 */



namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use yii\data\ArrayDataProvider;

class DownloadController extends Controller
{
    private $path = "/home/ken/workspace/tmp";
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest) {
            return true;
        } else {

            return $this->goHome();
//            return false;
        }
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionTest()
    {
        return Yii::$app->response->sendFile('/home/ken/workspace/code/self/github/php/example/note')->send();
        //return $this->render('about');
    }

    public function actionDo($date, $file)
    {
        $file2 = $this->path.'/'.$file;
        return Yii::$app->response->sendFile($file2)->send();
        //return $this->render('about');
    }

    public function  actionTest2() {
        $out = $this->allFile();
//        $resultData = [
//            ["id"=>1,"name"=>"Cyrus","email"=>"risus@consequatdolorvitae.org"],
//            ["id"=>2,"name"=>"Justin","email"=>"ac.facilisis.facilisis@at.ca"],
//            ["id"=>3,"name"=>"Mason","email"=>"in.cursus.et@arcuacorci.ca"],
//            ["id"=>4,"name"=>"Fulton","email"=>"a@faucibusorciluctus.edu"]
//        ];

        $dataProvider = new ArrayDataProvider([
            'key'=>'id',
            'allModels' => $out,
            'pagination' => false, // 可选 不分页
            'sort' => [
                'attributes' => ['id', 'date', 'name',],
            ],
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider
        ]);
    }

    private function allFile() {
        $path = $this->path;
        $out = array();
        $index = 0;
        foreach(glob("$path/*") as $filename)
        {
            $info = pathinfo($filename);
            $file_name =  basename($filename,'.'.$info['extension']);

            $out[$index] =  ["id"=>$index, 'date'=>'20180827', "name"=>$file_name.'.'.$info['extension']];
            $index ++;
        }
        return $out;
    }
}
