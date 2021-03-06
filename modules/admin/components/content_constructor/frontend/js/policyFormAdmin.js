(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyForm', {
    title: 'Форма',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<div class="form-inline cc_inner_line"><label>Телефон:</label> <input type="text" class="form-control" name="' + name + '[header]"></div>'
          + '<textarea id="cc_' + count + '_policy_form" name="' + name + '[text]" />';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('input').val(value.header || '');
        self.decorator.find('textarea').val(value.text || '');
        window.CcPolicyFormTinyMce('#cc_' + count + '_policy_form');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    }
  });

})(jQuery, jQuery(document), jQuery(window));
