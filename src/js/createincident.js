var incidentTypes = document.getElementById('data').value;
incidentTypes = JSON.parse(incidentTypes);

var IncidentForm = document.getElementById('createIncident-id');
var formsDiv = document.getElementById('forms-div');
var formIndex = 0;

IncidentForm.addEventListener("submit", function(event){
    event.preventDefault();
    var inputForIncident = toJSONString(this);
    formsDiv.innerHTML = "";
    createForm(inputForIncident['incident_type_id']);
});

function formSubmit(event)
{
  event.preventDefault();
  console.log("Hero");
}

createForm = function ( incident_type_id ) {
  for (var i=0;i<incidentTypes.length;i++) {
    if(incidentTypes[i]['id'] == incident_type_id){
      incidentType = incidentTypes[i];
      break;
    }
  }
  var form = jsonToForm(incidentType['forms'][0]['form_json']);
  formsDiv.appendChild(form);
}

function jsonToForm ( formInputs ) {
  formInputs = JSON.parse(formInputs);
  formInputs = formInputs.inputs;

  var form = document.createElement('Form');
  form.setAttribute('onsubmit','formSubmit');

  for (var i=0; i<formInputs.length; i++) {
    var input = document.createElement(formInputs[i]['formField']);
    switch (formInputs[i]['formField']) {
      case 'input':
        form.appendChild(createInputElement(formInputs[i]));
        break;
      case 'textarea':
        form.appendChild(createTextareaElement(formInputs[i]));
        break;
      case 'select':
        form.appendChild(createSelectElement(formInputs[i]));
        break;
    }
  }

  var submit = document.createElement('input');
  submit.setAttribute('type','submit');
  submit.value = "Next";
  form.appendChild(submit);

  return form;
}


function createInputElement(input)
{
  var element = document.createElement('input');
  element.setAttribute('type',input['type']);
  element.setAttribute('placeholder',input['label']);
  element.setAttribute('name',input['name']);
  if(input['type'] == 'text'){
    element.setAttribute('required','required');
  }
  if(input['value']){
    element.value = input['value'];
  }
  return element;
}

function createTextareaElement(input)
{
  var element = document.createElement('textarea');
  element.setAttribute('type',input['type']);
  element.setAttribute('placeholder',input['label']);
  element.setAttribute('name',input['name']);
  element.setAttribute('required','required');
  if(input['value']){
    element.innerHTML = input['value'];
  }
  return element;
}

function createSelectElement(input)
{
  var element = document.createElement('select');
  element.setAttribute('placeholder',input['label']);
  element.setAttribute('name',input['name']);
  element.setAttribute('required','required');
  var option = document.createElement('option');
  option.value = "";
  option.innerHTML = "--select--";
  element.appendChild(option);
  console.log(input);
  for (var i=0;i<input.options.length;i++) {
    var option = document.createElement('option');
    option.value = input.options[i].value;
    option.innerHTML = input.options[i].label;
    if (input['value'] == input.options[i].value) {
      option.setAttribute('selected','selected');
    }
    element.appendChild(option);
  }
  if(input['value']){
    element.innerHTML = input['value'];
  }
  return element;
}


/**
 * [toJSONString converts Form to a Json Object]
 * @param  {[type]} form [description]
 * @return {[type]}      [description]
 */
function toJSONString( form ) {
		var obj = {};
		var elements = form.querySelectorAll( "input, select, textarea" );
		for( var i = 0; i < elements.length; ++i ) {
			var element = elements[i];
			var name = element.name;
			var value = element.value;

			if( name ) {
				obj[ name ] = value;
			}
		}

		return obj;
	}
