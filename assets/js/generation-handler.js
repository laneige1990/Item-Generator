// listen for generate button
document.getElementById("gen--submit").addEventListener("click", function (event){
    event.preventDefault();
    // loading gif show
    // build object
    var formData = new FormData();
    // item name
    name = document.getElementById("gen--name");
    if (name.value == ""){
        formData.append("gen--name", generate_name());
    }
    formData.append("gen--name", name.value);
    // item type
    formData.append("img_type2", document.getElementById("gen--name").value);
    // item subtype    
    subtype = document.getElementById("img_type_sub2").value;
    if (subtype != "undefined" && subtype != "" && subtype != null){
        formData.append("img_type_sub2", subtype);
    }
    // level
    formData.append("gen--level", document.getElementById("gen--level").value);
    // elements
    console.log(document.getElementsByClassName("gen_box"));
    // states
});

function generate_name(){
    return "Generated Name";
}
