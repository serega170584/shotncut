(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyV2Questions', {
    title: 'Вопросы и ответы',
    creator: function (name, count, $decorator, options) {

      var self = this;
      //базовое имя для всех инпутов в виджете
      name = name + '[' + count + '][value]';
      //опции для данного виджета
      options = options || {};
      //счетчик строк
      var line_counter = 0;

      //функция, которая отображает виджет
      self.render = function () {
        var html = '';
        //заголовок
        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Заголовок:</label> ';
        html += '<input type="text" class="form-control cc_questions_use_header" name="' + name + '[header]">';
        html += '</div>';
        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_questions_use_lines"></div>';
        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_questions_use_add_line btn btn-primary">Добавить вопрос</button>';
        html += '</div>';
        //создаем html для виджета
        $decorator.empty().html(html);
        //событие для кнопки создания слайда
        $decorator.find('.cc_questions_use_add_line').on('click', function () {
          self._addLine(name + '[lines]');
          return false;
        });
        //задаем значения всем блокам
        var value = options.value || '';
        $decorator.find('input.cc_questions_use_header').val(value.header || '');
        //задаем строки, которые пришли в значении
        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            self._addLine(name + '[lines]', value.lines[k]);
          }
        }
      };

      //функция, которая создает строку аккордеона
      self._addLine = function (name, value) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<label>Вопрос:</label> ';
        html += '<div class="cc_inner_line clearfix"><div class="row">';
        //кнопка удаления строки слайда
        html += '<div class="col-md-10"><input type="text" class="form-control cc_questions_use_slide_line_header" name="' + name + '[header]"></div>';
        html += '<div class="col-md-2"><button class="cc_questions_use_delete_slide_line btn btn-xs btn-danger">Удалить строку</button></div>';
        html += '</div></div>';
        //текст слайда
        html += '<div class="cc_inner_line">';
        html += '<label>Ответ:</label>';
        html += '<textarea class="form-control cc_questions_use_slide_line_text" name="' + name + '[text]" id="cc_' + count + '_questions"></textarea>';
        html += '</div>';
        //создаем html слайда
        var $line = $('<div class="cc_questions_use_slide_line" />').html(html).appendTo($decorator.find('.cc_questions_use_lines'));
        //кнопка удаления строки
        $line.find('.cc_questions_use_delete_slide_line').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_questions_use_slide_line_header').val(value.header);
        }
        //задает текст статьи
        if (value.text) {
          $line.find('.cc_questions_use_slide_line_text').val(value.text);
        }
        //подключаем tiny mce
        window.CcPolicyV2QuestionsTinyMce('#cc_' + count + '_questions');
      };

      //функция, которая удаляет виджет
      self.delete = function () {
        $decorator.empty().remove();
      };

    }
  });

})(jQuery, jQuery(document), jQuery(window));
