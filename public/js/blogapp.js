'use strict';

(function () {
    var DEFAULT_ROUTE = 'posts/index';
    var router = new Router(DEFAULT_ROUTE);
    router.onPageLoaded(function(url) {
        if(url.indexOf('posts/create') === 0 || 
            url.indexOf('posts/edit') === 0) {
            var postForm = document.getElementById('postForm');
            postForm.onsubmit = onPostSubmit;
        }
    });

    /**
     * Post form submitted... 
     */
    function onPostSubmit() {
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('post', this.getAttribute('action'), true);
        //xhr.setRequestHeader('Content-Type', 'multipart/form-data; charset=utf-8; boundary=' + Math.random().toString().substr(2));
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                window.location.hash = 'posts/index';
            }
        };
        return false;
    }
}());