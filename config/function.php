<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 15:29
 */

if(!function_exists('dropDown'))
{
    /**
     * 后台状态栏
     * @param $column
     * @param null $value
     * @return bool|mixed
     */
    function dropDown ($column, $value = null) {
        $dropDownList = [
            'status'=> [
                '0'=> Yii::t('common','UnActivity'),
                '1'=> Yii::t('common','Activity'),
            ],
            //分类模块选择
            'model'=> [
                'about'=>'关于我们',
                'service'=>'服务项目',
                'product'=>'产品展示',
                'news'=>'新闻中心',
                'contact'=>'联系我们',
                'banner'=>'轮播图',
            ],
            //有新的字段要实现下拉规则，可像上面这样进行添加
            // ......
        ];
        //根据具体值显示对应的值
        if ($value !== null)
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column][$value] : false;
        //返回关联数组，用户下拉的filter实现
        else
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column] : false;
    }
}


if(!function_exists('getUploadPath')) {
    /**
     * 上传文件保存的路径
     * @return string
     */
    function getUploadPath()
    {
        return yiiParams('uploadPath').Yii::$app->controller->id.'/'.date('Ymd').'/';
    }
}


if(!function_exists('getSavePath')) {
    /**
     * 上传文件保存的路径 $isFirst为1时，返回值前面没有斜贡/
     * @return string
     */
    function getSavePath($isFirst=0)
    {
        $dir = yiiParams('uploadPrefix') . yiiParams('uploadPath') . Yii::$app->controller->id . '/' . date('Ymd') . '/';
        if($isFirst) {
            return substr($dir,1,strlen($dir)-1);
        } else {
            return $dir;
        }

    }
}
if(!function_exists('getWebConfig'))
{
    function getWebConfig()
    {
        return yii\helpers\ArrayHelper::map(\app\models\Config::find()->select(['name','value'])->where(['language'=>\app\components\message\Language::getLanguageNum()])->asArray()->all(), 'name', 'value');
    }
}

if(!function_exists('getUEditorConfig'))
{
    /**
     * 在线编辑器配置
     * @return array
     */
    function getUEditorConfig()
    {
        $controller = Yii::$app->controller->id;
        $controller = replaceBackend($controller);
        return [
//            "imageUrlPrefix"  => yiiParams('imgHost'),
            "imagePathFormat" => "/upload/{$controller}/image/{yyyy}{mm}{dd}/{time}{rand:4}",
            'scrawlPathFormat' => "/upload/{$controller}/image/{yyyy}{mm}{dd}/{time}{rand:4}",
            'snapscreenPathFormat' => "/upload/{$controller}/image/{yyyy}{mm}{dd}/{time}{rand:4}",
            'catcherPathFormat' => "/upload/{$controller}/image/{yyyy}{mm}{dd}/{time}{rand:4}",
            'videoPathFormat' => "/upload/{$controller}/video/{yyyy}{mm}{dd}/{time}{rand:4}",
            'filePathFormat' => "/upload/{$controller}/file/{yyyy}{mm}{dd}/{time}{rand:4}",
            'imageManagerListPath' => "/upload/{$controller}/image/",
            'fileManagerListPath' => "/upload/{$controller}/file/",
            'fileManagerUrlPrefix' => '../../data',
        ];
    }
}
