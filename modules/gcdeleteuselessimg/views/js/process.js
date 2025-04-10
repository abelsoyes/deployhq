/**
 * GcDeleteUselessImg
 *
 * @author    Grégory Chartier <hello@gregorychartier.fr>
 * @copyright 2020 Grégory Chartier (https://www.gregorychartier.fr)
 * @license   Commercial license see license.txt
 * @category  Prestashop
 * @category  Module
 */

var groups_folder = [];
var groups_folder_index = 0;
var completetxt = completetxt || 'OK';

$(document).ready(function (e) {
    $('#module_form').on('submit', function (event) {
        event.preventDefault();
        var chk_getimages = $('input#chk_getimages_1:checked').val();
        var chk_imgtype = $('input#chk_imgtype_1:checked').val();
        var confirm = $('input[name=\"chk_confirm_1\"]:checked').val();
        if (typeof confirm == undefined || !confirm) {
            showErrorMessage(chk_confirm);
            return false;
        } else {
            $('.process').html('');
            $('.imagestype').html('');
            if (typeof chk_getimages != undefined && chk_getimages) {
                var group = getGroupElt('#chk_getimages_1');
                if (group.find('.process').length<=0) {
                    group.append('<br /><br /><div class=\"col-lg-offset-3\"><ul class=\"process\"></ul></div>')
                }
                group = group.find('.process');
                deleteimages(group);
            } else {
                var group = getGroupElt('#chk_confirm_1');
                if (group.find('.process').length<=0) {
                    group.append('<br /><br /><div class=\"col-lg-offset-3\"><ul class=\"process\"></ul></div>')
                }
                group = group.find('.process');
                deleteimages(group);
            }

            if (typeof chk_imgtype != undefined && chk_imgtype) {
                group = getGroupElt('#chk_imgtype_1');
                if (group.find('.imagestype').length<=0) {
                    group.append('<br /><br /><div class=\"col-lg-offset-3\"><ul class=\"imagestype\"></ul></div>')
                }
                deletetypeimages();
            }
        }
    });
});

function getGroupElt(elt) {
    return $(elt).closest('div.form-group');
}

function deleteimages(group_elt) {
    group_elt.append('<li><b>'+fetch_db+'</b> <span class=\"processstates\" id=\"imgprocess\"></span></li>');
    $('#imgprocess').html(processing);
    var checkbox = 0;
    if ($('input#chk_getimages_1').is(':checked')) {
        checkbox = 1;
    }
    $.ajax({
        url: $('#chk_action_uri').val() + '/ajax.php',
        async: false,
        data: { image:1, chk_getimages:checkbox },
        dataType: 'json',
        method: 'post',
        success: function (data) {
            group_elt.append('<li><b>'+fetch_img+' </b><span class=\"processstates\" id=\"folderprocess\"></span></li>');
            if (data.mes == '1') {
                $('#imgprocess').html('OK');
                $('#imgprocess').css('color', 'green');
            } else {
                $('#imgprocess').html('KO');
                $('#imgprocess').css('color', 'red');
            }
            $('#folderprocess').html('...');
            group_elt.append('<li><b>'+deleteuseless+'</b> <span class=\"processstates\" id=\"delprocess\"></span> <div id=\"progressbar\"><div class=\"progress-label\"></div></div></li>');
            if (!data.last) {
                var progressbar = $('#progressbar'),
                    progressLabel = $('.progress-label');
                progressbar.progressbar({
                    value: false,
                    change: function () {
                        progressLabel.text(progressbar.progressbar('value') + ' %');
                    }
                });
                
                checkImgFolders(data);
            }
        }
    });
}

