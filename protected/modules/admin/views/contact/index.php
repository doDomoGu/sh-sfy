<table id="sample-table-1" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="center">ID</th>
            <th class="center">客人姓名</th>
            <th class="center">联系电话</th>
            <th class="center">联系邮箱</th>
            <th class="center">内容</th>
            <th class="center">提交时间</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($list as $l):?>
        <tr>
            <td class="center">
                <?=$l->id?>
            </td>
            <td class="center">
                <?=$l->name?>
            </td>
            <td class="center">
                <?=$l->phone?>
            </td>
            <td class="center">
                <?=$l->email?>
            </td>
            <td class="center">
                <?=$l->body?>
            </td>
            <td class="center">
                <?=$l->add_time?>
            </td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>