/*  for Toggle Menu   */
var navLinks = document.getElementById("navLinks");
function showMenu(){
    navLinks.style.right = "0";
}
function hideMenu(){
    navLinks.style.right = "-200px";
}

/*  for password   */

$(document).ready(function() {

    $("#icon-click").click(function() {
    
      var className = $("#icon").attr('class');
      className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'
    
      $("#icon").attr('class', className);
      var input = $("#u_ps");
    
      if (input.attr("type") == "text") {
        input.attr("type", "password");
      } else {
        input.attr("type", "text");
      }
    });

});

$(document).ready(function() {

    $("#icon-clickk").click(function() {
    
      var classNamee = $("#iconn").attr('class');
      classNamee = classNamee.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'
    
      $("#iconn").attr('class', classNamee);
      var inputt = $("#a_ps");
    
      if (inputt.attr("type") == "text") {
        inputt.attr("type", "password");
      } else {
        inputt.attr("type", "text");
      }
    });

});