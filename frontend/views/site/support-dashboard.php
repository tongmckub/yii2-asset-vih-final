<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Support Dashboard";
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
$(document).ready(function(){
    $('.tab-content').slimScroll({
        height: '300px'
    });
});
$(document).ready(function(){
    $('#coursList').slimScroll({
        height: '250px'
    });
});
</script>
<style>
.tab-content {
   padding:15px;
}
.box .box-body .fc-widget-header {
    background: none;
}
.popover{
    max-width:450px;   
}
</style>

<?php
$this->registerJs(
"$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});");

$this->registerJs(
"$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
?>


<?php
yii\bootstrap\Modal::begin([
    'header' => '<h4><i class="fa fa-eye"></i> View Notice Details</h4>',
    'id' => 'NoticeModal',
]);
echo '<div id="NoticeModalContent"></div>';
yii\bootstrap\Modal::end();
?>
<?php
$isSupport = '';
$isRole = '';
if (!Yii::$app->user->isGuest) {
    $isSupport = Yii::$app->session->get('user_id');
    $isRole = Yii::$app->session->get('role_name');
}
?>

<section class="content">
    <div class="row">
        <div class="col-sm-5 col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-inr"></i> จำนวนเครื่องคอมพิวเตอร์ </h3>
                </div>
                <div class="box-body">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>&#8377; </h3>
                            <p>VIO</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-inr" style="font-size:55px"></i>
                        </div>
                    </div><!---/. small-box-1---> 
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>&#8377; </h3>
                            <p>VIN </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-inr" style="font-size:65px"></i>
                        </div>
                    </div><!---/. small-box-2---> 	
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>&#8377;</h3>
                            <p>VIS </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-inr" style="font-size:65px"></i>
                        </div>
                    </div><!---/. small-box-3---> 	
                </div><!---/. box-body---> 	
                <div class="box-footer text-center">
                    <?= Html::a('More Info', ['/fees/fees-payment-transaction/stu-fees-data'], ['class' => 'small-box-footer', 'style' => 'font-size:13px', 'target' => '_blank']) ?>
                </div>
            </div><!---/. box--->	
        </div> <!---/.col-sm-3---->
        <div class="col-sm-7 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="ion ion-university"></i>
                    <h3 class="box-title">จำนวนซอฟต์แวร์</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list" id="coursList">
                        <?php
                        $SoftwareList = \common\models\Software::find()->where(['is_status' => 0])->all();
                        foreach ($SoftwareList as $sl):
                            ?>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <span class="text"><?php echo $sl->software_name; ?></span>
                                <?php $comCount = common\models\SummaryOnSite::find()->where(['software_id' => $sl->software_id])->count(); ?>
                                <span class="notification-container pull-right text-teal" title="<?= $comCount; ?> Computers"><i class="fa fa-users"></i><span class="label  notification-counter">  <?= Html::a($comCount, ['software/view', 'id' => $sl->software_id]) ?>  </span></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

    <div class="row">
        <!--left row 2 - 01-->
        <section class="col-lg-12 connectedSortable">

            <!-- Calendar -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--The calendar -->
                    <?php
                    $JSEventClick = <<<EOF
		function(event, jsEvent, view) {
		    $('.fc-event').on('click', function (e) {
			$('.fc-event').not(this).popover('hide');
		    });
		}
EOF;
                    $JsF = <<<EOF
		function (event, element) {
			var start_time = moment(event.start).format("DD-MM-YYYY, h:mm:ss a");
		    	var end_time = moment(event.end).format("DD-MM-YYYY, h:mm:ss a");

			element.popover({
		            title: event.title,
		            placement: 'top',
		            html: true,
			    global_close: true,
			    container: 'body',
			    trigger: 'hover',
			    delay: {"show": 500},
		            content: "<table class='table'><tr><th>Event Detail : </th><td>" + event.description + " </td></tr><tr><th> Event Type : </th><td>" + event.event_type + "</td></tr><tr><th> Start Time : </t><td>" + start_time + "</td></tr><tr><th> End Time : </th><td>" + end_time + "</td></tr></table>"
        		});
               }
EOF;
                    ?>

                    <?=
                    \yii2fullcalendar\yii2fullcalendar::widget([
                        'options' => ['language' => 'th'],
                        'clientOptions' => [
                            'fixedWeekCount' => false,
                            'weekNumbers' => true,
                            'editable' => true,
                            'selectable' => true,
                            'eventLimit' => true,
                            'eventLimitText' => 'more Events',
                            'selectHelper' => true,
                            'header' => [
                                'left' => 'today prev,next',
                                'center' => 'title',
                                'right' => 'month,agendaWeek,agendaDay'
                            ],
                            'eventClick' => new \yii\web\JsExpression($JSEventClick),
                            'eventRender' => new \yii\web\JsExpression($JsF),
                            'contentHeight' => 380,
                            'timeFormat' => 'hh(:mm) A'
                        ],
                        'ajaxEvents' => Url::toRoute(['/events/view-events'])
                    ]);
                    ?>
                </div>
                <div class="row">
                    <ul class="legend">
                        <li><span class="holiday"></span> วันหยุด</li>
                        <li><span class="importantnotice"></span> ประกาศสำคัญ</li>
                        <li><span class="meeting"></span> ประชุม</li>
                        <li><span class="messages"></span> ข้อความ</li>
                    </ul>
                </div>
            </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.Left col -->
</div>

</section>
