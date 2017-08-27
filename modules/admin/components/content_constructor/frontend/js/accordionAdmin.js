(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'accordion', {
    title: 'Аккордеон',
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
        html += '<div class="form-inline cc_inner_line">'
        html += '<label>Заголовок:</label> '
        html += '<input type="text" class="form-control cc_accordion_use_header" name="' + name + '[header]">'
        html += '</div>';
        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_accordion_use_lines"></div>';
        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_accordion_use_add_line btn btn-primary">Добавить строку</button>';
        html += '</div>';
        //создаем html для виджета
        $decorator.empty().html(html);
        //событие для кнопки создания слайда
        $decorator.find('.cc_accordion_use_add_line').on('click', function () {
          self._addLine(name + '[lines]');
          return false;
        });
        //задаем значения всем блокам
        var value = options.value || '';
        $decorator.find('input.cc_accordion_use_header').val(value.header || '');
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
        html += '<label>Заголовок строки:</label> ';
        html += '<div class="cc_inner_line clearfix">';
        //кнопка удаления строки слайда
        html += '<button class="cc_accordion_use_delete_slide_line btn btn-danger pull-right">Удалить строку</button>';
        html += '<input type="text" class="form-control cc_accordion_use_slide_line_header" name="' + name + '[header]">';
        html += '</div>';
        //текст слайда
        html += '<div class="cc_inner_line">';
        html += '<label>Текст строки:</label>';
        html += '<textarea class="form-control cc_accordion_use_slide_line_text" name="' + name + '[text]" id="cc_' + count + '_accordion"></textarea>';
        html += '</div>';
        //создаем html слайда
        var $line = $('<div class="cc_accordion_use_slide_line" />').html(html).appendTo($decorator.find('.cc_accordion_use_lines'));
        //кнопка удаления строки
        $line.find('.cc_accordion_use_delete_slide_line').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_accordion_use_slide_line_header').val(value.header);
        }
        //задает текст статьи
        if (value.text) {
          $line.find('.cc_accordion_use_slide_line_text').val(value.text);
        }
        //подключаем tiny mce
        window.CcAccordionTinyMce('#cc_' + count + '_accordion');
      };

      //функция, которая удаляет виджет
      self.delete = function () {
        $decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
