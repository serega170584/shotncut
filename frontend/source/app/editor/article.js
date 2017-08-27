module.exports = function () {
  var directive = {
    scope: {
      data: '='
    },
    link: link,
    templateUrl: '/templates/editor.article.tpl.html',
    replace: true
  };

  function link(scope, element, attributes) {

  }

  return directive;
}