function deletetypeimages() {
    var checkbox = 0;
    if ($('input#chk_imgtype_1').is(':checked')) {
        checkbox = 1;
    }
    $('.imagestype').append('<li><b>'+fetch_db+'</b> <span class=\"types\" id=\"imgtypes\"></span></li>');
    $('#imgtypes').html(processing);
    $.ajax({
        url: $('#chk_action_uri').val() + '/imagestypeajax.php',
        async: false,
        data: {type: 1, chk_imgtype: checkbox},
        dataType: 'json',
        method: 'post',
        success: function (data) {
            $('.imagestype').append('<li><b>'+fetch_img+' </b><span class=\"types\" id=\"processtype\"></span></li>');
            if (data.typestatus == '1') {
                $('#imgtypes').html('OK');
                $('#imgtypes').css('color', 'green');
            } else {
                $('#imgtypes').html('KO');
                $('#imgtypes').css('color', 'red');
            }

            $('#processtype').html('...');
            $.ajax({
                dataType: 'json',
                method: 'post',
                url: $('#chk_action_uri').val() + '/imagestypeajax.php',
                data: {foldername: 1, typenames: data.typenames, folders: data.foldersname},
                success: function (data) {
                    $('.imagestype').append('<li><b>'+fetch_img_from+' </b><span class=\"types\" id=\"foldertype\"></span><div id=\"typeprogressbar\"><div class=\"typeprogress-label\"></div></div></li>');
                    if (data.folderstatus == '1') {
                        $('#processtype').html('OK');
                        $('#processtype').css('color', 'green');
                    } else {
                        $('#processtype').html('KO');
                        $('#processtype').css('color', 'red');
                    }
                    var res = data.foldersname;
                    var foldercount = data.foldercount;
                    if (foldercount == '0')
                    {
                        $('#typeprogressbar').css('display', 'none');
                        $('#foldertype').html(notfound);
                    } else {
                        var typeprogressbar = $('#typeprogressbar'),
                        progressLabel = $('.typeprogress-label');
                        typeprogressbar.progressbar({
                            value: false,
                            change: function () {
                                progressLabel.text(typeprogressbar.progressbar('value') + ' %');
                            }
                        });
                        $('#foldertype').css('display', 'inline');
                        var chunkSize = 100;
                        var i, tmp = new Array();
                        groups_folder = [];
                        for (i = 0; i < res.length; i += chunkSize) {
                            tmp = res.slice(i, i + chunkSize);
                            groups_folder.push(tmp.join('|'));
                        }
                        groups_folder_index = 0;
                        folderimg(data.typenames, groups_folder[groups_folder_index]);
                    }
                },
            });
        },
    });
}

function folderimg(typenames, value)
{
//    console.log(value);
    $('#foldertype').html('');
    $.ajax({
        dataType: 'json',
        method: 'post',
        url: $('#chk_action_uri').val() + '/imagestypeajax.php',
        data: {folderimg: 1, typenames: typenames, folders: value},
        success: function (data) {
            if (data.imgstatus == '1') {
                $('#foldertype').html('OK');
                $('#foldertype').css('color', 'green');
            } else {
                $('#foldertype').html('KO');
                $('#foldertype').css('color', 'red');
            }
            groups_folder_index ++;
            if (groups_folder.length>groups_folder_index) {
                folderimg(typenames, groups_folder[groups_folder_index]);
            } else {
                groups_folder = [];
                groups_folder_index = 0;
            }
            
            var persnt = 100;
            if ( groups_folder.length > 0 ) {
                persnt = Math.round((groups_folder_index/groups_folder.length)*100);
            }
            
            console.log(persnt)
            var typeprogressbar = $('#typeprogressbar'),
            progressLabel = $('.typeprogress-label');
            typeprogressbar.progressbar({
                complete: function () {
                    $('#foldertype').html('OK');
                    progressLabel.text(completetxt);
                }
            });

            typeprogressbar.progressbar('value', persnt);
        },
    });
}

