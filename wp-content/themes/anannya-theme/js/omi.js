// Scripts for most read button function
$(document).ready(function(){
$("#o_most_read_button").click(function(){
    $("#o_most_read_tab").show(400);
    $("#o_most_recent_tab").hide(400);
    $("#o_most_read_button").css({"background-color": "#006747", "color": "#ffffff"});
    $("#o_most_recent_button").css({"background-color": "#f1f1f2", "color": "#006747"});
  });
  $("#o_most_recent_button").click(function(){
    $("#o_most_recent_tab").show(400);
    $("#o_most_read_tab").hide(400);
    $("#o_most_recent_button").css({"background-color": "#006747", "color": "#ffffff"});
    $("#o_most_read_button").css({"background-color": "#f1f1f2", "color": "#006747"});
  });
});