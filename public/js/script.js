function editSubmit() {
    if(window.confirm('この内容で編集しますがよろしいでしょうか？')) {
    return true;
    } else {
    return false;
    }
}


$(function (){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
            //削除
        }else{
            return false;
        }
    });
});


