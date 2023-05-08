/*------------add filed js------------*/

var speakers = document.getElementById('speakers')
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');
console.log(speakers)
console.log(add_more_fields)
console.log(remove_fields)
add_more_fields.onclick = function(){
    var newField = document.createElement('input');
    newField.setAttribute('type','text');
    newField.setAttribute('style','margin-top: 5px');
    newField.setAttribute('name','speakers[]');
    newField.setAttribute('class','form-control speakers');
    newField.setAttribute('siz',50);
    newField.setAttribute('placeholder','Спикер');
    speakers.appendChild(newField);
}

remove_fields.onclick = function(){
    var input_tags = speakers.getElementsByTagName('input');
    if(input_tags.length > 2) {
        speakers.removeChild(input_tags[(input_tags.length) - 1]);
    }
}
document.getElementById('print-values-btn').onclick = function() {
    let allTextBoxes = document.getElementsByName('survey_options[]');
    for(let i of allTextBoxes){
        console.log(i.value) //here you will be able to see all values in the console
    }
}
