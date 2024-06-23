// modal fade show
$(document).ready(function(){
$("#google-lng-chng").click(function(){
  $("#exampleModal").addClass("modal fade show");
  $("#exampleModal").show();
  $.get("lang-option.html", function(data, status){
    $("#lang-option").html(data);
    $("#google_translate_element").hide();
  });
});


$("#trns-close").click(function(){
$('#exampleModal').hide();
});

});
function change_lang(lan){
 document.querySelector('#google_translate_element select').value =lan;
 document.querySelector('#google_translate_element select').dispatchEvent(new Event('change'));
};
