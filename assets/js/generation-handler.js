// listen for generate button
document.getElementById("gen--submit").addEventListener("click", function (event){
    event.preventDefault();
    // loading gif show
    // build object
    var formData = new FormData();
    // item name
    name = document.getElementById("gen--name").value;
    if (name == ""){
        formData.append("gen--name", generate_name());
    }
    formData.append("gen--name", name);
    // item type
    formData.append("gen--type", document.getElementById("img_type2").value);
    // item subtype    
    subtype = document.getElementById("img_type_sub2").value;
    if (subtype != "undefined" && subtype != "" && subtype != null){
        formData.append("gen--sub_type", subtype);
    }
    // level
    formData.append("gen--level", document.getElementById("gen--level").value);
    // elements & states
    var attributes = new Array;
    checkboxes = document.getElementsByClassName("gen_box")
    Array.prototype.forEach.call(checkboxes, function(element) {
        if (element.checked){
            attributes.push(element.value);
        }
    });
    // rarity
    rarity = document.getElementById("gen--rarity").value;
    formData.append("gen--rarity", rarity);
    formData.append("gen--attributes", attributes);
    // Display the key/value pairs
    sendDataAjax(formData);
});

function generate_name(){
    return "Generated Name";
}

function sendDataAjax(formData){
    var request = new XMLHttpRequest();
    request.open('POST', 'action.php?r=gen', /* async = */ true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
          if (request.status == 200) {
              var data = request.responseText;
              console.log(data);
          }
        }
    };
  
   
}
