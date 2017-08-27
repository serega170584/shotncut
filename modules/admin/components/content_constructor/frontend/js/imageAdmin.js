(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'image', {
    title: 'Изображение',
    creator: function (name, count, $decorator, options) {

      var self = this;
      //базовое имя для всех инпутов в виджете
      name = name + '[' + count + '][value]';
      //опции для данного виджета
      options = options || {};
      //путь до контроллера с загрузкой
      var url = '/admin/file/upload';
      //путь до контроллера с удалением файла
      var deleteUrl = '/admin/file/delete';

      //функция, которая отображает виджет
      self.render = function () {
        var html = '';
        //поле для загрузки
        html += '<div id="cc_' + count + '_image_container"><input id="cc_' + count + '_image" type="file" name="file"></div>';
        //скрытое поле со ссылкой на файл
        html += '<input type="hidden" name="' + name + '" id="cc_' + count + '_image_url">';
        //поле для вывода данных о загрузке
        html += '<div id="cc_' + count + '_image_info"></div>';
        //создаем html для виджета
        $decorator.empty().html(html);
        //добавляем обработчик загрузки
        $file = $('#cc_' + count + '_image');
        $container = $('#cc_' + count + '_image_container');
        $text = $('#cc_' + count + '_image_info');
        $urlValue = $('#cc_' + count + '_image_url');
        $file.fileupload({
          url: url,
          dataType: 'json',
          maxNumberOfFiles: 1,
          acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
              self._renderFile($container, $text, $urlValue, file.url);
            });
          },
          processfail: function (e, data) {
            $text.empty();
            $decorator.find('input:hidden').val('');
            $('<div class="alert alert-danger" />').text(data.files[data.index].error).appendTo($text);
          },
        });
        //отображаем файл, если есть
        if (options.value) self._renderFile($container, $text, $urlValue, options.value);
      };

      //функция, которая отображает загруженный файл
      self._renderFile = function ($container, $text, $urlValue, url) {
        options.value = url;
        $container.hide();
        $text.empty();
        $urlValue.val(url);
        $('<button class="btn btn-danger" />').text('Удалить').appendTo($text).on('click', function () {
          self._deleteFile($container, $text, $urlValue, url);
          return false;
        });
        $('<br />').appendTo($text);
        $('<img class="img-responsive img-thumbnail cc_inner_controls" src="' + url + '">').appendTo($text);
      };

      //функция, которая удаляет загруженный файл
      self._deleteFile = function ($container, $text, $urlValue, url) {
        $container.show();
        $text.empty();
        $urlValue.val('');
        self._deleteByUrl(url);
      }

      //функция, которая удаляет файл на сервере
      self._deleteByUrl = function (url) {
        $.ajax({
          type: 'GET',
          url: deleteUrl,
          data: {name: url},
          cache: false,
        });
      };

      //функция, которая удаляет виджет
      self.delete = function () {
        if (options.value) self._deleteByUrl(options.value);
        $decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
