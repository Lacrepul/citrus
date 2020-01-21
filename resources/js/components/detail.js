var createDetail = [];
(function (){
createDetail.detailScripts = detailScripts;

    function detailScripts(){

        /**
        Онклик для главных чекбоксов1
        */
        var checkBoxesMain = document.querySelectorAll("#mainCheck");
        checkBoxesMain.forEach(function(item, i){
            item.addEventListener("click", mainCheck);
        });

        function mainCheck(){
            var result;
            var id = this.attributes[2].value;
            if(this.checked == 1){
                result = 1;
            }else{
                result = 0;
            }
            fetchCheckMain(id, result)
        }

        /**
        Фетч для главных чекбоксов2
        */
        async function fetchCheckMain(id, result){
            let formData = new FormData();
            formData.append('value', result);
            formData.append('id', id );

            let response = await fetch('/detailMainFetch', {
                headers : {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                method: 'POST',
                body: formData
            });
        }

        /**
        Онклик для дополнительных чекбоксов1
        */
        var checkBoxes = document.querySelectorAll("#secondCheck");
        var places = document.querySelectorAll("#placeForTextId");

        checkBoxes.forEach(function(item, i){
            item.addEventListener("click", check);
        });

        function check(){
            var resultat;
            for(let i=0; i < places.length; i++){
                if(Array.prototype.indexOf.call(places[i].querySelectorAll("#secondCheck"), event.target) != -1){
                    var id = places[i].attributes[1].value;
                    var indexSecondary = (Array.prototype.indexOf.call(places[i].querySelectorAll("#secondCheck"), event.target));
                }
            }
            if(this.checked == 1){
                resultat = 1;
            }else{
                resultat = 0;
            }
            fetchCheckSecondary(id, resultat, indexSecondary);
        }

        /**
        Фетч для дополнительных чекбоксов2
        */
        async function fetchCheckSecondary(id, resultat, indexSecondary){
            let formData = new FormData();
            formData.append('value', resultat);
            formData.append('id', id );
            formData.append('secondaryId', indexSecondary );

            let response = await fetch('/detailSecondaryFetch', {
                headers : {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                method: 'POST',
                body: formData
            });
            result = await response.text();
        }

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