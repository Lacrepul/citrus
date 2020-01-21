var createDetailSecondaryChecks = [];
(function (){
    createDetailSecondaryChecks.detailSecondaryChecks = detailSecondaryChecks;

    function detailSecondaryChecks(){

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
                   var id = places[i].attributes[2].value;
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
    }

        /**
        Фетч для дополнительных чекбоксов
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
})();