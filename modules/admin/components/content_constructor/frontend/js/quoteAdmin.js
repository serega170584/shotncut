(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'quote', {
    title: 'Цитата',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var html = '<textarea class="form-control" id="cc_' + count + '_quote" name="' + name + '" />';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('textarea').val(value || '');
          window.CcQuoteTinyMce('#cc_' + count + '_quote');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    },
  });

})(jQuery, jQuery(document), jQuery(window));
