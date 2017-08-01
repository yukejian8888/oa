// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
// register Form

$(function() {
    var button = $('#registerButton');
    var box = $('#registerBox');
    var form = $('#registerForm');
    button.removeAttr('href');
    button.mouseup(function(register) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() {
        return false;
    });
    $(this).mouseup(function(register) {
        if(!($(register.target).parent('#registerButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});

//个人中心下拉菜单
$(function() {
    var button = $('#user');
    var box = $('#person');
    button.removeAttr('href');
    button.mouseup(function(person) {
        box.toggle();
        button.toggleClass('active');
    });
    $(this).mouseup(function(person) {
        if(!($(person.target).parent('#user').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
//搜索
/*function search(){
    var obj1 = document.getElementById('keywords');
    var obj2 = document.getElementById('choose');
    var keywords = obj1.value;
    var choose = obj2.value
   if(keywords==""){
       obj1.placeholder="！关键字不能为空！";
   }else{
       location.href = '__CONTROLLER__/search/kw/'+keywords+'/ch/'+choose;
   }
}*/

//显示、隐藏提示框
function prompt_show(content){
    obj=document.getElementById('prompt');
    obj.innerHTML=content;
    obj.style.display="block";
    setTimeout("prompt_hidden()",2000);
}
function prompt_hidden(){
    document.getElementById('prompt').style.display="none";
}
