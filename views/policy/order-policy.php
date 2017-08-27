<div class="js-popup-overlay b-popup__overlay">
    <a href="#" class="js-popup-close b-popup__close"></a>
    <div class="js-popup-order b-popup b-popup__order">
        <h4>Заявка на полис</h4>
        <form action="" class="js-order-form b-order-form">
            <p>Оставьте номер телефона, и мы вам перезвоним:</p>
            <div class="b-input__box">
                <label for="order_phone" class="b-label">Телефон</label>
                <input id="order_phone" name="order[phone]" class="js-required b-input phone" type="tel">
            </div>
            <div class="b-input__box">
                <label for="order_phone" class="b-label">Мое имя</label>
                <input id="order_name" name="order[name]" class="js-required b-input" type="text">
            </div>
            <div class="b-button__box">
                <button type="submit" class="b-button" disabled="disabled">Отправить</button>
            </div>
        </form>
        <p class="js-order-form-error b-order-form__error hidden">
            Возникла ошибка.<br>Повторите попытку позже.
        </p>
        <p class="js-order-form-success b-order-form__success hidden">
            Спасибо!<br>В ближайшее время мы свяжемся с вами.
        </p>
    </div>

</div>