<?php
use yii\helpers\Html;


if (Yii::$app->controller->action->id === 'vote-detail') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-vote',
        ['content' => $content]
    );
} else {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->title ?></title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <?= Html::csrfMetaTags() ?>
  <link rel="shortcut icon" href="/favicon.ico">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="stylesheet" href="/css/site.css">
  <link rel="stylesheet" href="/css/light7/light7.min.css">
  <link rel="stylesheet" href="/css/light7/light7-swiper.css">
</head>
<body>

  <!-- Page body begin -->
  <div class="page">

    <nav class="bar bar-tab">
      <a class="tab-item <?= $this->params['active'][0] ?>" href="/site/index">
        <span class="icon icon-index"></span>
        <span class="tab-label">首页</span>
      </a>
      <a class="tab-item <?= $this->params['active'][1] ?>" href="/site/team">
        <span class="icon icon-team"></span>
        <span class="tab-label">球队</span>
      </a>
      <a class="tab-item <?= $this->params['active'][2] ?>" href="/site/competition">
        <span class="icon icon-competition"></span>
        <span class="tab-label">赛程</span>
      </a>
      <a class="tab-item <?= $this->params['active'][3] ?>" href="/site/live">
        <span class="icon icon-live"></span>
        <span class="tab-label">直播</span>
      </a>
      <a class="tab-item <?= $this->params['active'][4] ?>" href="/site/shop">
        <span class="icon icon-shop"></span>
        <span class="tab-label">商家</span>
      </a>
    </nav>

    <div class="content">
      <!-- page content container -->
      <?= $content ?>
    </div>

  </div>  <!-- Page body end -->

  <script type='text/javascript' src='/js/jquery-2.2.4.min.js' charset='utf-8'></script>
  <script type="text/javascript">
  $.config = {
    autoInit: true,
    // router: false,
    swipePanelOnlyClose: true
  }
  function subscribe(sid) {
    var phone = $('#phone').val();
    var shop_id = sid;
    if(phone != '' && shop_id != '') {
      $.showPreloader('正在提交您的预约');
      $.post('/site/save-client', {_csrf:'<?= Yii::$app->request->csrfToken ?>', Client: {phone:phone, shop_id:shop_id}}, function(response){
        $.hidePreloader();
        // console.log(response);
        if(response.success) {
          $.alert('预约提交成功！');
        } else {
          $.alert('预约提交失败！');
        }
      }, 'json');
    }
  }
  function dovote(tid)
  {
    // console.log(tid);
    $.showPreloader('正在提交您的投票');
    $.post('/site/save-vote', {_csrf:'<?= Yii::$app->request->csrfToken ?>', Vote: {team_id: tid}}, function(response){
      $.hidePreloader();
      if(response.success) {
        var team_poll = $("#poll_" + tid).text();
        var poll_count = $('#polls').text();
        team_poll = +team_poll + 1;
        poll_count = +poll_count + 1;
        $('#poll_'+tid).text(team_poll);
        $('#polls').text(poll_count);
        $.alert('投票成功！');
      } else {
        if(response.msg !== null) {
          $.alert(response.msg);
        } else {
          $.alert('投票失败！');
        }
      }
    }, 'json');
  }
  </script>
  <script type='text/javascript' src='/js/light7/light7.min.js' charset='utf-8'></script>
  <?php if($this->params['active'][0] == 'active' && !$this->params['isnews']): ?>
  <script type='text/javascript' src='/js/light7/light7-swiper.js' charset='utf-8'></script>
  <script>
  <?php foreach($this->params['albums'] as $album): ?>
  var newsAlbum_<?=$album['id']?> = $.photoBrowser({
    photos : [
      <?php foreach($album['albumpics'] as $albumpics): ?>
      {
        url: '<?=$albumpics['imgurl']?>',
        caption: '<?=str_replace(["\r\n", "\n", "\r"], "<br>", $albumpics['caption'])?>'
      },
      <?php endforeach; ?>
    ],
    // navbar: false,
    toolbar: false,
    theme: 'dark',
    type: 'standalone',
    swipeToClose: false,
    expositionHideCaptions: true,
    ofText: '<?=$album['title']?>'
  });
  $(document).on('click','#album_<?=$album['id']?>',function () {
    newsAlbum_<?=$album['id']?>.open();
  });
  <?php endforeach; ?>
  </script>
  <?php endif; ?>
</body>
</html>

<?php } ?>