function scanDir(dataJson) {
    $.ajax({
        dataType: 'json',
        method: 'post',
        url: $('#chk_action_uri').val() + '/ajax.php',
        data: {subfolder: 1, rootfolder: dataJson.rootfolder, index: dataJson.index, realfolder:dataJson.realfolder, images: dataJson.imagesIds},
        success: function (data) {
            if (!data.last) {
                scanDir(data);
            } else {
                $.ajax({
                    dataType: 'json',
                    method: 'post',
                    url: $('#chk_action_uri').val() + '/ajax.php',
                    data: {folder: 1, images: data.imagesIds, realfolder:data.realfolder},
                    success: function (data) {
                        group_elt.append('<li><b>'+compare+'</b> <span class=\"processstates\" id=\"compareprocess\"></span></li>');
                        if (data.status == '1') {
                            $('#folderprocess').html('OK');
                            $('#folderprocess').css('color', 'green');
                        } else {
                            $('#folderprocess').html('KO');
                            $('#folderprocess').css('color', 'red');
                        }
                        $('#compareprocess').html('...');
                        $.ajax({
                            dataType: 'json',
                            method: 'post',
                            url: $('#chk_action_uri').val() + '/ajax.php',
                            data: {compare: 1, images: data.imagesIds, folders: data.foldersname, countof: data.countof},
                            success: function (data) {
                                group_elt.append('<li><b>'+deleteuseless+'</b> <span class=\"processstates\" id=\"delprocess\"></span> <div id=\"progressbar\"><div class=\"progress-label\"></div></div></li>');
                                if (data.status == '1') {
                                    $('#compareprocess').html('OK');
                                    $('#compareprocess').css('color', 'green');
                                } else {
                                    $('#compareprocess').html('KO');
                                    $('#compareprocess').css('color', 'red');
                                }
                                var res = data.result;
                                var countimages = data.countof;
                                if (countimages == '0')
                                {
                                    $('#progressbar').css('display', 'none');
                                    $('#delprocess').html(notfound);
                                } else {
                                    $('#delprocess').css('display', 'none');
                                    $.each(res, function (index, value) {
                                        $.ajax({
                                            dataType: 'json',
                                            method: 'post',
                                            url: $('#chk_action_uri').val() + '/ajax.php',
                                            data: {delete: 1, results: value},
                                            success: function (data) {
                                                if (data.status == '1') {
                                                    var persnt = Math.round(100 / countimages);
                                                    $(function () {
                                                        var progressbar = $('#progressbar'),
                                                            progressLabel = $('.progress-label');
                                                        progressbar.progressbar({
                                                            value: false,
                                                            change: function () {
                                                                progressLabel.text(progressbar.progressbar('value') + ' %');
                                                            },
                                                            complete: function () {
                                                                progressLabel.text(countimages + ' ' + completetxt);
                                                            }
                                                        });
                                                        function progress() {
                                                            var val = progressbar.progressbar('value') || 0;
                                                            progressbar.progressbar('value', val + persnt);

                                                            if (val < 99) {
                                                                setTimeout(progress, 80);
                                                            }
                                                        }
                                                        setTimeout(progress, 200);
                                                    });

                                                } else {
                                                    $('#delprocess').html('KO');
                                                    $('#delprocess').css('color', 'red');
                                                }
                                            },
                                        });
                                    });
                                }
                            }

                        });
                    }
                });
            }
        }
    });
}

function progress(persnt) {
    var val = $('#progressbar').progressbar('value') || 0;
    $('#progressbar').progressbar('value', persnt);
}

function checkImgFolders(dataJson) {
    $.ajax({
        dataType: 'json',
        method: 'post',
        url: $('#chk_action_uri').val() + '/ajax.php',
        data: {checkImgFolders: 1, start: dataJson.start, limit: dataJson.limit, offset:dataJson.offset, deletecount: dataJson.deletecount, deactiveproduct: dataJson.deactiveproduct},
        success: function (data) {
            if (data.status == '1') {
                var persnt = Math.round((1-(data.start/data.limit))*100);
                if (data.status == '1') {
                    $('#folderprocess').html('OK');
                    $('#folderprocess').css('color', 'green');
                } else {
                    $('#folderprocess').html('KO');
                    $('#folderprocess').css('color', 'red');
                }
                if (!data.last) {
                    checkImgFolders(data);
                } else {
                    if (data.status == '1') {
                        $('#delprocess').html('OK');
                        $('#delprocess').css('color', 'green');
                    } else {
                        $('#delprocess').html('KO');
                        $('#delprocess').css('color', 'red');
                    }
                    var progressbar = $('#progressbar'),
                    progressLabel = $('.progress-label');
                    progressbar.progressbar({
                        complete: function () {
                            progressLabel.text(dataJson.deletecount + ' ' + completetxt);
                        }
                    });
                }
                    
                progress(persnt);
            } else {
                $('#delprocess').html('KO');
                $('#delprocess').css('color', 'red');
            }
        },
    });
}