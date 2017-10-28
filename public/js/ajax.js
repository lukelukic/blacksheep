/**
 * Created by luke on 28.10.17..
 */



var ajax = {
  returned : null,
  proba : false,
  requestData : null,
  send : function() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              getAjaxData(5);
          }
      };
      xhttp.open("GET", base_url + "/cards", true);
      xhttp.send();
  },
  get : function() {
      return this.returned;
  }
};


function getAjaxData(data) {
    console.log(data);
    ajaxResponse = data;
}

ajax.send();

console.log(ajaxResponse);





