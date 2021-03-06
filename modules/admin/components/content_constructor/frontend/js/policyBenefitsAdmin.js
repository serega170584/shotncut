(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyBenefits', {
    title: 'Преимущества полиса',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

        var limit = 3;
        var name = base_name + '[' + count + '][value]';

        //путь до контроллера с загрузкой
        var url = '/admin/file/upload';
        //путь до контроллера с удалением файла
        var deleteUrl = '/admin/file/delete';

      self.render = function () {
        self.decorator.empty();

          var html = '<div class="form-inline cc_inner_line"><label>Заголовок:</label> <input type="text" class="form-control" name="' + name + '[header]"></div>';
          self.decorator.html(html);

          var value = options.value || '';
          var blocks = value.blocks || '';
          self.decorator.find('input').val(value.header || '');

          self._createGroups(blocks);
      };

        self._createGroups = function(data){
            data = data || [];

            for(var i=0; i < limit; i++){
                var mce_text_id = 'cc_' + count + '_how_to_make_text_'+ i,
                    mce_add_id = 'cc_' + count + '_how_to_make_add_'+ i,
                    n = name + '[blocks]';

                var item = '<div class="panel panel-default"><div class="panel-heading">Блок № '+(i+1)+'</div><div class="panel-body">';
                item += '<div class="row">';
                item += '<div class="col-md-12">';

                item += '<div class="form-group"><label>Заголовок</label><input class="form-control block-link-text" type="text" name="'+n+'['+i+'][link][text]"/></div>';

                item += '<div class="form-group"><label>Иконка</label><input type="file" name="file"/><div class="image-info"></div><input type="hidden" name="'+n+'['+i+'][image]"/></div>';
                item += '<div class="form-group"><label>Текст</label><textarea name="'+n+'['+i+'][text]" id="'+mce_text_id+'" cols="30" rows="10"></textarea></div>';

/*
                item += '<div class="form-group"><label>Дополнительный текст</label><textarea name="'+n+'['+i+'][add]" id="'+mce_add_id+'" cols="30" rows="10"></textarea></div>';
*/


/*
                item += '<div class="form-group"><label>Url ссылки</label><input class="form-control block-link-url" type="text" name="'+n+'['+i+'][link][url]"/></div>';
                */

                item += '</div>';
                item += '</div></div></div>';

                var $item = $(item);

                $decorator.append($item);

                $item.find('input[type="file"]').fileupload({
                    url: url,
                    dataType: 'json',
                    maxNumberOfFiles: 1,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    done: function (e, data) {
                        var $file = $(this);
                        $.each(data.result.files, function (index, file) {
                            self._renderFile($file.closest('.panel'), $file.closest('.panel').find('input:hidden'), file.url);
                        });
                    },
                    processfail: function (e, data) {
                        var $file = $(this),
                            $panel = $file.closest('.panel');

                        $panel.find('input:hidden').val('');
                        $panel.find('.image-info').empty();
                        $('<div class="alert alert-danger" />').text(data.files[data.index].error).appendTo($panel.find('.image-info'));
                    }
                });

                if(data[i]){
                    if(data[i].image)
                        self._renderFile($item, $item.find('input:hidden'), data[i].image);
                    $item.find('#' + mce_text_id).val(data[i].text);
                    // $item.find('#' + mce_add_id).val(data[i].add);
                    if(data[i].link){
                        $item.find('.block-link-text').val(data[i].link.text);
                        // $item.find('.block-link-url').val(data[i].link.url);
                    }
                }

                window.CcPolicyBenefitsTinyMce('#' + mce_text_id);
                // window.CcPolicyBenefitsTinyMce('#' + mce_add_id);
            }
        };

        //функция, которая отображает загруженный файл
        self._renderFile = function ($container, $urlValue, url) {
            var $info = $container.find('.image-info');
            $info.empty();
            $urlValue.val(url);
            $('<button class="btn btn-xs btn-danger" />').text('Удалить').appendTo($info).on('click', function () {
                self._deleteFile($container, $info, $urlValue, url);
                return false;
            });
            $('<br />').appendTo($info);
            $('<img class="img-responsive img-thumbnail cc_inner_controls" src="' + url + '">').appendTo($info);
        };

        //функция, которая удаляет загруженный файл
        self._deleteFile = function ($container, $text, $urlValue, url) {
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
                cache: false
            });
        };

        //функция, которая удаляет виджет
        self.delete = function () {
            if (options.value && options.value.blocks){
                for(var i in options.value.blocks){
                    self._deleteByUrl(options.value.blocks[i].image);
                }
            }
            $decorator.empty().remove();
        };

    }
  });

})(jQuery, jQuery(document), jQuery(window));
