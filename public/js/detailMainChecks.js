var createDetailMainChecks = [];
(function (){
    createDetailMainChecks.detailMainChecks = detailMainChecks;

    function detailMainChecks(){

        /**
        Онклик для главных чекбоксов
        */
        var checkBoxesMain = document.querySelectorAll("#mainCheck");
        checkBoxesMain.forEach(function(item, i){
           item.addEventListener("click", mainCheck);
        });

        function mainCheck(){
            var result;
            var id = this.attributes[3].value;
            if(this.checked == 1){
                result = 1;
            }else{
                result = 0;
            }
            fetchCheckMain(id, result)
        }

        /**
        Фетч для главных чекбоксов
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
    }
})();