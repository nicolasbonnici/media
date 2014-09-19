{% extends 'layout.tpl' %} {% block meta_title %}Test{% endblock meta_title %} {% block meta_description %}{% endblock
meta_description %} {% block js %}
<script type="text/javascript" src="/lib/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript" src="/lib/plugins/moment/js/moment.min.js"></script>
<script type="text/javascript" src="/lib/plugins/summernote/js/summernote.js"></script>
{% endblock %} {% block css %}
<link href="/lib/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/plugins/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
<link href="/lib/plugins/summernote/css/summernote.css" rel="stylesheet">
<link href="/lib/plugins/summernote/css/summernote-bs3.css" rel="stylesheet">
{% endblock %} {% block modal %}
<div class="modal fade" id="modal-todo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-todo-content">
            <p>&nbsp;</p>
        </div>
    </div>
</div>
{% endblock %} 

{% block main %}
<div class="container">
    <div class="row clearfix transparentBlackBg rounded well ui-transition ui-shadow">
        <div class="col-md-2 column">
            <img src="/lib/bundles/{{sBundle}}/img/icon.png" alt="App icon" />
        </div>
        <div class="col-md-10 column">
            <h1 class="showOnHover">
                {{tr|Trans: 'media'}} <small class="targetToShow">1.0</small>
            </h1>
            <br />
            <ul class="nav nav-pills transparentBlackBg rounded">
                <li class="active"><a href="#" class="ui-sendxhr" data-url="/backend/blog/dashboard/"
                    data-selector="#dashboard" role="button"> <span class="glyphicon glyphicon-home"></span> <strong>Dashboard</strong>
                </a></li>
                <li><a href="#"><span class="glyphicon glyphicon-bookmark"></span> <strong>Activities</strong></a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span
                        class="glyphicon glyphicon-cog"></span> <strong>Settings</strong> <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/createFeed/"
                            data-selector="#modal-lifestream-content" role="button" data-toggle="modal"> <span
                                class="glyphicon glyphicon-file"></span> Bla bla
                        </a></li>
                        <li><a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/posts/"
                            data-selector="#dashboard" role="button"> <span class="glyphicon glyphicon-file"></span>
                                Gérer
                        </a></li>
                    </ul></li>
            </ul>
        </div>
        <div class="col-md-12 column">
            <div class="filemanager">
        
                <div class="search">
                    <input type="search" placeholder="Find a file.." />
                </div>
        
                <div class="breadcrumbs"></div>
        
                <ul class="data"></ul>
        
                <div class="nothingfound">
                    <div class="nofiles"></div>
                    <span>No files here.</span>
                </div>
        
            </div>
        </div>
    </div>
</div>

{% endblock %}
