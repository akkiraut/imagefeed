<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview sds"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>

        <td>
            <label>Title</label>
            <input type="text"  name="title" required /><br />
            <input type="hidden"  name="title2" value="2" required /><br />
            

        </td>
        <td>

            <label>Cover Pic</label>
            <input type="radio" value="1" name="is_cover_pic"  /><br />
            
        </td>

        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>



    <!-- <td class="coverpic">
    <input class="toggle" name="radAnswer" type="radio" value="Santosh"/>{%=file.name%}
    </td> -->
    </tr>
{% } %}
</script>
