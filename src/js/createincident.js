
if (location.pathname == '/incident/create') {
  var incidentTypes = document.getElementById('data').value;
  incidentTypes = JSON.parse(incidentTypes);

  var IncidentForm = document.getElementById('createIncident-id');
  var formsDiv = document.getElementById('forms-div');


  IncidentForm.addEventListener("submit", function(event){
      event.preventDefault();
      var output = {};
      output['_token'] = document.getElementById('incident-token').value;
      output['name'] = document.getElementById('incident-name').value;
      output['description'] = document.getElementById('incident-description').value;
      output['incident_type_id'] = document.getElementById('incident-type-id').value;
      output['priority_id'] = document.getElementById('incident-priority-id').value;
      var formsDiv = document.getElementById('incident-type-form');
      output['form_answer'] = JSON.stringify(toJSONString(formsDiv));

      postForm('/incident/create',output , 'post');
      // var inputForIncident = toJSONString(this);
      // formsDiv.innerHTML = "";
      // createForm(inputForIncident['incident_type_id']);
  });

}


createForm = function ( incident_type_id ) {
  var formsDiv = document.getElementById('incident-type-form');
  formsDiv.innerHTML = '';
  if(!incident_type_id){
    return;
  }
  for (var i=0;i<incidentTypes.length;i++) {
    if(incidentTypes[i]['id'] == incident_type_id){
      incidentType = incidentTypes[i];
      break;
    }
  }
  var form = jsonToForm(incidentType['form']['form_json']);
  formsDiv.appendChild(form);
}

function jsonToForm ( formInputs ) {
  formInputs = JSON.parse(formInputs);
  formInputs = formInputs.inputs;

  var div = document.createElement('div');


  for (var i=0; i<formInputs.length; i++) {
    var input = document.createElement(formInputs[i]['formField']);
    switch (formInputs[i]['formField']) {
      case 'input':
        div.appendChild(createInputElement(formInputs[i]));
        break;
      case 'textarea':
        div.appendChild(createTextareaElement(formInputs[i]));
        break;
      case 'select':
        div.appendChild(createSelectElement(formInputs[i]));
        break;
    }
  }

  // var submit = document.createElement('input');
  // submit.setAttribute('type','submit');
  // submit.value = "Next";
  // form.appendChild(submit);

  return div;
}


function createInputElement(input)
{
  if(input['type'] == 'checkbox')
  {
    return createCheckBox(input);
  }
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

function createCheckBox(input)
{
  var element = document.createElement('div');
  element.setAttribute('class','toggles');

  var divElement = document.createElement('div');
  divElement.setAttribute('class','item');

  var label = document.createElement('label');
  label.innerHTML = input['label'];
  divElement.appendChild(label);

  var subDivElement = document.createElement('div');
  subDivElement.setAttribute('class','toggle-bar');
  subDivElement.setAttribute('onclick',"toggleButton(this)");
  if ( input['value'] ) {
    subDivElement.setAttribute('class','toggle-bar Active');
  }

  var inputElement = document.createElement('input');
  inputElement.setAttribute('type',input['type']);
  inputElement.setAttribute('name',input['name']);
  if (input['value']){
    inputElement.setAttribute('checked','checked');
  }
  subDivElement.appendChild(inputElement);

  var spanElement = document.createElement('span');
  spanElement.setAttribute('class','off');
  spanElement.innerHTML = 'Off';
  if (input['value']) {
    spanElement.setAttribute('class','on');
    spanElement.innerHTML = 'On';
  }
  subDivElement.appendChild(spanElement);

  divElement.appendChild(subDivElement);
  element.appendChild(divElement);
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
  var div = document.createElement('div');
      div.setAttribute('class','select');

  var icon = document.createElement('i');
      icon.setAttribute('class','fa fa-chevron-down');

  var element = document.createElement('select');
  element.setAttribute('placeholder',input['label']);
  element.setAttribute('class','cstm-select');
  element.setAttribute('name',input['name']);
  element.setAttribute('required','required');
  var option = document.createElement('option');
  option.value = "";
  option.innerHTML = "Select";
  element.appendChild(option);
  for (var i=0;i<input.options.length;i++) {
    var option = document.createElement('option');
    option.value = input.options[i].value;
    option.innerHTML = input.options[i].label;
    if (input['value'] == input.options[i].value) {
      option.setAttribute('selected','selected');
    }
    element.appendChild(option);
  }
  div.appendChild(element);
  div.appendChild(icon);
  return div;
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


/**
 * [postForm description]
 * @param  {[type]} path   ['/contact']
 * @param  {[type]} params [{name:'charan',...}]
 * @param  {[type]} method ['post']
 * @return {[type]}        [description]
 */
function postForm(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
