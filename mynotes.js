$(function () {
    //define variables
    var activeNote = 0;
    var editMode = false;
    //load notes: ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function (data) {
            $('#notes').html(data);
            // console.log(data);
            clickonnote();
            clickondelete();
        }
    });
    //add a new note ajax call to createnote.php
    $('#addnote').click(function () {
        $.ajax({
            url: "createnote.php",
            success: function (data) {
                if (data == 'error') {
                    $('#alertContent').text("There was an error inserting new contect to DB");
                    $('#alert').fadeIn();
                } else {
                    // update active note
                    activeNote = data;
                    $("textarea").val("");
                    showHide(['#note-pad', '#allnotes'], ['#notes', '#addnote', '#edit', '#done', '#alert']);
                    $("textarea").focus();
                }
            }
        });
    });

    //typing a note: ajax call to updatenote.php
    $('textarea').keyup(function () {
        $.ajax({
            url: "updatenote.php",
            type: "post",
            data: { note: $(this).val(), id: activeNote },
            success: function (data) {

            }
        });
    });


    //click on all notes button
    $('#allnotes').click(function () {
        $.ajax({
            url: "loadnotes.php",
            success: function (data) {
                $('#notes').html(data);
                showHide(['#addnote', '#edit', '#notes'], ['#allnotes', '#note-pad']);
                clickonnote();
                clickondelete();
            }
        });
    });

    function clickonnote() {
        $('.noteheader').click(function () {
            if (!editMode) {
                activeNote = $(this).attr("id");
                console.log(activeNote);
                $("textarea").val($(this).find('.text').text());
                showHide(['#note-pad', '#allnotes'], ['#notes', '#addnote', '#edit', '#done']);
                $("textarea").focus();
            }
        });
    }

    function clickondelete() {
        $('.delete').click(function () {
            var deletebutton = $(this);
            $.ajax({
                url: "deletenote.php",
                type: "post",
                data: { id: deletebutton.next().attr('id') },
                success: function (data) {
                    deletebutton.parent().remove();
                }
            });
        });
    }

    $('#edit').click(function () {
        editMode = true;
        showHide(['#done', '.delete'], [this]);
    });


    //click on done after editing: load notes again
    $('#done').click(function () {
        editMode = false;
        showHide(['#edit'], [this, '.delete']);
    });

    function showHide(array1, array2) {
        for (i = 0; i < array1.length; i++) {
            $(array1[i]).show();
        }
        for (i = 0; i < array2.length; i++) {
            $(array2[i]).hide();
        }
    }

});