(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyActions', {
    //заголовок виджета
    title: 'Страховой случай',
    //класс для создания виджета
    creator: function (name, count, $decorator, options) {

      var self = this;
      //базовое имя для всех инпутов в виджете
      name = name + '[' + count + '][value]';
      //опции для данного виджета
      options = options || {};
      //счетчик слайдов
      var slide_counter = 0;
      //счетчик строк
      var slide_line_counter = 0;

      //функция, которая отображает виджет
      self.render = function () {
        var html = '';
        //заголовок
        html += '<div class="form-inline cc_inner_line">'
        html += '<label>Заголовок:</label> '
        html += '<input type="text" class="form-control cc_policyActions_use_header" name="' + name + '[header]">'
        html += '</div><div class="row"><div class="col-md-12">&nbsp;</div></div>';
        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_policyActions_use_slides"></div>';
        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_policyActions_use_add_slide btn btn-primary">Добавить слайд</button>';
        html += '</div>';
        //создаем html для виджета
        $decorator.empty().html(html);
        //событие для кнопки создания слайда
        $decorator.find('.cc_policyActions_use_add_slide').on('click', function () {
          self._addSlide();
          return false;
        });
        //задаем значения всем блокам
        var value = options.value || '';
        $decorator.find('input.cc_policyActions_use_header').val(value.header || '');
        //задаем слайды, которые пришли в значении
        if (value.slides) {
          for (var k in value.slides) {
            if (!value.slides.hasOwnProperty(k)) continue;
            self._addSlide(value.slides[k]);
          }
        }
      };

      //функция, которая создает слайд
      self._addSlide = function (value) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = slide_counter++;
        //название слада
        var slide_name = name + '[slides][' + count + ']';
        //заголовок слайда
        html += '<div class="form-inline cc_inner_line clearfix"><label>Название слайда № ' + (count + 1) + ':</label>';
        html += '<div class="row">';
        html += '<div class="col-md-10"><input type="text" class="form-control cc_policyActions_use_slide_header" name="' + slide_name + '[header]"></div>';
        html += '<div class="col-md-2"><button class="cc_policyActions_use_delete_slide btn btn-xs btn-danger">Удалить слайд</button></div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="row"><div class="col-md-12">&nbsp;</div></div>';
        //строки слайдера
        html += '<div class="cc_policyActions_use_slide_lines"></div>';
        //кнопка добавления строки слайда и удаления слайда
        html += '<div class="cc_inner_controls clearfix">';
        html += '<button class="cc_policyActions_use_add_slide_line btn btn-sm btn-primary pull-right">Добавить строку</button> ';
        html += '</div>';
        html += '<div class="row"><div class="col-md-12">&nbsp;</div></div>';
        //создаем html слайда
        var $slide = $('<div class="cc_policyActions_use_slide" />').html(html).appendTo($decorator.find('.cc_policyActions_use_slides'));
        //кнопка удаления слайда
        $slide.find('.cc_policyActions_use_delete_slide').on('click', function () {
          $slide.empty().remove();
          return false;
        });
        //кнопка добавления строки слайда
        $slide.find('.cc_policyActions_use_add_slide_line').on('click', function () {
          self._addSlideLine(slide_name + '[lines]', value, $slide);
          return false;
        });
        //задаем название слайда
        if (value.header) {
          $slide.find('.cc_policyActions_use_slide_header').val(value.header);
        }
        //задаем строки, которые пришли в значении
        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            self._addSlideLine(slide_name + '[lines]', value.lines[k], $slide);
          }
        }
      };

      //функция, которая создает строку слайда
      self._addSlideLine = function (name, value, $slide) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = slide_line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<label>Заголовок строки:</label> ';
        html += '<div class="cc_inner_line clearfix">';
        //кнопка удаления строки слайда
        html += '<div class="col-md-10"><input type="text" class="form-control cc_policyActions_use_slide_line_header" name="' + name + '[header]"></div>';
        html += '<div class="col-md-2"><button class="cc_policyActions_use_delete_slide_line btn btn-xs btn-danger">Удалить строку</button></div>';
        html += '</div>';
        //текст слайда
        html += '<div class="cc_inner_line">';
        html += '<label>Текст строки:</label>';
        html += '<textarea class="form-control cc_policyActions_use_slide_line_text" name="' + name + '[text]" id="cc_' + count + '_policyActions_content"></textarea>';
        html += '</div>';
        //создаем html слайда
        var $line = $('<div class="cc_policyActions_use_slide_line" />').html(html).appendTo($slide.find('.cc_policyActions_use_slide_lines'));
        //кнопка удаления строки
        $line.find('.cc_policyActions_use_delete_slide_line').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_policyActions_use_slide_line_header').val(value.header);
        }
        //задает текст статьи
        if (value.text) {
          $line.find('.cc_policyActions_use_slide_line_text').val(value.text);
        }
        //подключаем tiny mce
        window.CcPolicyActionsTinyMce('#cc_' + count + '_policyActions_content');
      };

      //функция, которая удаляет виджет
      self.delete = function () {
        $decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
