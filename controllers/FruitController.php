<?php

namespace app\controllers;

use app\models\Fruits;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;

class FruitController extends Controller
{

    /**
     * @throws BadRequestHttpException
     */
    public function beforeAction($action): bool
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     *
     *
     */
    public function actionIndex(): array
    {
        $data = Fruits::find()->with('nutrition');
        return $this->paginatedResponse($data);
    }

    /**
     * @param ActiveQuery $model
     * @return array
     */
    public function paginatedResponse(ActiveQuery $model): array
    {
        $model = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return [
            'status' => 200,
            'data' => $model->getModels(),
            'pagination' => [
                'total' => $model->getTotalCount(),
                'page' => $model->getPagination()->getPage() + 1,
                'per_page' => $model->getPagination()->getPageSize(),
                'page_count' => $model->getPagination()->getPageCount(),
            ],
        ];
    }

    public function actionData()
    {
        $data = Fruits::find()->with('nutrition');
        $name = Yii::$app->request->post('name');
        $family = Yii::$app->request->post('family');

        $names = ArrayHelper::getColumn((array)$data, $name);



    }


}
