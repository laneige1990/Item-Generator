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
    attributes.push(rarity);
    formData.append("gen--attributes", attributes);
    // Display the key/value pairs
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }
});

function generate_name(){
    return "Generated Name";
}
