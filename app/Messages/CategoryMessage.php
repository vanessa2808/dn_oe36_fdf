<?php
function messageSuccess()
{
    return redirect('admin/categories/list_category')->with([
        'message' => trans('messages.categories.success'),
        'class' => 'success'
    ]);
}

function messageFail()
{
    return redirect('admin/categories/list_category')->with([
        'message' => trans('messages.categories.fail'),
        'class' => 'fail'
    ]);
}

?>
