/***Sign In ***/
$("#m_login_signin_submit").click(function(){
    var submit = true;
   /***Email validation***/
    if( !$("#email").val() ) {
        $("#email-error").removeClass("hide");
        $("#email-error").addClass("show");
        submit = false;
    }else if(!validateEmail($("#email").val())){
        $("#email-error1").removeClass("hide");
        $("#email-error1").addClass("show");
        submit = false;
    }else{
        $("#email-error1").removeClass("show");
        $("#email-error1").addClass("hide");        
    }
    if($("#email").val()){
        $("#email-error").removeClass("show");
        $("#email-error").addClass("hide");  
    }
   /***Password validation***/
    if( !$("#password").val() ) {
        $("#password-error").removeClass("hide");
        $("#password-error").addClass("show");
        submit = false;
    }else{
        $("#password-error").removeClass("show");
        $("#password-error").addClass("hide");        
    }
    return submit;
});
$("#email").blur(function(){
    if( !$("#email").val() ) {
        $("#email-error").removeClass("hide");
        $("#email-error").addClass("show");
    }else if(!validateEmail($("#email").val())){
        $("#email-error1").removeClass("hide");
        $("#email-error1").addClass("show");
    }else{
        $("#email-error1").removeClass("show");
        $("#email-error1").addClass("hide");        
    }
    if($("#email").val()){
        $("#email-error").removeClass("show");
        $("#email-error").addClass("hide");  
    } 
});
$("#password").blur(function(){
    if( !$("#password").val() ) {
        $("#password-error").removeClass("hide");
        $("#password-error").addClass("show");
    }else{
        $("#password-error").removeClass("show");
        $("#password-error").addClass("hide");        
    }
});
/***Sign Up ***/
$("#m_login_signup_submit").click(function(){
    var submit = true;
    var login = false;
   /***Email validation***/
    if( !$("#semail").val() ) {
        $("#semail-error").removeClass("hide");
        $("#semail-error").addClass("show");
        submit = false;
    }else if(!validateEmail($("#semail").val())){
        $("#semail-error1").removeClass("hide");
        $("#semail-error1").addClass("show");
        submit = false;
    }else{
        $("#semail-error1").removeClass("show");
        $("#semail-error1").addClass("hide");        
    }
    if($("#semail").val()){
        $("#semail-error").removeClass("show");
        $("#semail-error").addClass("hide");  
    }
   /***Password validation***/
    if( $("#spassword").val().length < 8 ) {
        $("#spassword-error").removeClass("hide");
        $("#spassword-error").addClass("show");
        $("#scpassword-error").removeClass("hide");
        $("#scpassword-error").addClass("show");
        submit = false;
    }else if($("#spassword").val()!=$("#scpassword").val()){
        $("#spassword-error").removeClass("show");
        $("#spassword-error").addClass("hide");
        $("#scpassword-error").removeClass("hide");
        $("#scpassword-error").addClass("show"); 
        submit = false;
    }else{
        $("#spassword-error").removeClass("show");
        $("#spassword-error").addClass("hide");
        $("#scpassword-error").removeClass("show");
        $("#scpassword-error").addClass("hide");
    }
    /***Full name validation***/
    if( !$("#sfullname").val() ) {
        $("#sfullname-error").removeClass("hide");
        $("#sfullname-error").addClass("show");
        submit = false;
    }else if(!validatefullname($("#sfullname").val())){
        $("#sfullname-error").removeClass("show");
        $("#sfullname-error").addClass("hide");
        $("#sfullname-error1").removeClass("hide");
        $("#sfullname-error1").addClass("show");
        submit = false;
    }else{
        $("#sfullname-error").removeClass("show");
        $("#sfullname-error").addClass("hide");
        $("#sfullname-error1").removeClass("show");
        $("#sfullname-error1").addClass("hide");
    }
    /***Phone validation***/
    if( !$("#sphone").val() ) {
        $("#sphone-error").removeClass("hide");
        $("#sphone-error").addClass("show");
        submit = false;
    }else if(!$.isNumeric($("#sphone").val())){
        $("#sphone-error1").removeClass("hide");
        $("#sphone-error1").addClass("show");
        submit = false;
    }else{
        $("#sphone-error").removeClass("show");
        $("#sphone-error").addClass("hide");
        $("#sphone-error1").removeClass("show");
        $("#sphone-error1").addClass("hide");
    }
    /***Company name validation***/
    if( !$("#scompany_name").val() ) {
        $("#scompany_name-error").removeClass("hide");
        $("#scompany_name-error").addClass("show");
        submit = false;
    }else{
        $("#scompany_name-error").removeClass("show");
        $("#scompany_name-error").addClass("hide");
    }
   /***website validation***/
    if( !$("#swebsite").val() ) {
        $("#swebsite-error").removeClass("hide");
        $("#swebsite-error").addClass("show");
        submit = false;
    }else if(!validateURL($("#swebsite").val())){
        $("#swebsite-error1").removeClass("hide");
        $("#swebsite-error1").addClass("show");
        submit = false;
    }else{
        $("#swebsite-error").removeClass("show");
        $("#swebsite-error").addClass("hide"); 
        $("#swebsite-error1").removeClass("show");
        $("#swebsite-error1").addClass("hide");        
    }
    if($("#swebsite").val()){
        $("#swebsite-error").removeClass("show");
        $("#swebsite-error").addClass("hide");  
    }
    /***Traffic validation***/
    if($("#traffic").val()==0){
        $("#traffic-error").removeClass("hide");
        $("#traffic-error").addClass("show"); 
        submit = false;
    }else{
        $("#traffic-error").removeClass("show");
        $("#traffic-error").addClass("hide");
    }

    /***Agree validation***/
    if ( !$("#agree").is(':checked') ) {
        $("#agree-error").removeClass("hide");
        $("#agree-error").addClass("show"); 
        submit = false;
    }else{
        $("#agree-error").removeClass("show");
        $("#agree-error").addClass("hide");
    }  
    return submit;
});
$("#semail").blur(function(){
    if( !$("#semail").val() ) {
        $("#semail-error").removeClass("hide");
        $("#semail-error").addClass("show");
    }else if(!validateEmail($("#semail").val())){
        $("#semail-error1").removeClass("hide");
        $("#semail-error1").addClass("show");
    }else{
        $("#semail-error1").removeClass("show");
        $("#semail-error1").addClass("hide");        
    }
    if($("#semail").val()){
        $("#semail-error").removeClass("show");
        $("#semail-error").addClass("hide");  
    }
});
$("#spassword").blur(function(){
    if( $("#spassword").val().length < 8 ) {
        $("#spassword-error").removeClass("hide");
        $("#spassword-error").addClass("show");
        $("#scpassword-error").removeClass("hide");
        $("#scpassword-error").addClass("show");
    }else if($("#spassword").val()!=$("#scpassword").val()){
        $("#spassword-error").removeClass("show");
        $("#spassword-error").addClass("hide");
        $("#scpassword-error").removeClass("hide");
        $("#scpassword-error").addClass("show"); 
    }else{
        $("#spassword-error").removeClass("show");
        $("#spassword-error").addClass("hide");
        $("#scpassword-error").removeClass("show");
        $("#scpassword-error").addClass("hide");
    }
});
$("#scpassword").blur(function(){
    if($("#spassword").val()!=$("#scpassword").val()){
        $("#scpassword-error").removeClass("hide");
        $("#scpassword-error").addClass("show"); 
    }else{
        $("#scpassword-error").removeClass("show");
        $("#scpassword-error").addClass("hide");
    }
});
$("#sfullname").blur(function(){
    if( !$("#sfullname").val() ) {
        $("#sfullname-error").removeClass("hide");
        $("#sfullname-error").addClass("show");
        submit = false;
    }else if(!validatefullname($("#sfullname").val())){
        $("#sfullname-error").removeClass("show");
        $("#sfullname-error").addClass("hide");
        $("#sfullname-error1").removeClass("hide");
        $("#sfullname-error1").addClass("show");
        submit = false;
    }else{
        $("#sfullname-error").removeClass("show");
        $("#sfullname-error").addClass("hide");
        $("#sfullname-error1").removeClass("show");
        $("#sfullname-error1").addClass("hide");
    }
});
$("#sphone").blur(function(){
    if( !$("#sphone").val() ) {
        $("#sphone-error").removeClass("hide");
        $("#sphone-error").addClass("show");
    }else if(!$.isNumeric($("#sphone").val())){
        $("#sphone-error1").removeClass("hide");
        $("#sphone-error1").addClass("show");
    }else{
        $("#sphone-error").removeClass("show");
        $("#sphone-error").addClass("hide");
        $("#sphone-error1").removeClass("show");
        $("#sphone-error1").addClass("hide");
    }
});
$("#scompany_name").blur(function(){
    if( !$("#scompany_name").val() ) {
        $("#scompany_name-error").removeClass("hide");
        $("#scompany_name-error").addClass("show");
    }else{
        $("#scompany_name-error").removeClass("show");
        $("#scompany_name-error").addClass("hide");
    }
});
$("#swebsite").blur(function(){
    if( !$("#swebsite").val() ) {
        $("#swebsite-error").removeClass("hide");
        $("#swebsite-error").addClass("show");
    }else if(!validateURL($("#swebsite").val())){
        $("#swebsite-error1").removeClass("hide");
        $("#swebsite-error1").addClass("show");
    }else{
        $("#swebsite-error").removeClass("show");
        $("#swebsite-error").addClass("hide"); 
        $("#swebsite-error1").removeClass("show");
        $("#swebsite-error1").addClass("hide");        
    }
    if($("#swebsite").val()){
        $("#swebsite-error").removeClass("show");
        $("#swebsite-error").addClass("hide");  
    }
});
$("#traffic").blur(function(){
    if($("#traffic").val()==0){
        $("#traffic-error").removeClass("hide");
        $("#traffic-error").addClass("show"); 
    }else{
        $("#traffic-error").removeClass("show");
        $("#traffic-error").addClass("hide");
    }
});
$("#agree").change(function(){
    if ( !$("#agree").is(':checked') ) {
        $("#agree-error").removeClass("hide");
        $("#agree-error").addClass("show"); 
    }else{
        $("#agree-error").removeClass("show");
        $("#agree-error").addClass("hide");
    }
});
/***Toggle forms ***/
$("#m_login_signup").click(function(){
    $(".m-login__signin").removeClass("animated flipInX");
    $(".m-login__signin").addClass("hide");
    $(".m-login__forget-password").removeClass("animated flipInX show");
    $(".m-login__forget-password").addClass("hide"); 
    $(".m-login__signup").addClass("animated flipInX show"); 
    
}); 
$("#m_login_forget_password").click(function(){
    $(".m-login__signin").removeClass("animated flipInX");
    $(".m-login__signin").addClass("hide");
    $(".m-login__signup").removeClass("animated flipInX");
    $(".m-login__signup").addClass("hide");
    $(".m-login__forget-password").addClass("animated flipInX show"); 
    
});
/*** Forget Password ***/
$("#m_login_forget_password_submit").click(function(){
    var submit = true;
   /***Email validation***/
    if( !$("#lstpwemail").val() ) {
        $("#lstpwemail-error").removeClass("hide");
        $("#lstpwemail-error").addClass("show");
        submit = false;
    }else if(!validateEmail($("#lstpwemail").val())){
        $("#lstpwemail-error1").removeClass("hide");
        $("#lstpwemail-error1").addClass("show");
        submit = false;
    }else{
        $("#lstpwemail-error1").removeClass("show");
        $("#lstpwemail-error1").addClass("hide");        
    }
    if($("#lstpwemail").val()){
        $("#lstpwemail-error").removeClass("show");
        $("#lstpwemail-error").addClass("hide");  
    }
    return submit;
});
/* jQuery Validate Emails with Regex */
function validateEmail(Email) {
    var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return $.trim(Email).match(pattern) ? true : false;
}
/* jQuery Validate Emails with Regex */
function validateURL(URL) {
    var pattern = /^[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
    return $.trim(URL).match(pattern) ? true : false;
}
/* jQuery Validate Full Name with Regex */
function validatefullname(Fullname) {
    var pattern = /^[a-zA-Z\s]+$/;
    return $.trim(Fullname).match(pattern) ? true : false;
}