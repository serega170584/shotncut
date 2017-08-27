<div class="js-question-overlay b-popup__overlay">
    <a href="#" class="js-popup-close b-popup__close"></a>
    <div class="js-question-popup b-popup b-popup__question">
        <h4>Задайте свой вопрос</h4>
        <form action="" class="js-question-form b-question-form">
            <div class="u-clear-fix b-question-form__column">
                <div class="b-input__box">
                    <label for="question_name" class="b-label">Мое имя</label>
                    <input id="question_name" name="question[name]" class="js-required b-input" type="text">
                </div>
                <div class="b-input__box">
                    <label for="question_email" class="b-label">Моя электронная почта</label>
                    <input id="question_email" name="question[email]" class="js-required b-input email" type="email">
                </div>
            </div>
            <div class="b-input__box">
                <label for="question_message" class="b-label">Мое сообщение</label>
                <textarea id="question_message" name="question[message]" class="js-required b-input"></textarea>
            </div>
            <div class="b-button__box">
                <button type="submit" class="b-button" disabled="disabled">Отправить</button>
            </div>

        </form>
        <p class="js-question-form-error b-order-form__error hidden">
            Возникла ошибка.<br>Повторите попытку позже.
        </p>
        <p class="js-question-form-success b-order-form__success hidden">
            Спасибо!<br>В ближайшее время мы свяжемся с вами.
        </p>
    </div>
</div>