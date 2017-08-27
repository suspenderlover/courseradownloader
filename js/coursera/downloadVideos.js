
var timer = 1;


$(document).click(function(event) {
//    if($('#coursera-animated-logo').show()){
//$('#coursera-animated-logo').hide();
//$('.loadingbar').hide();
//    }
});

$(document).on("click", ".downloadbtn", function() {
    timer = 0;
    $('#videopopupid').removeClass('dialog--open');
    $('.loadingbar').show();
    $('.container').addClass('removeloader');
    $('form').submit();

});


$(document.body).on('click', '.removeloader', function() {

    $('.loadingbar').hide();
});
$(document.body).on('click', '.chkSelectAll', function() {

//     $('.chkSelectAll').click(function () {

    $('.selectedId').prop('checked', this.checked);
    $('.headings').prop('checked', this.checked);
});

$(document.body).on('focusin', '#downloadVideosText', function() {
    $('.error').hide();
    $('.loadingbar').hide();

});

//        $("#btnsubmitvideos").click(function(e) {

$(document.body).on('click', '.headings', function() {

//$('input[type=checkbox]').click(function () {
    var attrname = $(this).attr('level');
//      $(attrname).prop('checked', this.checked);
    $('.' + attrname).prop('checked', this.checked);
//    var sibs = false;
//    $(this).closest('ul').children('li').each(function () {
//        if($('input[type=checkbox]', this).is(':checked')) sibs=true;
//    })
//    $(this).parents('ul').prev().prop('checked', sibs);
});

//    $('.selectedId').change(function () {
//        var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
//        $('#selectall').prop("checked", check);
//    });

//});
$(document).on('click', '.toggle', function(e) {

//    e.preventDefault();

    var $this = $(this);

    if ($this.next().hasClass('show')) {
        $this.next().removeClass('show');
        $this.next().slideUp(1);
    } else {
//        $this.parent().parent().find('li .inner').removeClass('show');
//        $this.parent().parent().find('li .inner').slideUp(350);
        $this.next().toggleClass('show');
//        $this.next().slideToggle("slow");
    }
});


