<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('home','Contact Us');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('banner',['banner'=>$banner])?>

<div class="site-contact">
    <h1 class="title"><span><?= Html::encode($this->title) ?></span></h1>

    <?=$model['content']?>
    <form id="w0" class="form-horizontal kv-form-horizontal">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>"><fieldset id="w1">
            <div class="row">
                <div class="col-sm-12">


                    <div class="form-group field-feedback-name">
                        <label class="control-label col-md-2" for="feedback-name"><?=Yii::t('home','Name')?></label>
                        <div class='col-md-10'><input type="text" id="feedback-name" class="form-control" name="Feedback[name]" maxlength="255" placeholder="<?=Yii::t('home','Please input name ...')?>"></div>
                        <div class='col-md-offset-2 col-md-10'></div>
                        <div class='col-md-offset-2 col-md-10'><div class="help-block"></div></div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">


                    <div class="form-group field-feedback-tel">
                        <label class="control-label col-md-2" for="feedback-tel"><?=Yii::t('home','Tel')?></label>
                        <div class='col-md-10'><textarea id="feedback-tel" class="form-control" name="Feedback[tel]" maxlength="255" placeholder="<?=Yii::t('home','Please input tel ...')?>"></textarea></div>
                        <div class='col-md-offset-2 col-md-10'></div>
                        <div class='col-md-offset-2 col-md-10'><div class="help-block"></div></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group field-feedback-phone">
                        <label class="control-label col-md-2" for="feedback-phone"><?=Yii::t('home','Phone')?></label>
                        <div class='col-md-10'><textarea id="feedback-phone" class="form-control" name="Feedback[phone]" maxlength="255" placeholder="<?=Yii::t('home','Please input phone ...')?>"></textarea></div>
                        <div class='col-md-offset-2 col-md-10'></div>
                        <div class='col-md-offset-2 col-md-10'><div class="help-block"></div></div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group field-feedback-email">
                        <label class="control-label col-md-2" for="feedback-email"><?=Yii::t('home','Email')?></label>
                        <div class='col-md-10'><textarea id="feedback-email" class="form-control" name="Feedback[email]" maxlength="255" placeholder="<?=Yii::t('home','Please input email ...')?>"></textarea></div>
                        <div class='col-md-offset-2 col-md-10'></div>
                        <div class='col-md-offset-2 col-md-10'><div class="help-block"></div></div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group field-feedback-content">
                        <label class="control-label col-md-2" for="feedback-content"><?=Yii::t('home','Content')?></label>
                        <div class='col-md-10'><textarea id="feedback-content" class="form-control" name="Feedback[content]"></textarea></div>
                        <div class='col-md-offset-2 col-md-10'></div>
                        <div class='col-md-offset-2 col-md-10'><div class="help-block"></div></div>
                    </div>
                </div>

            </div>

        </fieldset>

        <a href="#"  class="btn btn-success" id="submit1"><?=Yii::t('home','Create')?></a>

    </form>
</div>
<script>
    $(document).ready(function () {
        $('#submit1').click(function () {

            var csrf = '<?=Yii::$app->request->csrfToken?>';
            var name = $('#feedback-name').val();
            var tel = $('#feedback-tel').val();
            var phone = $('#feedback-phone').val();
            var email = $('#feedback-email').val();
            var content = $('#feedback-content').val();
            if(!name){
                alert('<?=Yii::t('home','Name is not empty')?>');
                $('#feedback-name').focus();
                return false;
            }
            if(!tel)
            {
                alert('<?=Yii::t('home','Tel is not empty')?>');
                $('#feedback-tel').focus();
                return false;
            }
            if(!email)
            {
                alert('<?=Yii::t('home','Email is not empty')?>');
                $('#feedback-email').focus();
                return false;
            }
            if(!content)
            {
                alert('<?=Yii::t('home','Content is not empty')?>');
                $('#feedback-content').focus();
                return false;
            }
            $.ajax({
                method: 'post',
                data: {
                    "_csrf": csrf,
                    "Feedback[name]":name,
                    "Feedback[tel]":tel,
                    "Feedback[phone]":phone,
                    "Feedback[email]":email,
                    "Feedback[content]":content
                },
                url: '<?=yiiUrl(['/site/save-feedback'])?>',
                success: function (data) {
                    alert('<?=Yii::t('home','Success')?>');
                    window.location.href = "<?=yiiUrl(['/site/contact'])?>";
                },
                error: function (data) {
                    alert('<?=Yii::t('home','Fail')?>');
                    window.location.href = "<?=yiiUrl(['/site/contact'])?>";
                }
            });
        });
    });
</script>