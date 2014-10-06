{% extends 'layout.tpl' %}
{% block meta_title %}Test{% endblock meta_title %} 

{% block meta_description %}{% endblock meta_description %}

{% block js %}
<script type="text/javascript" src="/lib/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript" src="/lib/plugins/moment/js/moment.min.js"></script>
<script type="text/javascript" src="/lib/plugins/summernote/js/summernote.js"></script>
{% endblock %} {% block css %}
<link href="/lib/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/plugins/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
<link href="/lib/plugins/summernote/css/summernote.css" rel="stylesheet">
<link href="/lib/plugins/summernote/css/summernote-bs3.css" rel="stylesheet">
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
<div class="row clearfix transparentBlackBg rounded well ui-transition ui-shadow">
    <div class="col-md-12 column">
        <div class="table table-striped" class="files" id="previews">
         
          <div id="template" class="file-row">
            <!-- This is used as the file preview template -->
            <div>
                <span class="preview"><img data-dz-thumbnail /></span>
            </div>
            <div>
                <p class="name" data-dz-name></p>
                <strong class="error text-danger" data-dz-errormessage></strong>
            </div>
            <div>
                <p class="size" data-dz-size></p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                </div>
            </div>
            <div>
              <button class="btn btn-primary start">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start</span>
              </button>
              <button data-dz-remove class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button>
              <button data-dz-remove class="btn btn-danger delete">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
              </button>
            </div>
          </div>
         
        </div>
    </div>
</div>
{% endblock %}
