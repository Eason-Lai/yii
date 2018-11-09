<?php
/**
 * Created by PhpStorm.
 * User: DongLiu
 * Date: 2018/11/2
 * Time: 22:21
 */
$script=<<<JS
$(function() {
  $('#myModal').modal('show');
})
JS;
$this->registerJs($script);
?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
                <?=$message[0]?>
            </div>
            <div class="modal-body">
                <?=$message[1]?>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        66666
    </div>
</div>
