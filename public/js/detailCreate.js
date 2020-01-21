var createDetailCreate = [];
(function (){
createDetailCreate.detailCreateScripts = detailCreateScripts;

  function detailCreateScripts(){
    addButton.addEventListener("click", createCheckboxes);
    removeButton.addEventListener("click", removeElement);
    var i = 0;
    function removeElement(){
      var rElement = document.getElementById('formGroup' + i)
      rElement.parentNode.removeChild(rElement);
      if(i > 0){
          i -= 1;
      }
    }

    function createCheckboxes(){
      if(i < 5){
        i++;
        var place = document.getElementById('place');
        var formGroup = document.createElement('div');
        var detailDescription = document.createElement('input');
        detailDescription.id = 'checkboxDescriptionId' + i;
        detailDescription.name = 'checkboxDescriptionName' + i;
        detailDescription.className = 'form-control';
        formGroup.id = 'formGroup' + i;
        formGroup.className = "form-group";
        place.appendChild(formGroup);
        formGroup.appendChild(detailDescription);
      }
    }
  }
})();