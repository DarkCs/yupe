<?php

/**
 * CatalogBackendController контроллер для управления каталогом в панели управления
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2013 amyLabs && Yupe! team
 * @package yupe.modules.catalog.controllers
 * @since 0.1
 *
 */
class CatalogBackendController extends yupe\components\controllers\BackController
{
    public function accessRules()
    {
        return [
            ['allow', 'roles' => ['admin']],
            ['allow', 'actions' => ['index'], 'roles' => ['Catalog.CatalogBackend.Index']],
            ['allow', 'actions' => ['view'], 'roles' => ['Catalog.CatalogBackend.View']],
            ['allow', 'actions' => ['create'], 'roles' => ['Catalog.CatalogBackend.Create']],
            ['allow', 'actions' => ['update', 'inline'], 'roles' => ['Catalog.CatalogBackend.Update']],
            ['allow', 'actions' => ['delete', 'multiaction'], 'roles' => ['Catalog.CatalogBackend.Delete']],
            ['deny']
        ];
    }

    public function filters()
    {
        return CMap::mergeArray(
            parent::filters(),
            [
                'postOnly + delete',
            ]
        );
    }

    public function actions()
    {
        return [
            'inline' => [
                'class'           => 'yupe\components\actions\YInLineEditAction',
                'model'           => 'Good',
                'validAttributes' => ['name', 'slug', 'price', 'article', 'status', 'category_id', 'is_special']
            ],
            'view'   => [
                'class'        => '\yupe\components\actions\ViewAction',
                'modelClass'   => 'Good',
                'errorMessage' => Yii::t('CatalogModule.catalog', 'Page was not found!'),
            ],
            'update' => [
                'class'      => '\yupe\components\actions\UpdateAction',
                'modelClass' => 'Good',
            ],
            'index'  => [
                'class'      => '\yupe\components\actions\IndexAction',
                'modelClass' => 'Good',
            ],
            'create' => [
                'class'      => '\yupe\components\actions\CreateAction',
                'modelClass' => 'Good',
            ],
            'delete' => [
                'class'      => '\yupe\components\actions\DeleteAction',
                'modelClass' => 'Good',
            ],
        ];
    }
}
