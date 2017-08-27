(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyV2InsEvent', {
    title: 'Страховой случай',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<div class="form-inline cc_inner_line"><label>Заголовок:</label> <input type="text" class="form-control " name="' + name + '[header]"></div>'
                 + '<textarea id="cc_' + count + '_policyV2InsEvent" name="' + name + '[text]" />';
        self.decorator.html(html);
        var value = options.value || '';
        var escapedname = name.replace(/(:|\.|\[|\])/g,'\\$1');
        self.decorator.find('input[name='+escapedname+'\\[header\\]]').val(value.header || '');
        self.decorator.find('input[name='+escapedname+'\\[bg\\]]').val(value.bg || '');
        self.decorator.find('textarea').val(value.text || '');
        window.CcPolicyV2InsEventTinyMce('#cc_' + count + '_policyV2InsEvent');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    }
  });

})(jQuery, jQuery(document), jQuery(window));
