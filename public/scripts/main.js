
// вешаем слушателя (addEventListene) события 'click' на обе кнопки
up_btn.addEventListener('click', (e) => change_rate_fetch(e)); //  если какое либо событие было браузер всегда это объект(e), но есть варианты
down_btn.addEventListener('click', (e) => change_rate_fetch(e));
// по событию 'click' собираем объект (e) и отправляем
//console.log(e);
function change_rate_fetch(e){
 e.preventDefault();
  let post_id = +e.target.dataset.postId; //забираем id нашего элемента и приводим его к числу (+)
   
 let action= false;
    if (e.target.id === "up_btn") action=1
    else if (e.target.id === "down_btn") action = -1;
   // alert([post_id, action]);
            if (post_id && action) {
                            fetch("posts",{
                                method:'PATCH',
                                body: JSON.stringify({
                                        "action":action,
                                        "post_id": post_id
                                    }) 
                                    } )
            .then((response)=>response.text())
            .then((rate)=> rate_p.innerHTML = rate)
            }

   }

