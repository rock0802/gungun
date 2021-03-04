function docOpen(argNo){
 // --------------------------------------------------------------
 //  文書の開閉
 // --------------------------------------------------------------
  var wArea = document.getElementById("area"+argNo);   // 全体の枠
  var wCheck= document.getElementById("ck"+argNo);     // チェックボックス
  var wDoc  = document.getElementById("doc"+argNo);    // 文書のエリア
 
  if(wCheck.checked){
    // 全体枠高さを文書エリアの高さ＋ボタン高さにする
    wArea.style.height = parseInt(wDoc.clientHeight + 40)+"px";
  }else{
    wArea.style.height = "";
  }
}

