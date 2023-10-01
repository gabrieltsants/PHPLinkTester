document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {

  const form = document.querySelector('form');
  const testTypeSelect = document.getElementById('testTypeSelect');
  const testProtocolSelect = document.getElementById('testProtocolSelect');

  testTypeSelect.addEventListener('change', function() {
      const selectedValue = this.value;

      document.getElementById('simpleDiv').style.display = 'none';
      document.getElementById('multipleDiv1').style.display = 'none';
      document.getElementById('multipleDiv2').style.display = 'none';

      if (selectedValue === '1') {
          document.getElementById('simpleDiv').style.display = 'block';
      } else if (selectedValue === '2') {
          document.getElementById('multipleDiv1').style.display = 'block';
      } else if (selectedValue === '3') {
          document.getElementById('multipleDiv2').style.display = 'block';
      }
  });

  testProtocolSelect.addEventListener('change', function() {
    const selectedValue = this.value;

    document.getElementById('testMethodSelectHttp').hidden = true;
    document.getElementById('testInterfaceSelectHttp').hidden = true;
    document.getElementById('testMethodSelectOthers').hidden = true;
    document.getElementById('testInterfaceSelectOthers').hidden = true;
    
    if (selectedValue === 'HTTP') {
      document.getElementById('testMethodSelectHttp').hidden = false;
      document.getElementById('testInterfaceSelectHttp').hidden = false;
    } else if (selectedValue === 'OTHERS') {
        document.getElementById('testMethodSelectOthers').hidden = false;
        document.getElementById('testInterfaceSelectOthers').hidden = false;
    } 
  });

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('linkOutput').value = 'Loading...';

    const formData = new FormData(form);
    const request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
                const response = request.responseText;
                document.getElementById('linkOutput').value = response;
            } else {
                alert('Submit request error, check your syntax');
                document.getElementById('linkOutput').value = '';
            }
        }
    };

    request.open('POST', '/linkRequest');
    request.send(formData);
  });
});

function copyOutput() {
  const outputData = document.getElementById('linkOutput').value;
  navigator.clipboard.writeText(outputData);
}