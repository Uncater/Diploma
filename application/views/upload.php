<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Рассчет коэффициента Жаккарда</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="css/jquery-2.1.4.min.js"></script>
    <style type="text/css">
        .center { float: none; margin-left: auto; margin-right: auto; }
        .btn-file { position: relative; overflow: hidden; margin-right: 4px; }
        .btn-file input { position: absolute; top: 0; right: 0; margin: 0; opacity: 0; filter: alpha(opacity=0);
            transform: translate(-300px, 0) scale(4); font-size: 23px; direction: ltr; cursor: pointer; }
    </style>
</head>
<body>
<div class=" col-md-7 center"> <h1>Составить схему редиректов</h1> </div>
<br>
<div class="row">
    <div class="col-sm-5 center">
        <form role="form" enctype="multipart/form-data" method="POST">
            <div class="form-group">


                <span class="btn btn-primary btn-file">
    <i class="icon-plus"> </i><span>Выберите файл csv</span>
    <input type="file" name="csv_old" />
</span><br/><br/>



                <label for="url">Префиксная часть старого сайта</label>
                <input type="text" class="form-control" id="url" name="url_old"><br><br>
                <span>Файл CSV для нового сайта</span><br><br>
                <span class="btn btn-primary btn-file">
    <i class="icon-plus"> </i><span>Выберите файл csv</span>
    <input type="file" name="csv_new"/>
</span><br/><br/>

                <label for="url">Префиксная часть нового сайта</label>
                <input type="text" class="form-control" id="url_new" name="url_new">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="radio1" value="option_url"  checked>
                        Сравнить по URL
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="radio22" value="option_H1" >
                        Сравнить по H1
                    </label>
                </div>
                <button type="submit" id="submitButton" class="btn btn-primary" formaction="upload/getData">Расчитать</button>
            </div>
        </form>
    </div>
            </div>

</body>
</html>


<script>
    $(function() {
        $("input:file").change(function (){

            var fileName = $(this).val();
            submitButton = document.getElementById('submitButton');


            // Use a regular expression to trim everything before final dot
            var extension = fileName.replace(/^.*\./, '');

            if (extension == fileName) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }


            switch (extension) {
                case 'csv': submitButton.disabled = false;
                    break;
                default:
                    alert("Вы выбрали не csv файл");
                    submitButton.disabled = true;



            }
        });
    });

    (function ($){
        $(function (){
            $('.btn-file').each(function (){
                var self = this;
                $('input[type=file]', this).change(function (){
                    $(self).next().remove();
                    var value = $(this).val();
                    var fileName = value.replace(/^.*\\/, "");
                    var fileExt = fileName.split('.').pop().toLowerCase();
                    $('<span><i class="icon-file icon-' + fileExt + '"></i> ' + fileName + '</span>').insertAfter(self);
                });
            });
        });
    })(jQuery);
</script>