(function ($, $document, $window) {

  /**
   * Название переменной, в которой передаются данные элемента
   */
  var data_name = 'content_constructor';
	/**
	 * Объект с настройками плагина по-умолчанию
	 */
	var defaults = {};
  /**
   * Объект со всеми зарегистрированными типами
   */
  var types = {};


  //добавляет новую часть контент
  var addNewControl = function (type, $el, options) {
    if (!types[type]) return null;
    var widget_data = $el.data(data_name);
    var count = widget_data.counter++;
    var name = widget_data.options.name || 'element';
    var options = options || {};
    var position = options.position || 0;
    //html обертка для каждого виджета
    var $decorator = $('<div class="cc_use_part_decorator panel panel-default" />').html(
      '<div class="cc_use_part_title clearfix panel-heading">'
      + types[type].title + ' №' + (count + 1)
      + '<button class="btn btn-danger cc_use_part_delete btn-xs pull-right">Удалить блок</button>'
      + '</div>'
      + '<div class="cc_use_part_content panel-body"></div>'
      + '<div class="panel-footer">Позиция № - <input type="text" class="form-control input-sm" name="' + name + '[' + count + '][position]" value="' + position + '" style="width: 50px; display: inline-block;"></div>'
      + '<input type="hidden" name="' + name + '[' + count + '][type]" value="' + type + '">'
    );
    //создаем часть
    var part = new types[type].creator(name, count, $decorator.find('.cc_use_part_content'), options);
    //кнопка удаления
    $decorator.find('.cc_use_part_delete').on('click', function () {
      part.delete();
      $decorator.empty().remove();
      return false;
    });
    //создаем часть
    $decorator.appendTo(widget_data.container);
    part.render();
  };


  //очищает все данные внутри виджета
  var clearWidget = function (el) {
    var $el = $(el);
    var widget_data = $el.data(data_name);
    if (widget_data.container) widget_data.container.empty();
  }

  //инициирует контейнер
  var initContainer = function (el, options) {
    var $el = $(el);

    //если виджет уже инициирован для данного элемента, то очищаем его
    var widget_data = $el.data(data_name);
    if (widget_data) widget_data.widget.empty().remove();

    var new_data = {};

    //создаем селект с выбором типов
    var select_html = '<option value="">Выберите тип блока</option>';
    for (var k in types) {
      if (!types.hasOwnProperty(k)) continue;
      select_html += '<option value="' + k + '">' + types[k].title + '</option>';
    }

    //настройки поля
    new_data.options = options;
    //нумерация частей контента
    new_data.counter = 0;
    //тело виджета
    new_data.widget = $('<div class="cc_use_widget" />').appendTo($el);
    //если удалены все части, то нужно обязательно вернуть пустое значение
    $('<input type="hidden" name="' + (options.name || 'element') + '" value="">').appendTo(new_data.widget);
    //контейнер в котором отображаются добавленные части
    new_data.container = $('<div class="cc_use_container" />').appendTo(new_data.widget);
    //контейнер с выбором типа части и кнопкой добавления части
    new_data.controls = $('<div class="cc_use_controls row" />').html(
      '<div class="col-md-5"><select class="cc_use_select_new form-control">' + select_html + '</select></div>'
      + '<button class="btn btn-primary col-md-3 cc_use_add_new">Добавить блок</button>'
    ).appendTo(new_data.widget);

    //выбор типа части
    new_data.select = new_data.controls.find('.cc_use_select_new');
    //кнопка добавления новой части
    new_data.add_button = new_data.controls.find('.cc_use_add_new').on('click', function () {
      var val = new_data.select.val();
      if (val && val !== '') {
        addNewControl(val, $el);
        new_data.select.val('').trigger('change');
      }
      return false;
    }).appendTo(new_data.controls);

    //записываем данные для конкретного элемента
    $el.data(data_name, new_data);
  };


  //добавляет все части
  var setControls = function (el, controls) {
    var $el = $(el);
    clearWidget($el);
    for (var j = 0; j < controls.length; j++) {
      if (!controls[j].type) continue;
      addNewControl(controls[j].type, $el, controls[j]);
    }
  };


	/**
	 * Методы описанные здесь можно будет вызывать как $('.someclass').myPlaginName('methodName', param1, param2, ...);
	 */
	var methods = {
    //инициируем блок
    'init': function (options) {
        var options = $.extend({}, defaults, options);
        return this.each(function (i) {
            initContainer(this, options);
        });
    },
    //добавляем новые части
    'set_controls': function (controls) {
      return this.each(function (i) {
        setControls(this, controls);
      });
    },
    //регистрация нового типа
    'register_type': function (type, data) {
      if (!type || !data.creator) return null;
      types[type] = {
        'creator': data.creator,
        'title': data.title ? data.title : type,
      };
    }
	};

	/**
	 * Пытается найти указанный метод, в противном случае вызывает init
	 */
	$.fn.content_constructor = function (method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if(typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		}
		return false;
	};

})(jQuery, jQuery(document), jQuery(window));
