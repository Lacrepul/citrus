var createDetailShows = [];
(function (){
    createDetailShows.detailshows = detailShows;

    function detailShows(){
        /**
        Показать\скрыть выпадающее меню3
        */
        var detailsButt = document.querySelectorAll("#detailId");
        detailsButt.forEach(function(item, i){
            item.addEventListener("click", showPlace);
            function showPlace(){
                var containerQuery = document.querySelectorAll("#containerId");
                if(containerQuery[i].hidden == true){
                    containerQuery[i].hidden = false;
                }else{
                    containerQuery[i].hidden = true;
                }
            }

            /**
             Регулярка для ссылки3
            */
            var places = document.querySelectorAll("#description");
            places.forEach(function(item, i){
                var text = places[i].innerText;
                var re = /([^\"=]{2}|^)((https?|ftp):\/\/\S+[^\s.,> )\];'\"!?])/; 
                var subst = '$1<a href="$2">$2</a>';
                text = text.replace(re, subst)
                item.innerHTML = text;
            });
        });

       /**
       При загрузке страницы, отобразить состояния чекбоксов3
       */
        let response = fetch( '/showSecondary', {
            method:'get',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
        .then(response => {
            return response.json();
        })
        .then(result => {
            var places = document.querySelectorAll("#placeForTextId");
            var checkBoxes = document.querySelectorAll("#secondCheck");             
            var mainCheckBoxes = document.querySelectorAll("#mainCheck");             
            var arrDataBaseChecks = [];

            /**
             Отобразить главные чекбоксы3
            */
            for(var q = 0; q < result.length; q++){ 
                if(result[q].Main_check == 1){  
                    mainCheckBoxes[q].checked = 'checked';
                }

            /**
             Отобразить второстепенные чекбоксы3
            */
                for(let w = 0; w < places[q].querySelectorAll("#secondCheck").length; w++){ 
                    arrDataBaseChecks.push(result[q]['secondary_check' + w]);
                }
            }
            for(let i = 0; i < checkBoxes.length; i++){
                if(arrDataBaseChecks[i] == 1){
                    checkBoxes[i].checked = 'checked';
                };
            }
        });
   }
})();