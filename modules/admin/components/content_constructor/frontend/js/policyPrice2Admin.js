(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyPrice2', {
    title: 'Стоимость 2',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<div class="form-inline cc_inner_line"><label>Заголовок 1:</label> <input type="text" class="form-control header_1" name="' + name + '[header]"></div>' +
            '<div class="form-inline cc_inner_line"><label>Заголовок 2:</label> <input type="text" class="form-control header_2" name="' + name + '[header_2]"></div>'
          + '<textarea id="cc_' + count + '_policy_price2" name="' + name + '[text]" />';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('input.header_1').val(value.header || 'Стоимость полиса');
        self.decorator.find('input.header_2').val(value.header_2 || 'Ваши обязательства по ипотечному кредиту');
        self.decorator.find('textarea').val(value.text || '');
        window.CcPolicyPrice2TinyMce('#cc_' + count + '_policy_price2');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
