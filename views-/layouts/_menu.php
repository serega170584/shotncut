<div class="si-layout__header">
    <div class="si-b-search">
        <div class="container container_s_m">
            <div class="si-b-search__container">
                <form action="<?php echo \yii\helpers\Url::to(['search/index']); ?>" method="get">
                    <input name="q" type="text" class="si-b-search__control"><a href="#" si-search-toggle toggle="false" class="si-b-search__close"><svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="si-header">
      <div class="container">
        <div class="r">
          <div class="r__c">
            <div class="si-header__toggle"><a href="#si-menu" si-menu-toggle="si-menu-toggle" class="si-link js__menu_toggle"><span
                        class="si-link__icon si-icon"><svg width="16" height="24" viewBox="0 0 16 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 5c0-.828.57-1.5 1.255-1.5h13.49C15.438 3.5 16 4.166 16 5c0 .828-.57 1.5-1.255 1.5H1.255C.563 6.5 0 5.834 0 5zm0 7c0-.828.57-1.5 1.255-1.5h13.49c.693 0 1.255.666 1.255 1.5 0 .828-.57 1.5-1.255 1.5H1.255C.562 13.5 0 12.834 0 12zm0 7c0-.828.57-1.5 1.255-1.5h13.49c.693 0 1.255.666 1.255 1.5 0 .828-.57 1.5-1.255 1.5H1.255C.562 20.5 0 19.834 0 19z" fill-rule="evenodd"/></svg></span></a>
            </div>
          </div>
          <div class="r__c">
            <a href="/" class="si-header__logo si-logo"></a>
          </div>
          <div class="r__c r__c_r">
            <div class="si-header__navigation si-navigation">
              <div class="si-navigation__list si-navigation__list_left">
                <div class="si-navigation__item"><a href="#si-menu-goods" si-menu-toggle="si-menu-toggle" class="si-navigation__link si-link js__menu_toggle_oth"><span class="si-link__icon si-icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.95 9v8.59c0 .221-.18.424-.425.424H6.475a.425.425 0 0 1-.425-.424V9H3.5v8.59C3.5 19.486 4.842 21 6.475 21h11.05c1.633 0 2.975-1.514 2.975-3.41V9h-2.55zm-8.2-1v-.77c0-1.029.98-1.922 2.25-1.922s2.25.893 2.25 1.923V8h2.25v-.77C16.5 4.863 14.458 3 12 3S7.5 4.862 7.5 7.23V8h2.25z" fill-rule="evenodd"/></svg></span><span class="si-link__text">Купить онлайн</span></a>
                </div>
                <div class="si-navigation__item"><a href="#si-menu-request" si-menu-toggle="si-menu-toggle" class="si-navigation__link si-link js__menu_toggle_oth js__request_lnk"><span class="si-link__icon si-icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8 5.5C8 4.672 8.663 4 9.491 4H19.51c.822 0 1.49.666 1.49 1.5 0 .828-.663 1.5-1.491 1.5H9.49A1.492 1.492 0 0 1 8 5.5zm3 7a1.5 1.5 0 0 1 1.497-1.5h7.006c.827 0 1.497.666 1.497 1.5a1.5 1.5 0 0 1-1.497 1.5h-7.006A1.495 1.495 0 0 1 11 12.5zm4 7c0-.828.665-1.5 1.499-1.5H19.5c.828 0 1.499.666 1.499 1.5 0 .828-.665 1.5-1.499 1.5h-3a1.496 1.496 0 0 1-1.5-1.5z" fill-rule="evenodd"/></svg></span><span class="si-link__text">Получить выплату</span></a>
                </div>
                <div class="si-navigation__item"><a href="<?php echo \yii\helpers\Url::to(['site/activate'])?>" class="si-navigation__link si-link"><span class="si-link__icon si-icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.95 12.505A5.948 5.948 0 0 1 12 18.45a5.948 5.948 0 0 1-4.54-9.79L5.516 7.01A8.46 8.46 0 0 0 3.5 12.505C3.5 17.196 7.306 21 12 21s8.5-3.804 8.5-8.495A8.468 8.468 0 0 0 18.476 7l-1.943 1.651a5.92 5.92 0 0 1 1.417 3.854zM10.5 4.506A1.5 1.5 0 0 1 12 3c.828 0 1.5.676 1.5 1.506v5.988A1.5 1.5 0 0 1 12 12c-.828 0-1.5-.676-1.5-1.506V4.506z" fill-rule="evenodd"/></svg></span><span class="si-link__text">Активировать полис</span></a>
                </div>
              </div>
              <div class="si-navigation__list si-navigation__list_right">
                <div class="si-navigation__item"><a href="#si-menu-cabinet" si-menu-toggle="si-menu-toggle js__menu_toggle_oth" class="si-navigation__link si-link"><span class="si-link__icon si-icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 21.5H10a1.5 1.5 0 0 1 0-3h8.5v-13H10a1.5 1.5 0 0 1 0-3h10A1.5 1.5 0 0 1 21.5 4v16a1.5 1.5 0 0 1-1.5 1.5zm-9.234-10.773c.105.062.215.112.305.202.179.179.281.397.348.623.038.112.06.23.068.353.001.022.009.043.009.064 0 .011.004.02.004.031 0 .494-.255.911-.623 1.185L8.96 15.101a1.458 1.458 0 0 1-2.061 0 1.451 1.451 0 0 1-.305-1.601H4a1.5 1.5 0 0 1 0-3h2.617a1.44 1.44 0 0 1 2.348-1.574l1.801 1.801z" fill-rule="evenodd"/></svg></span></a>
                </div>
<!--
                <div class="si-navigation__item"><a si-search-toggle="si-search-toggle" toggle="true" class="si-navigation__link si-link"><span class="si-link__icon si-icon"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.73 20.075l-.655.654a.926.926 0 0 1-1.309 0l-4.716-4.717a7.105 7.105 0 1 1 1.962-1.962l4.717 4.716a.926.926 0 0 1 0 1.309zM10.104 5.842a4.263 4.263 0 0 0 0 8.526c.98 0 1.872-.344 2.593-.9.018-.023.025-.05.045-.07l.655-.655c.02-.02.047-.027.07-.045.556-.721.9-1.613.9-2.593a4.263 4.263 0 0 0-4.263-4.263z" fill-rule="evenodd"/></svg></span></a>
                </div>
-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
