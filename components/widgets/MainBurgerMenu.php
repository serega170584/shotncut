<?php


namespace app\components\widgets;


use app\models\category\Category;
use app\models\category\Category2;
use app\models\node\Policy;
use yii\base\Widget;

class MainBurgerMenu extends Widget
{
    public function run()
    {
        $categories = Category::find()->sorted()->all();
        $policies = Policy::find()->with(['category', 'category2'])->active()->all();
        /** @var Policy[][] $policyByCat */
        $policyByCat = [];
        /** @var Policy[][][] $policyByCat2 */
        $policyByCat2 = [];
        $sberPolicy = [];
        $partnersPolicy = [];

        $categories2 = Category2::find()->sorted()->all();
        $partnersSort = [];
        $i = 0;
        foreach ($categories2 as $cat2) {
            $partnersSort[$cat2->id] = $i++;
        }

        foreach ($policies as $policy) {
            $cats = $policy->getCategory()->all();
            /** @var \app\models\category\Category2 $cat2 */
            $cat2 = $policy->getCategory2()->one();
            if (!$cat2) {
                continue;
            }
            /** @var Category2|null $cat2parent */
            $cat2parent = $cat2->getParent()->one();
            if ($cat2->id == Category2::ONLINE || $cat2->id == Category2::OFFLINE) {
                foreach ($cats as $category) {
                    $policyByCat[$category->id][] = $policy;
                    $policyByCat2[$category->id][$cat2->id][] = $policy;
                }
            }
            elseif ($cat2->id == Category2::SBER) {
                $sberPolicy[] = $policy;
            }
            elseif ($cat2parent && $cat2parent->id == Category2::PARTNERS) {
                $partnersPolicy[$cat2->id][] = $policy;
                $partners[$cat2->id] = $cat2;
            }
        }

        uksort($partners, function ($a, $b) use ($partnersSort) {
            return $partnersSort[$a] - $partnersSort[$b];
        });

        return $this->render('mainBurgerMenu', [
            'categories' => $categories,
            'policyByCat' => $policyByCat,
            'policyByCat2' => $policyByCat2,
            'sberPolicy' => $sberPolicy,
            'partnersPolicy' => $partnersPolicy,
            'partners' => $partners
        ]);
    }
}