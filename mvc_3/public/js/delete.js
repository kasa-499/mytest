function editSubmit() {
  if(window.confirm('編集画面に遷移します。よろしいでしょうか？')) {
    return true;
  } else {
    return false;
  }
};
function editEndSubmit() {
  if(window.confirm('編集します。よろしいでしょうか？')) {
    return true;
  } else {
    return false;
  }
};

function beforeSubmit() {
        if(window.confirm('削除しますがよろしいでしょうか？')) {
      return true;
    } else {
      return false;
    }
};


