angular.module('si.editor', [
    require('./service.js'),
    require('angular-sanitize'),
    require('./list/index.js')
])
    .directive('siEditorArticle', require('./article.js'))
    .filter('dateToISO', function() {
        return function(input) {
            return new Date(input).toISOString();
        };
    })
    .controller('EditorController', ['$scope', 'Articles', function($scope, Articles){
        var _this = this
        _this.author = window.data.author

        _this.options = [
          {id: 'created_at', name: 'По дате'},
          {id: 'rating', name: 'По рейтингу'}
        ]
        _this.option = _this.options[0]

        _this.page = 1
        _this.tags = []
        _this.order = 'created_at'
        _this.articles = []
        _this.count = 0

        _this.nextPage = function(){
            if(_this.page > 0 && !_this.isEnd()){
                _this.page++

                Articles.query({ page: _this.page, 'filter[tag_list][]': _this.tags, 'filter[order_attr]': _this.order, 'filter[user_id]': window.data.author.id }, function(data){
                    _this.articles = _this.articles.concat(data)
                    _this.articles.push(...data)
                })
            }
        };

        _this.isEnd = function(){
            return _this.articles != undefined && _this.articles.length == _this.count
        }

        _this.filter = function(){
            Articles.query({ page: _this.page, 'filter[tag_list][]': _this.tags, 'filter[order_attr]': _this.order, 'filter[user_id]': window.data.author.id }, function(data, responseHeaders){
                _this.page = 1
                _this.count = responseHeaders('X-Pagination-Total-Count')
                _this.articles = data
            })
        }

        //get JSON Articles
        Articles.query({ page: _this.page, 'filter[tag_list][]': _this.tags, 'filter[order_attr]': _this.order, 'filter[user_id]': window.data.author.id }, function(data, responseHeaders){
            _this.count = responseHeaders('X-Pagination-Total-Count')
            _this.articles = data
        })
    }])

module.exports = 'si.editor'
