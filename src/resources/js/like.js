$(function () {
  let like = $('.like-toggle');
  let withMayoId;
  like.on('click', function () {
    let $this = $(this);
    withMayoId = $this.data('with-mayo-id');

    //ajax
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/like',
      method: 'POST',
      data: {
        'with_mayo_id': withMayoId
      },
    })
    //通信成功した時
    .done(function (data) {
      $this.toggleClass('liked');
      console.log('1');
      console.log(data.with_mayo_likes_count);
      $this.next('.like-counter').html(data.with_mayo_likes_count);
    })
    //通信失敗した時
    .fail(function () {
      console.log('fail');
    });
  });
  });