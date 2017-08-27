function cnange(index, ctx) {
  $('.sb-tabs__pane', ctx)
    .toggleClass('sb-tabs__pane_active', false)
    .eq(index)
    .toggleClass('sb-tabs__pane_active', true)
  $('.sb-tabs__link', ctx)
    .toggleClass('sb-tabs__link_active', false)
    .eq(index)
    .toggleClass('sb-tabs__link_active', true)
}

$('.sb-tabs').each(function () {
  cnange($('.sb-tabs__link_active', this).index(), $(this))
})

$(document).on('click', '.sb-tabs__link', function (e) {
  e.preventDefault()
  cnange($(this).parent().index(), $(this).closest('.sb-tabs'))
})
