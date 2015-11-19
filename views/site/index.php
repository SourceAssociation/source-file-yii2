<?php

/* @var $this yii\web\View */

use yii\web\AssetBundle;

$this->title = Yii::t('app', 'Files');
?>

<?php if (count($files)) :?>
<div class="uk-grid uk-margin-top">
    <div class="uk-width-small-1-1 uk-width-medium-1-2">
        <div class="uk-form">
            <span class="am-input-group-label">
                <select id="columns" onchange="sorter.search('query')"></select>
            </span>
            <input type="text" id="query" onkeyup="sorter.search('query')">
        </div>
    </div>
    <div class="uk-width-small-1-1 uk-width-medium-1-2">
        <div class="details uk-text-right">
            <span>当前记录： <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></span>
            <span class="uk-margin-left"><a class="uk-button uk-button-small uk-button-success" href="javascript:sorter.reset()">reset</a></span>
        </div>
    </div>
</div>
<hr>
<div class="uk-overflow-container uk-margin-large-bottom">
    <table class="uk-table uk-table-hover uk-table-striped uk-text-nowrap tinytable" id="table">
        <thead>
            <tr>
                <th><h3>文件名</h3></th>
                <th><h3>文件类型</h3></th>
                <th><h3>大小</h3></th>
                <th><h3>时间</h3></th>
                <th><h3>链接类型</h3></th>
                <th class="nosort"><h3>操作</h3></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file) : ?>
            <tr>
                <td><?php echo $file->name; ?></td>
                <td><span class="am-text-success"><?php echo $file->getFileType(); ?></span></td>
                <td><span class="am-text-warning"><?php echo $file->getFileSize(); ?></span></td>
                <td><?php echo date('Y-m-d', strtotime($file->create_at)); ?></td>
                <td><?php echo Yii::$app->params['file_url_type'][$file->urltype]; ?></td>
                <td>
                    <?php if ($file->urltype == 1):?>
                        <a href="<?php echo $file->url;?>" download="true">下载</a>
                    <?php else:?>
                        <a href="<?php echo $file->url;?>" target="_blank">打开</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
<hr>

<div class="uk-grid" id="tablelocation">
    <div class="uk-width-small-1-1 uk-width-medium-1-3">
        <div class="uk-form">
            <select onchange="sorter.size(this.value)">
                <option value="5">5</option>
                <option value="10" selected="selected">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>选择每页显示数目</span>
        </div>
    </div>
    <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-text-center">
        <div class="page">
            <label>当前页：</label><span id="currentpage"></span>
            <label class="uk-margin-left">总页数：</label><span id="totalpages"></span>
        </div>
    </div>
    <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-text-right">
        <div class="uk-form">
            <select id="pagedropdown"></select>
            <a href="javascript:sorter.showall()">显示所有数据</a>
        </div>
    </div>
</div>

<div class="uk-grid" id="tablefooter">
    <div class="uk-width-1-1" id="tablenav">
        <ul class="uk-list uk-pagination uk-text-center">
            <li><a href="javascript:void(0);" onclick="sorter.move(-1, true)">&laquo;</a></li>
            <li><a href="javascript:void(0);" onclick="sorter.move(-1)">&laquo; 上一页</a></li>
            <li><a href="javascript:void(0);" onclick="sorter.move(1)">下一页 &raquo;</a></li>
            <li><a href="javascript:void(0);" onclick="sorter.move(1, true)">&raquo;</a></li>
        </ul>
    </div>
</div>

<script type="text/javascript" src="/tools/tinytable/tinytable.js"></script>
<script type="text/javascript">
    var sorter = new TINY.table.sorter('sorter','table',{
        headclass:'head',
        ascclass:'asc',
        descclass:'desc',
        evenclass:'evenrow',
        oddclass:'oddrow',
        evenselclass:'evenselected',
        oddselclass:'oddselected',
        paginate:true,
        size:10,
        colddid:'columns',
        currentid:'currentpage',
        totalid:'totalpages',
        startingrecid:'startrecord',
        endingrecid:'endrecord',
        totalrecid:'totalrecords',
        hoverid:'selectedrow',
        pageddid:'pagedropdown',
        navid:'tablenav',
        sortcolumn:0,
        sortdir:1,
        sum:[8],
        avg:[6,7,8,9],
        columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
        init:true
    });
</script>

<?php else:?>
    <div class="uk-alert">
        <p class="uk-text-center">暂无文件。</p>
    </div>
<?php endif;?>