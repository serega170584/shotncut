(function ($, $document, $window) {

    $.fn.content_constructor('register_type', 'policyHowItWorks2', {
        title: 'Как это работает 2',
        creator: function (base_name, count, $decorator, options) {

            var self = this;
            self.count = count;
            self.decorator = $decorator;
            self.options = options ? options : {};

            var limit = 5;
            var name = base_name + '[' + count + '][value]';

            //путь до контроллера с загрузкой
            var url = '/admin/file/upload';
            //путь до контроллера с удалением файла
            var deleteUrl = '/admin/file/delete';

            self.render = function () {
                self.decorator.empty();

                var html = '<div class="form-inline cc_inner_line"><label>Заголовок:</label> <input type="text" class="form-control header_1" name="' + name + '[header]"></div>' +
                '<div class="form-group"><label>Интро</label>' +
                    '<textarea class="txx_1" id="cc_' + count + '_policy_how_it_works2" name="' + name + '[text]" /></div>';


/*
                '<div class="form-group"><label>Текст 3</label>' +
                    '<textarea class="txx_3" id="cc_' + count + '_policy_how_it_works2_3" name="' + name + '[text_3]" /></div>';
*/



                self.decorator.html(html);

                var value = options.value || '';
                var blocks = value.blocks || '';
                self.decorator.find('input.header_1').val(value.header || 'Как это работает?');


                self.decorator.find('textarea.txx_1').val(value.text || '');
                // self.decorator.find('textarea.txx_3').val(value.text_3 || '');



                window.CcPolicyHowItWorks2TinyMce('#cc_' + count + '_policy_how_it_works2');
                // window.CcPolicyHowItWorks2TinyMce('#cc_' + count + '_policy_how_it_works2_3');



                self._createGroups(blocks);



                var html2 = '<div class="form-inline cc_inner_line"><label>Заголовок Страховые риски:</label> <input type="text" class="form-control header_2" name="' + name + '[header_2]"></div>' +
                    '<div class="form-group"><label>Текст Страховые риски</label>' +
                '<textarea class="txx_2" id="cc_' + count + '_policy_how_it_works2_2" name="' + name + '[text_2]" /></div>';

                $decorator.append($(html2));

                self.decorator.find('input.header_2').val(value.header_2 || 'Страховые риски');
                self.decorator.find('textarea.txx_2').val(value.text_2 || '');
                window.CcPolicyHowItWorks2TinyMce('#cc_' + count + '_policy_how_it_works2_2');

            };

            self._createGroups = function(data){
                data = data || [];

                for(var i=0; i < limit; i++){
                    var mce_text_id = 'cc_' + count + '_how_it_works2_text_'+ i,
                        mce_add_id = 'cc_' + count + '_how_it_works2_add_'+ i,
                        n = name + '[blocks]';

                    var item = '' +
                        '<div class="panel ___panel-default">' +
                        //'<div class="panel-heading">Блок № '+(i+1)+'</div>' +
                        '<div class="panel-body">';
                    item += '<div class="row">';
                    item += '<div class="col-md-12">';

                    if (i < 2) {
                        item += '<div class="form-group"><label>' +
                            ((i == 0) ? 'Иконки десктоп' : 'Иконки мобильная версия') +
                        '</label><input type="file" name="file"/><div class="image-info"></div><input type="hidden" name="' + n + '[' + i + '][image]"/></div>';
                    } else {
                        item += '<div class="form-group"><label>Текст ' +
                            (i-1) +
                            ' </label><textarea name="'+n+'['+i+'][text]" id="'+mce_text_id+'" cols="30" rows="10"></textarea></div>';
                    }




                    /*
                    item += '<div class="form-group"><label>Дополнительный текст</label><textarea name="'+n+'['+i+'][add]" id="'+mce_add_id+'" cols="30" rows="10"></textarea></div>';

                    item += '<div class="form-group"><label>Текст ссылки</label><input class="form-control block-link-text" type="text" name="'+n+'['+i+'][link][text]"/></div>';
                    item += '<div class="form-group"><label>Url ссылки</label><input class="form-control block-link-url" type="text" name="'+n+'['+i+'][link][url]"/></div>';

                    */

                    item += '</div>';
                    item += '</div>' +
                        '</div>' +
                        '</div>';

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

                        // if(data[i].link){
                        //     $item.find('.block-link-text').val(data[i].link.text);
                        //     $item.find('.block-link-url').val(data[i].link.url);
                        // }

                    }

                    window.CcPolicyHowItWorks2TinyMce('#' + mce_text_id);
                    // window.CcPolicyHowItWorks2TinyMce('#' + mce_add_id);
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
