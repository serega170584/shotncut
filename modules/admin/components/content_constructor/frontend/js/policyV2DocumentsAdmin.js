(function ($, $document, $window) {

    //default config for Dropzone
    Dropzone.autoDiscover = false;

    $.fn.content_constructor('register_type', 'policyV2Documents', {
        title: 'Список документов',
        creator: function (name, count, $decorator, options) {

            var self = this;
            //базовое имя для всех инпутов в виджете
            name = name + '[' + count + '][value][files]';
            //опции для данного виджета
            options = options || {};
            //путь до контроллера с загрузкой
            var url = '/admin/file/upload';
            //путь до контроллера с удалением файла
            var deleteUrl = '/admin/file/delete';
            var count_files = 0;

            //функция, которая отображает виджет
            self.render = function () {
                var html = '';
                //поле для загрузки
                html += '<div id="cc_' + count + '_documents_container"><div class="row"></div></div>';
                html += '<div id="cc_' + count + '_documents_dropzone" class="dropzone"></div>';
                //создаем html для виджета
                $decorator.empty().html(html);

                var $container = $('#cc_' + count + '_documents_container .row');

                //добавляем обработчик загрузки
                var dropzone = new Dropzone("#cc_" + count + "_documents_dropzone", {
                    uploadMultiple: true,
                    url: url,
                    acceptedFiles: '.pdf,.doc,.docx,.xls,.xlsx', //sdfasdf
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    dictDefaultMessage: 'Перетащите сюда документы для загрузки'
                });

                //all images uploads successfuly
                dropzone.on('successmultiple', function(files, data) {
                    if(data.files){
                        for(var i in data.files){
                            self._renderFile($container, data.files[i], count_files++);
                        }
                    }
                });

                dropzone.on('queuecomplete', function(){
                    console.log('queuecomplete');
                    this.removeAllFiles();
                });

                options.value = options.value || [];
                var files = options.value.files || [];

                for(var i in files){
                    self._renderFile($container, files[i], count_files++);
                }
            };

            //функция, которая отображает загруженный файл
            self._renderFile = function ($container, file, index) {

                var $thumbnail = $('<div class="col-md-12"><div class=form-group">' +
                    '<label>'+file.name+'</label> <button class="btn btn-xs btn-danger" />' +
                    '<input type="text" class="form-control" placeholder="Название документа" name="' + name + '['+index+'][title]" value="' + (file.title || '') + '">' +
                    '<input type="hidden" name="' + name + '['+index+'][url]" value="' + file.url + '">' +
                    '<input type="hidden" name="' + name + '['+index+'][name]" value="' + file.name + '">' +
                '</div></div><div class="col-md-12">&nbsp;</div>');

                $thumbnail.find('.btn-danger').text('Удалить').on('click', function () {
                    var url = file.url;
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
                if (options.value && options.value.files){
                    for(var i in options.value.files){
                        self._deleteByUrl(options.value.files[i].url);
                    }
                }
                $decorator.empty().remove();
            };

        }
    });

})(jQuery, jQuery(document), jQuery(window));
