<?php

namespace backend\components\widgets;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends \yii\widgets\Menu
{
    public $options = [
        'class' => 'nav nav-pills nav-sidebar flex-column',
        'data-widget' => "treeview",
        'role' => "menu",
        'data-accordion' => "false"
    ];
    public $itemOptions = ['class' => 'nav-item'];
    public $linkTemplate = "<a class='nav-link {class}' href='{url}'><i class='nav-icon fa fa-dashboard'></i>\n<p>{label}{arrow}</p></a>";
    public $arrowIcon = "<i class='right fa fa-angle-left'></i>";
    public $submenuTemplate = "\n<ul>\n{items}\n</ul>\n";

    /**
     * Renders the menu.
     */
    public function run()
    {
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        if (!empty($items)) {
            $options = $this->options;
            $tag = ArrayHelper::remove($options, 'tag', 'ul');

            echo Html::tag($tag, $this->renderItems($items), $options);
        }
    }

    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item, $child=false, $class='')
    {
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
                '{arrow}' => $child ? $this->arrowIcon : '',
                '{class}' => $class,
            ]);
        }

        $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

        return strtr($template, [
            '{label}' => $item['label'],
        ]);
    }

    /**
     * Recursively renders the menu items (without the container tag).
     * @param array $items the menu items to be rendered recursively
     * @return string the rendering result
     */
    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            // if ($item['active']) {
            //     $class[] = $this->activeCssClass;
            // }
            // if ($i === 0 && $this->firstItemCssClass !== null) {
            //     $class[] = $this->firstItemCssClass;
            // }
            // if ($i === $n - 1 && $this->lastItemCssClass !== null) {
            //     $class[] = $this->lastItemCssClass;
            // }
            // Html::addCssClass($options, $class);

            $class = '';
            if ($item['active']) {
                $class = $class . $this->activeCssClass . '';
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class = $class . $this->firstItemCssClass . '';
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class = $class . $this->lastItemCssClass . '';
            }

            $menu = $this->renderItem($item, !empty($item['items']), $class);
            if (!empty($item['items'])) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);
    }
}
