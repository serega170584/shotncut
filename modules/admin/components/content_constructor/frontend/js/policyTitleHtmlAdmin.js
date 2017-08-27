(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyTitleHtml', {
    title: 'Заголовок + HTML',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<div class="form-inline cc_inner_line"><label>Заголовок:</label> <input type="text" class="form-control" name="' + name + '[header]"></div>'
          + '<textarea style="width: 100%; height: 200px;" id="cc_' + count + '_policy_title_html" name="' + name + '[text]" />';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('input').val(value.header || '');
        self.decorator.find('textarea').val(value.text || '');
        //window.CcPolicyPriceTinyMce('#cc_' + count + '_policy_title_html');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };
    }
  });

})(jQuery, jQuery(document), jQuery(window));
