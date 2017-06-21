var EditIncidentForm = document.getElementById('edit-incident-form');
var formAnswerJson = document.getElementById('form-answer-json').value;

var formsDiv = document.getElementById('form-answer-div');
var form = jsonToForm(formAnswerJson);
formsDiv.appendChild(form);


EditIncidentForm.addEventListener("submit", function(event){
    event.preventDefault();
    var output = {};
    output['_token'] = document.getElementById('incident-token').value;
    output['name'] = document.getElementById('incident-name').value;
    output['description'] = document.getElementById('incident-description').value;
    var formsDiv = document.getElementById('form-answer-div');
    output['form_answer'] = JSON.stringify(toJSONString(formsDiv));
    // console.log(output);
    postForm(location.pathname, output , 'post');
});
