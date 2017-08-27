module.exports = function () {
  var directive = {
    controller: 'siGoodController',
    link: link
  };

  function link(scope, element, attributes, controller) {
    controller.addAnchor(scope)
    console.log(scope);
  }

  return directive;
}
