(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyActivate', {
    title: 'Активировать полис',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<div class="form-inline cc_inner_line"><label>Заголовок:</label> <input type="text" class="form-control header-input" name="' + name + '[header]"></div>'
          + '<div class="form-inline cc_inner_line"><textarea id="cc_' + count + '_policy_activate" name="' + name + '[text]" /></div>'
          + '<div class="form-inline cc_inner_line"><label>Ссылка активации:</label> <input type="text" class="form-control url-input" name="' + name + '[url]"></div>';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('.header-input').val(value.header || '');
        self.decorator.find('textarea').val(value.text || '');
        self.decorator.find('.url-input').val(value.url || '');
        window.CcPolicyActivateTinyMce('#cc_' + count + '_policy_activate');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
