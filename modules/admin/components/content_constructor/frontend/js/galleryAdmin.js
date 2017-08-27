(function ($, $document, $window) {

    //default config for Dropzone
    Dropzone.autoDiscover = false;

    $.fn.content_constructor('register_type', 'gallery', {
        title: 'Галерея',
        creator: function (name, count, $decorator, options) {

            var self = this;
            //базовое имя для всех инпутов в виджете
            name = name + '[' + count + '][value][]';
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
                html += '<div id="cc_' + count + '_gallery_container"><div class="row"></div></div>';
                html += '<div id="cc_' + count + '_gallery_dropzone" class="dropzone"></div>';
                //создаем html для виджета
                $decorator.empty().html(html);

                var $container = $('#cc_' + count + '_gallery_container .row');

                //добавляем обработчик загрузки
                var dropzone = new Dropzone("#cc_" + count + "_gallery_dropzone", {
                    uploadMultiple: true,
                    url: url,
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    dictDefaultMessage: 'Перетащите сюда файлы для загрузки'
                });

                //all images uploads successfuly
                dropzone.on('successmultiple', function(files, data) {
                    if(data.files){
                        for(var i in data.files){
                            self._renderFile($container, data.files[i].url);
                        }
                    }
                });

                dropzone.on('queuecomplete', function(){
                    console.log('queuecomplete');
                    this.removeAllFiles();
                });

                options.value = options.value || [];

                for(var i in options.value){
                    self._renderFile($container, options.value[i]);
                }
            };

            //функция, которая отображает загруженный файл
            self._renderFile = function ($container, url) {

                var $thumbnail = $('<div class="col-md-4">' +
                    '<div class="thumbnail"><img src="' + url + '" alt=""/><div class="caption"></div></div>' +
                    '<input type="hidden" name="' + name + '" value="' + url + '">' +
                '</div>');

                $('<button class="btn btn-xs btn-danger" />').text('Удалить').appendTo($thumbnail.find('.caption')).on('click', function () {
                    self._deleteFile($thumbnail, url);
                    return false;
                });
                $container.append($thumbnail);
            };

            //функция, которая удаляет загруженный файл
            self._deleteFile = function ($thumbnail, url) {
                $thumbnail.remove();
                self._deleteByUrl(url);
            };

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
                if (options.value){
                    for(var i in options.value){
                        self._deleteByUrl(options.value[i]);
                    }
                }
                $decorator.empty().remove();
            };

        }
    });

})(jQuery, jQuery(document), jQuery(window));
