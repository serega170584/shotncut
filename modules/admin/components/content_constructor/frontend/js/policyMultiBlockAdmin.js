(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyMultiBlock', {
    title: 'Блок с табами и подтабами',
    creator: function (name, count, $decorator, options) {

      var self = this;
      //базовое имя для всех инпутов в виджете
      name = name + '[' + count + '][value]';
      //опции для данного виджета
      options = options || {};
      //счетчик строк
      var line_counter = 0;
      var primaryCount;

      //функция, которая отображает виджет
      self.render = function () {
        primaryCount = count;
        var html = '';
        //заголовок
        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Заголовок:</label> ';
        html += '<input type="text" class="form-control cc_multiblock_header" name="' + name + '[header]">';
        html += '</div>';

        html += '<div class="cc_inner_line"><textarea id="cc_multiblock_'+count+'_edt" name="' + name + '[text]"></textarea></div>';

        html += '<div class="cc_inner_line cc_multiblock_lines"></div>';

        html += '<div class="cc_inner_controls">';
        html += '<label>Табы:</label>';
        html += '<button class="cc_multiblock_add_line_tab btn btn-primary">+ таб</button> ';
        html += '<button class="cc_multiblock_add_line_sub btn btn-primary">+ таб с меню</button>';
        html += '</div>';
        //создаем html для виджета
        $decorator.empty().html(html);
        //событие для кнопки создания слайда
        $decorator.find('.cc_multiblock_add_line_tab').on('click', function () {
          self._addLine(name + '[lines]', {}, $decorator);
          return false;
        });
        $decorator.find('.cc_multiblock_add_line_sub').on('click', function () {
            self._addLineSubs(name + '[lines]', {}, $decorator);
            return false;
        });
        //задаем значения всем блокам
        var value = options.value || '';
        $decorator.find('input.cc_multiblock_header').val(value.header || '');
        $decorator.find('#cc_multiblock_text').val(value.text || '');
        //задаем строки, которые пришли в значении
        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            if (value.lines[k].type === 'line' ) {
              self._addLine(name + '[lines]', value.lines[k], $decorator);
            } else if (value.lines[k].type === 'subs') {
              self._addLineSubs(name + '[lines]', value.lines[k], $decorator);
            }
          }
        }
        window.CcPolicyMultiBlockTinyMce('#cc_multiblock_'+count+'_edt');
      };

      // таб с меню слева
      self._addLineSubs = function (name, value, $decorator) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<input type="hidden" name="'+name+'[type]" value="subs">';

        html += '<div class="clearfix panel-heading">Таб с меню <button class="cc_multiblock_delete_slide_line btn btn-xs pull-right btn-danger">Удалить таб</button></div>';

        html += '<div class="panel-body">';

        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Название таба:</label> ';
        html += '<input type="text" class="form-control cc_multiblock_slide_line_header" name="' + name + '[header]">';
        html += '</div>';

        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_multiblock_lines"></div>';

        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_multiblock_subslides_add btn btn-primary">Добавить пункт меню</button>';
        html += '</div>';

        html += '</div>'; // panel-body

        //создаем html слайда
        var $line = $('<div class="cc_multiblock_slide_line panel panel-default" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления строки
        $line.find('.cc_multiblock_delete_slide_line').on('click', function () {
          $line.empty().remove();
          return false;
        });

        $line.find('.cc_multiblock_subslides_add').on('click', function () {
          self._addSlide(name + '[slides]', {}, $line);
          return false;
        });

        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_multiblock_slide_line_header').val(value.header);
        }

        if (value.slides) {
          for (var k in value.slides) {
            if (!value.slides.hasOwnProperty(k)) continue;
            self._addSlide(name + '[slides]', value.slides[k], $line);
          }
        }
      };

      // таб
      self._addLine = function (name, value, $decorator) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<input type="hidden" name="'+name+'[type]" value="line">';

        html += '<div class="clearfix panel-heading">Таб <button class="cc_multiblock_delete_slide_line btn btn-xs pull-right btn-danger">Удалить таб</button></div>';

        html += '<div class="panel-body">';

        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Название таба:</label> ';
        html += '<input type="text" class="form-control cc_multiblock_slide_line_header" name="' + name + '[header]">';
        html += '</div>';

        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_multiblock_lines"></div>';

        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_multiblock_subslides_add_text btn btn-primary">+ текст</button>';
        html += '<button class="cc_multiblock_subslides_add_list btn btn-primary">+ список</button>';
        html += '</div>';

        html += '</div>';

        //создаем html слайда
        var $line = $('<div class="cc_multiblock_slide_line panel panel-default" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления строки
        $line.find('.cc_multiblock_delete_slide_line').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //кнопки добавления табов
        $line.find('.cc_multiblock_subslides_add_text').on('click', function () {
          self._addTextBlock(name + '[lines]', {}, $line);
          return false;
        });
        $line.find('.cc_multiblock_subslides_add_list').on('click', function () {
          self._addListBlock(name + '[lines]', {}, $line);
          return false;
        });
        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_multiblock_slide_line_header').val(value.header);
        }
        // заполнение табов
        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            if (value.lines[k].type === 'text' ) {
              self._addTextBlock(name + '[lines]', value.lines[k], $line);
            } else if (value.lines[k].type === 'list') {
              self._addListBlock(name + '[lines]', value.lines[k], $line);
            }
          }
        }
      };

      self._addTextBlock = function (name, value, $decorator) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<input type="hidden" name="'+name+'[type]" value="text">';

        html += '<div class="cc_inner_line clearfix"><div class="row">';
        //кнопка удаления строки слайда
        html += '<div class="col-md-10"><label>Текстовый блок</label></div>';
        html += '<div class="col-md-2"><button class="cc_multiblock_delete_textblock btn btn-xs btn-danger">Удалить блок</button></div>';
        html += '</div></div>';
        //текст слайда
        html += '<div class="cc_inner_line">';
        html += '<textarea class="form-control cc_multiblock_textblock_text" name="' + name + '[text]" id="cc_' + primaryCount + '_' + count + '_multiblock_txt_edt"></textarea>';
        html += '</div>';
        //создаем html слайда
        var $line = $('<div class="cc_multiblock_textblock" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления строки
        $line.find('.cc_multiblock_delete_textblock').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //задает текст статьи
        if (value.text) {
          $line.find('.cc_multiblock_textblock_text').val(value.text);
        }
        //подключаем tiny mce
        window.CcPolicyMultiBlockTinyMce('#cc_' + primaryCount + '_' + count + '_multiblock_txt_edt');
      };

      // пункт левого меню для таба с меню
      self._addSlide = function (name, value, $decorator) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название слада
        name = name + '[' + count + ']';
        //заголовок слайда

        html += '<div class="clearfix panel-heading">Пункт меню <button class="cc_multiblock_slide_del btn btn-xs pull-right btn-danger">Удалить пункт</button></div>';

        html += '<div class="panel-body">';

        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Название пункта:</label> ';
        html += '<input type="text" class="form-control cc_multiblock_slide_header" name="' + name + '[header]">';
        html += '</div>';

        //строки слайдера
        html += '<div class="cc_multiblock_lines"></div>';

        //кнопка добавления строки слайда и удаления слайда
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_multiblock_subslides_add_text btn btn-primary">+ текст</button>';
        html += '<button class="cc_multiblock_subslides_add_list btn btn-primary">+ список</button>';
        html += '</div>';

        html += '</div>';

        //создаем html слайда
        var $line = $('<div class="cc_multiblock_slide panel panel-default" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления слайда
        $line.find('.cc_multiblock_slide_del').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //кнопки добавления табов
        $line.find('.cc_multiblock_subslides_add_text').on('click', function () {
          self._addTextBlock(name + '[lines]', {}, $line);
          return false;
        });
        $line.find('.cc_multiblock_subslides_add_list').on('click', function () {
          self._addListBlock(name + '[lines]', {}, $line);
          return false;
        });
        //задаем название слайда
        if (value.header) {
          $line.find('.cc_multiblock_slide_header').val(value.header);
        }
        // заполнение табов
        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            if (value.lines[k].type === 'text' ) {
              self._addTextBlock(name + '[lines]', value.lines[k], $line);
            } else if (value.lines[k].type === 'list') {
              self._addListBlock(name + '[lines]', value.lines[k], $line);
            }
          }
        }
      };

      // таб с разворачивающимся списокм
      self._addListBlock = function (name, value, $decorator) {
        //значения, которые нужно будет внести в поля слайда
        value = value || {};
        //html слайда
        var html = '';
        //номер слайда
        var count = line_counter++;
        //название
        name = name + '[' + count + ']';
        //заголовок слайда
        html += '<input type="hidden" name="'+name+'[type]" value="list">';

        html += '<div class="clearfix panel-heading">Список <button class="cc_multiblock_delete_listblock btn btn-xs pull-right btn-danger">Удалить блок</button></div>';

        html += '<div class="panel-body">';

        html += '<div class="form-inline cc_inner_line">';
        html += '<label>Заголовок списка:</label> ';
        html += '<input type="text" class="form-control cc_multiblock_listblock_header" name="' + name + '[header]">';
        html += '</div>';

        //контейнер со слайдами
        html += '<div class="cc_inner_line cc_multiblock_lines"></div>';

        //кнопка добавления слайдов
        html += '<div class="cc_inner_controls">';
        html += '<button class="cc_multiblock_listblock_add_line btn btn-primary">Добавить строку</button>';
        html += '</div>';

        html += '</div>';

        //создаем html слайда
        var $line = $('<div class="cc_multiblock_listblock panel panel-default" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления строки
        $line.find('.cc_multiblock_delete_listblock').on('click', function () {
          $line.empty().remove();
          return false;
        });

        $line.find('.cc_multiblock_listblock_add_line').on('click', function () {
          self._addListBlockLine(name + '[lines]', {}, $line);
          return false;
        });

        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_multiblock_listblock_header').val(value.header);
        }

        if (value.lines) {
          for (var k in value.lines) {
            if (!value.lines.hasOwnProperty(k)) continue;
            self._addListBlockLine(name + '[lines]', value.lines[k], $line);
          }
        }
      };

      // разворачивающиеся блоки с заголовком
      self._addListBlockLine = function (name, value, $decorator) {
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
        html += '<div class="col-md-10"><input type="text" class="form-control cc_multiblock_listblock_line_header" name="' + name + '[header]"></div>';
        html += '<div class="col-md-2"><button class="cc_multiblock_listblock_line_del btn btn-xs btn-danger">Удалить</button></div>';
        html += '</div>';
        //текст слайда
        html += '<div class="cc_inner_line">';
        html += '<label>Текст строки:</label>';
        html += '<textarea class="form-control cc_multiblock_listblock_line_text" name="' + name + '[text]" id="cc_' + primaryCount + '_' + count + '_multiblock_list_edt"></textarea>';
        html += '</div>';
        //создаем html слайда
        var $line = $('<div class="cc_multiblock_listblock_line" />').html(html).appendTo($decorator.find('.cc_multiblock_lines').first());
        //кнопка удаления строки
        $line.find('.cc_multiblock_listblock_line_del').on('click', function () {
          $line.empty().remove();
          return false;
        });
        //задает заголовок статьи
        if (value.header) {
          $line.find('.cc_multiblock_listblock_line_header').val(value.header);
        }
        //задает текст статьи
        if (value.text) {
          $line.find('.cc_multiblock_listblock_line_text').val(value.text);
        }
        //подключаем tiny mce
        window.CcPolicyMultiBlockTinyMce('#cc_' + primaryCount + '_' + count + '_multiblock_list_edt');
      };

      //функция, которая удаляет виджет
      self.delete = function () {
        $decorator.empty().remove();
      };

    }

  });

})(jQuery, jQuery(document), jQuery(window));
