{% extends 'layout.tpl' %}
{% block meta_title %}Media bundle{% endblock meta_title %} 

{% block meta_description %}{% endblock meta_description %} 

{% block js %}
        <!--  Uploader UX component -->
        <script type="text/javascript" src="/min/uploader.min.js"></script>
{% endblock %} 

{% block css %}

{% endblock %} 

{% block modal %}
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
                <li class="active"><a href="#" class="ui-sendxhr" data-url="/backend/blog/dashboard/" data-selector="#dashboard" role="button"> 
                    <span class="glyphicon glyphicon-home"></span> <strong>{{tr['my_files']}}</strong></a>
                </li>
                
                <li>
                    <a href="#"><span class="glyphicon glyphicon-bookmark"></span> <strong>{{tr['my_activities']}}</strong></a>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                        <span class="glyphicon glyphicon glyphicon-file"></span> <strong>{{tr['new']}}</strong> </strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/createFeed/" data-selector="#modal-lifestream-content" role="button" data-toggle="modal"> 
                            <span class="glyphicon glyphicon-file"></span> {{tr['new_file']}}</a>
                            </li>
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/posts/" data-selector="#dashboard" role="button"> 
                            <span class="glyphicon glyphicon-folder-open"></span> {{tr['new_folder']}}</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                        <span class="glyphicon glyphicon-cog"></span> <strong>{{tr['bundle_settings']}} </strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/createFeed/" data-selector="#modal-lifestream-content" role="button" data-toggle="modal"> 
                                <span class="glyphicon glyphicon-wrench"></span> {{tr['general_settings']}}
                            </a>
                        </li>
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/posts/"
                                data-selector="#dashboard" role="button"> <span class="glyphicon glyphicon-eye-open"></span>
                                    {{tr['privacy_settings']}}
                            </a>
                        </li>
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/posts/"
                                data-selector="#dashboard" role="button"> <span class="glyphicon glyphicon-question-sign"></span>
                                    {{tr['support_center']}}
                            </a>
                        </li>
                        <li>
                            <a href="#" type="button" class="ui-sendxhr" data-url="/backend/lifestream/posts/" data-selector="#dashboard" role="button"> 
                                <span class="glyphicon glyphicon-info-sign"></span> {{tr['about_this_bundle']}}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-12 column">

            <div class="filemanager">
        
                <div class="search">
                    <input type="search" placeholder="{{tr['search_files']}}" />
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
