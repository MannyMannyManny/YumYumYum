var tw = {
  url: 'https://twitter.com/intent/tweet?url=',
  width: 660,
  height: 340,
  title: 'Twitter Share'
};

var ln = {
  url: 'https://www.linkedin.com/shareArticle?mini=true&url=',
  width: 500,
  height: 600,
  title: 'LinkedIn Share'
};

var gp = {
  url: 'https://plus.google.com/share?url=',
  width: 500,
  height: 600,
  title: 'Google Plus Share'
};

function popup(url, title, w, h) {
  var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
  var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

  var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
  var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

  var left = ((width / 2) - (w / 2)) + dualScreenLeft;
  var top = ((height / 3) - (h / 3)) + dualScreenTop;

  var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

  if (window.focus) {
    newWindow.focus();
  }
}

(function() {
  //INITIAL SETUP FACEBOOK
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  jQuery(document).ready(function () {
    //AJAX SETUP FOR CSRF TOKEN
    var csrf = jQuery('meta[name="csrf-token"]').attr('content');
    jQuery.ajaxSetup({
      beforeSend: function (xhr, settings) {
        if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
          xhr.setRequestHeader("X-CSRF-Token", csrf);
        }
      }
    });
    jQuery('.share-btn').on("click", function () {
      //alert(this.id);
      switch (this.id) {
        case 'fb':
          FB.login(function (response) {
            if (response.authResponse) {
              FB.ui({
                method: 'share_open_graph',
                action_type: 'Share',
                action_properties: JSON.stringify({
                  object: window.location.href
                })
              }, function (response) {
                if (response.post_id) {
                  jQuery.post("/stats", {type: "fb"})
                      .done(function (data) {
                        if (data.status == 'OK') {
                          jQuery('#fb .count').html(parseInt(data.count));
                        }
                      });
                }
              });
            }
          }, {
            scope: 'publish_actions',
            return_scopes: true
          });
        break;

        case 'tw':
          popup(tw.url+window.location.href, tw.title, tw.width, tw.height);
          jQuery.post("/stats", {type: "tw"})
              .done(function (data) {
                if (data.status == 'OK') {
                  jQuery('#tw .count').html(parseInt(data.count));
                }
              });
        break;

        case 'gp':
          popup(gp.url+window.location.href, gp.title, gp.width, gp.height);
          jQuery.post("/stats", {type: "gp"})
              .done(function (data) {
                if (data.status == 'OK') {
                  jQuery('#gp .count').html(parseInt(data.count));
                }
              });
        break;

        case 'ln':
          popup(ln.url+window.location.href, ln.title, ln.width, ln.height);
          jQuery.post("/stats", {type: "ln"})
              .done(function (data) {
                if (data.status == 'OK') {
                  jQuery('#ln .count').html(parseInt(data.count));
                }
              });
        break;
      }
    });
  });

}).call(this);
