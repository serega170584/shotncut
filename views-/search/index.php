<div class="si-layout__body">
    <div ng-controller="siSearchController as vm" class="container">
        <div ng-cloak="ng-cloak" class="si-search-page">
            <div class="si-search-page__form">
                <div class="si-spacer si-spacer_s_m">
                    <form name="vm.form" ng-submit="vm.submit()" class="si-search-form">
                        <div class="r r_s_m">
                            <div class="r__c r__c_g_1">
                                <input type="text" value="полис" required ng-model="vm.q" ng-change="vm.submit()" class="si-input si-input_s_m si-input_theme_a">
                            </div>
                            <div class="r__c r__c_r">
                                <button type="submit" class="sb-button sb-button_s_m sb-button_theme_a"><span class="sb-button__text">Искать</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div ng-show="vm.currentQ" class="si-search-page__results">
                <div class="si-spacer si-spacer_s_m">
                    <div class="r r_s_m r_a_c">
                        <div class="r__c">
                            <div class="si-search__text">По запросу <span>«{{vm.currentQ}}» </span>
                                <ng-pluralize count="vm.results.length" when="{'0': 'ничего не найдено.', 'one': 'найден {} результат.', 'few': 'найдено {} результата.', 'many': 'найдено {} результатов.'}"></ng-pluralize>
                            </div>
                        </div>
                        <div class="r__c r__c_r">
                            <label class="si-radio si-radio_theme_a">
                                <input type="checkbox" class="si-radio__control"><span class="si-radio__box"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="si-spacer si-spacer_s_m">
                    <div class="si-search-results"><a href="//{{result._source.url}}" ng-repeat="result in vm.results" class="si-search-results__item">
                            <div ng-bind-html="result.highlight.title[0]" class="si-search-results__name"></div>
                            <div ng-bind-html="result.highlight.preview_text[0]" class="si-search-results__text"></div></a></div>
                </div>
                <div ng-hide="true" class="si-layout-section si-layout-section_s_m">
                    <div class="si-pagination si-pagination_theme_a">
                        <div class="si-pagination__item"><a class="si-pagination__link si-pagination__link_active">1</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">2</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">3</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">4</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">5</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">6</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">7</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">8</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">9</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link">10</a></div>
                        <div class="si-pagination__item"><a class="si-pagination__link"><span class="si-pagination__next"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>