$(function() {









    $("#clear").click(function(evt) {
        evt.preventDefault();

        $("#downloadVideosText").val("").focus();
//    $.ajax({
//        type: "GET",
//        url: "/search/clear",
//        success: function(data, status, xhr){
//        },
//        error: function(xhr, status, err){
//        }
//    });
    });

    $("#container").Progress({
        // width & height of the progress bar
//  width: 180,
//  height: 40, 

        // percent value
        percent: 0,
        // background color of the progress bar
        backgroundColor: '#555',
        // fill color of the progress bar
        barColor: '#d9534f',
        // text color
        fontColor: '#fff',
        // border radius
        radius: 4,
        // font size
        fontSize: 12,
        // animation options
        increaseTime: 1000.00 / 60.00,
        increaseSpeed: 1,
        animate: true

    });

    var progress1 = $("#container").Progress({
        percent: 0, // 20%
    });
    function progressbar() {
        timer++;



        progress1.percent(timer);

    }
    setInterval(progressbar, 1000);


//    setInterval(progressBar, 1000);

//    function setProgress(){

//        	progress.percent(90);

//    }

//$('.downloadbtn').click(function(e) {
//
//
//    $('#videopopupid').removeClass('dialog--close');
////    $('#loadingbar').show();
//});

    $('.cancelbtn').click(function(e) {

        $('#videopopupid').addClass('dialog--close');
        $('#videopopupid').removeClass('dialog--open');

    });

//$('#pb div').hide()  // Hide it initially
//    .ajaxStart(function() {
//         $('#pb div').stop(true).animate({
//            width: $(this).attr('class') + '%'
//        }, {
//
//            step: function(now) {
//
//                $(this).text(Math.round(now) + '%');
//            },
//            duration: 10
//        });
//        $(this).show();
//    })
//    .ajaxStop(function() {
//        $(this).hide();
//    });





    $("#downloadVideosButton").click(function(e) {

        $('#videopopupid').removeClass('dialog--close');
        $('.loadingbar').hide();
        $('#btnsubmitvideos').show();

        e.preventDefault();
        var request_url = $("#downloadVideosText").val();
        if (isValidUrl(request_url) != 1) {

            $('.error').show();
            $('.error').html('Come on now! Does this really look like a coursera link to you?')

            return;
        }
        if (request_url.indexOf("coursera") >= 0) {

        } else {
            $('.error').show();
            $('.error').html('Come on now! Does this really look like a coursera link to you?');
            return;
        }

        if (request_url.substring(request_url.lastIndexOf('org') + 4).length > 2) {

        } else {
            $('.error').show();
            $('.error').html('This is not a link to a Coursera course page. Letâ€™s try again!');
            return;
        }



        var xhr = $.ajax({
            type: "POST",
            cache: false,
            url: $('#VideoData').data('videodata') + '?request_url=' + request_url,
            dataType: 'text',
            success: function(data) {
                var employees = [];
                var domHTML = "<ul class='ChkBoxList '><li class='first-child'> <input class='chkSelectAll' type='checkbox' name='headinds' value='Bike'>Select All</li></ul>";
                var i = 0;
                $('.error').hide();
                $('#videopopupid').addClass('dialog--open');
                if (data != "" && data != 'Not Found') {
                    var headingcounter = 0;

                    var json_decoded = JSON.parse(data);
                    domHTML += '<ul class="accordion ChkBoxList hidden"><li>';
                    $.each(json_decoded, function(key, val) {
                        console.log(val);
                        if(headingcounter>0){
                        
                        if (val != '[object Object]')
                        {

                            headingcounter++
                            i++;
                            if (i > 0) {
                                domHTML += '</ul>';
                            }
                            domHTML += "<ul class='toggle ChkBoxList'><li class='first-child'><input level='group" + headingcounter + "' class='group" + headingcounter + " headings' type='checkbox' name='headinds' value='Bike'> Week " + i + " - " + stringUpperCase(val) + '</a></li></ul><ul class="inner ChkBoxList hide">';
//                            domHTML += "\ <li class=''><a class'toggle'><input level='group"+headingcounter+"' class='group"+headingcounter+" headings' type='checkbox' name='headinds' value='Bike'>Week "+i+" - " +stringUpperCase(val) + "</a><ul class='inner ChkBoxList list-group'><li class='list-group-item '> </li>";
                        } else {
                            domHTML += "";
                            domHTML += " <li class='list-group-item'> <input  class='group" + headingcounter + " selectedId' id='" + val.videoid + "' type='checkbox' name='checkbox[]' value='" + val.name.replace(/\'/g, "") + ":" + val.videoid.replace(/\'/g, "") + "'>" + val.name + ".mp4</li> ";
//                            domHTML += "<li class='list-group-item'><div class='checkbox'> <label> <input  class='group"+headingcounter+" selectedId' id='" + val.videoid + "' type='checkbox' name='checkbox[]' value='"+val.name.replace(/\'/g, "")+":"+val.videoid.replace(/\'/g, "") +"'>" + val.name + ".mp4 </label></div></li>";
                        }
                    }else{
                        $('.modal-header').html(val);
                        headingcounter++
                    }
                    
                    });
                    domHTML += '</li>  </ul>';
//                    domHTML += '<ul class="accordion">  <li>    <a class="toggle" href="javascript:void(0);">Item 1</a>    <ul class="inner">      <li>Option 1</li>      <li>Option 2</li>      <li>Option 3</li>    </ul>  </li>  </ul>';


                    $('.feedback').html(domHTML);

                } else {

                    $('.feedback').html('This is not a link to a Coursera course page. Letâ€™s try again!.');
                    $('.feedback').css({color: "black"});
//                    $('.cancelbtn').hide();
                    $('.downloadbtn').hide();
                }
            }
        });
    });

    /*if(window.location.href.indexOf("state=csrf_code1234")!=-1){
     alert("Please enter the url again!");
     }
     */
});

function stringUpperCase(str) {

    return str.charAt(0).toUpperCase() + str.slice(1);

}

function isValidUrl(url) {

    var myVariable = url;
    if (/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(myVariable)) {
        return 1;
    } else {
        return -1;
    }
}

function downloadVideos()
{

    if (linkValidation() == true)
    {
        // proceed
        if (isUserSignedIn() != true)
        {
            var cOAuth = getOauthLink();
            alert(cOAuth.finalURL);
//            window.location.href = cOAuth.finalURL;

        }
        else
        {
            alert("logged in!");
            //getEnrollments();
            $("#target").prop("src", $("#downloadVideosText").val());
        }
        var xhr = new XMLHttpRequest();
        var url = "https://api.coursera.org/api/externalBasicProfiles.v1?q=me" + "&fields=timezone,locale,privacy";
        xhr.open("GET", url, false);
        xhr.onreadystatechange = function() {
            if (xhr.readystate == 4)
            {
                if (xhr.responsetext == 200)
                {
                    var jsonObj = JSON.parse(xhr.responseText);
                    console.log(JSON.stringify(jsonObj));
                }
            }
        }

    }
    else
    {
        alert("Not a valid link!");
    }
}

//If user is logged-in get his enrollments
/*function getEnrollments()
 {
 var enrollments={};
 $.ajax({
 crossDomain: true,
 contentType: "application/json; charset=utf-8",
 async:false,
 url: 'https://api.coursera.org/api/users/v1/me/enrollments',
 type:'GET',
 dataType: "jsonp",
 
 success:function(data)
 {
 alert(data);
 }
 })
 .done(function(data) {
 alert(JSON.parse(data));
 })
 }
 */

function linkValidation()
{
    /*
     if ($("#downloadVideosText").val() == "")
     {
     alert("please enter a link to your coursera videos page in format (https://class.coursera.org/<course_name>/lecture)");
     return false;
     
     }
     else
     {
     var coursePattern=/https:\/\/class\.coursera\.org\/\S+\/lecture/i;
     if(coursePattern.test($("#downloadVideosText").val())){
     return true;
     }
     else{
     return false;
     }
     }
     // if check if it's actually a link to the videos page
     */
    return true;

}
function isUserSignedIn()
{
    // if user's signed in
    if (window.location.href.indexOf("state=csrf_code1234") != -1)
        return true;
    else
        return false;
    // else reutn false
}
function getOauthLink()
{
    var cOAuth = new Object(); // cOAuth: short for courseraOAuth
    cOAuth.url = getOAuthURL();
    cOAuth.responseType = getResponseType();
    cOAuth.clientSecret = getClientSecret();
    cOAuth.clientID = getClientID();
    cOAuth.redirectUri = getRedirectURI();
    cOAuth.scope = getScope();
    cOAuth.state = getState();
    cOAuth.finalURL = cOAuth.url + "?" + "response_type=" + cOAuth.responseType + "&" + "client_secret=" + cOAuth.clientSecret +
            "&" + "client_id=" + cOAuth.clientID + "&" + "redirect_uri=" + cOAuth.redirectUri + "&" + "scope=" + cOAuth.scope + "&" + "state=" + cOAuth.state;
    return cOAuth;
}
function getScope()
{
    return "view_profile";
}
function getOAuthURL()
{
    return "https://accounts.coursera.org/oauth2/v1/auth";
}
function getResponseType()
{
    return "code";
}
function getClientSecret()
{
    return "9LU8xy7PZSDZp9hfOW5pNg";
}
function getClientID()
{
    return "Zhx55cQbZ4rjqmYwRpjSAw";
}
function getRedirectURI()
{
    return "http://localhost/courseraLectureDownloader/index.html";
}
function getState()
{
    return "csrf_code1234";
}

