<div>
    <a class='btn btn-sm btn-primary ' href="/admin/activity/add">新增 活动 >></a>
</div>
<p>

</p>
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th class="center">ID</th>
        <th class="center">标题</th>
        <th class="center">内容</th>
        <th class="center">缩略图</th>
        <th class="center">排序</th>
        <th class="center">状态</th>
        <th class="center">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list as $l):?>
        <tr>
            <td class="center">
                <?=$l->id?>
            </td>
            <td class="center">
                <?=$l->title?>
            </td>
            <td class="center">
                <?=$l->content?>
            </td>
            <td class="center">
                <?=$l->thumb?>
            </td>
            <td class="center">
                <?=$l->ord?>
            </td>
            <td class="center">
                <?php if($l->status==1):?>
                    <span class="label label-success">启用</span>
                <?php else:?>
                    <span class="label">禁用</span>
                <?php endif;?>
            </td>
            <td class="center">
                <a href="/admin/activity/edit?id=<?=$l->id?>" class="btn btn-primary btn-minier">
                    <i class="ace-icon fa fa-pencil align-top bigger-125"></i>
                    修改
                </a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>