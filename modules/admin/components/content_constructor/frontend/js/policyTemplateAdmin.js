(function ($, $document, $window) {

  $.fn.content_constructor('register_type', 'policyTemplate', {
    title: 'Шаблон продукта',
    creator: function (base_name, count, $decorator, options) {

      var self = this;
      self.count = count;
      self.decorator = $decorator;
      self.options = options ? options : {};
      var templates = {
        'vzr': 'Страхование путешественников',
        'panaceya': 'Онкологическое страхование',
        'first_capital': 'Накопить первый капитал для ребенка',
        'family_head': 'Страхование от несчастного случая',
        'family_protection': 'Страхование семьи от несчастного случая',
        'protected_borrower': 'Страхование жизни при ипотечном кредитовании ',
        'multipolis': 'Мультиполис по России',
        'house_protection': 'Отделка, имущество и ответственность',
        'card_protection': 'Защита денег на счетах',
        'mites_protection': 'Защита от укуса клеща',
        'extension_mortgage_insurance': 'Продление страхования ипотеки'
      };

      self.render = function () {
        self.decorator.empty();
        var name = base_name + '[' + count + '][value]';
        var options_html = '<option></option>';
        Object.keys(templates).map(function (key, index) {
          options_html += '<option value="'+key+'">'+templates[key]+'</option>';
        });
        var html = '<div class="form-inline cc_inner_line"><label>Продукт:</label> '
          +' <select class="form-control" name="' + name + '[template]">'+options_html+'</select></div>';
        self.decorator.html(html);
        var value = options.value || '';
        self.decorator.find('select').val(value.template || '');
      };

      self.delete = function () {
        self.decorator.empty().remove();
      };

    }
  });

})(jQuery, jQuery(document), jQuery(window));
