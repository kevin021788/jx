<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 13:45
 */

namespace app\components\message;
use Yii;

class Language
{

    public static $lang = [
        'en-US' => 2,
        'fa' => 3,
    ];

    public static $languages = [
        'en-US' => 'English (US)',
        'fa' => 'Farsi',
    ];

    public static function getLanguageItems()
    {
        $languages = self::$languages;
        $items = [];
        $itemParent = [];
        foreach ($languages as $language => $languageLabel) {
            $params = array_merge(['/lang/language'], Yii::$app->request->queryParams, ['lang' => $language]);
            $label = '<i style="vertical-align: middle;" class="lang-flag flag-' . $language . '"></i>' . $languageLabel;
            $url = yii\helpers\Url::to($params);
            if (strtolower(Yii::$app->language) == strtolower($language)) {
                $itemParent = [
                    'label' => $label,
                    'linkOptions' => [
                        'title' => $languageLabel,
                        'encodeLabels' => false,
                        'data' => [
                            'hover' => "dropdown",
                            'delay' => 100,
                            'hover-delay' => 0,
                        ]
                    ]
                ];
            } else {
                $items[] = [
                    'label' => $label,
                    'url' => $url,
                    'encodeLabels' => false,
                    'linkOptions' => [
                        'title' => $languageLabel,
                        //'data-method' => 'post'
                    ]
                ];
            }
        }
        //language-picker dropdown-list large
        $itemParent['options'] = [
            'class' => 'language-picker large',
        ];
        $itemParent['items'] = $items;
        return $itemParent;

    }


    /**
     * 返回相应语言的数字，默认是1
     * @return int|mixed
     */
    public static function getLanguageNum()
    {
        $lan = Yii::$app->language;
        return empty(self::$lang[$lan]) ? 1 : self::$lang[$lan];
    }
}