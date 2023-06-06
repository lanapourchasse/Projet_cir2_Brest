'use strict';


function ajaxRequest(type, url, callback, data )
{
  let xhr;
  console.log(data);
  // Create XML HTTP request.
  xhr = new XMLHttpRequest();
  if (type == 'GET' && data != null)
    url += '?' + data;
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  console.log(xhr.responseText);
  // Add the onload function.
  xhr.onload = () =>
  {
    switch (xhr.status)
    {
      case 200:
      case 201:
        console.log(xhr.responseText);
        callback(JSON.parse(xhr.responseText));
        break;
    }
  };

  // Send XML HTTP request.
 // newdata =
  xhr.send(data);
}
