$(document).ready(function() {
    var objDiv = document.getElementById("chatbox");
    objDiv.scrollTop = objDiv.scrollHeight;

    setInterval (loadlist, 1000);
    function loadlist() {
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("listwrapper").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","post.php?id=3", true);
        xmlhttp.send();
    }

    $("#usermsg").keyup(function(event){
    if(event.keyCode == 13){
        $("#id_of_button").click();
    }
});
});

$(document).ready(function() {
    $("#submitmsg").click(function() {
        var useremail;
        useremail = document.getElementById("wel").innerHTML;
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
             //document.getElementById("usermsg").innerHTML=xmlhttp.responseText;
            }
        }
        var usermsg = document.getElementById("usermsg").value;
        document.getElementById("usermsg").value = " ";
        var num=2;
        xmlhttp.open("GET","post.php?id="+num+"&msg="+usermsg+"&email="+useremail, true);
        xmlhttp.send();
        //Auto-scroll           
        var objDiv = document.getElementById("chatbox");
        objDiv.scrollTop = objDiv.scrollHeight;
    });

    setInterval (loadLog, 1000);

    function loadLog() {
        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("chatbox").innerHTML=xmlhttp.responseText;
            }
        }
        var useremail = document.getElementById("wel").innerHTML;
        xmlhttp.open("GET","post.php?id=1&email="+useremail, true);
        xmlhttp.send();
    
        }
});
