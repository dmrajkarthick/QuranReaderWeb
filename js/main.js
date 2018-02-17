 $(document).ready(function() {
        $('img.bookimg').click(function() {
            var url = 'http://localhost/quranapp/php/submenu.php?bookid='+$(this).attr('name');
            location.href = url;
            /*var form = $('<form action="' + url + '" method="post">' +
              '<input type="img" name="submenu" value="' + this.name + '" />' +
              '</form>');
            $('body').append(form);
            form.submit();*/
        });

        $('button.submenu_button').click(function() {
            var url = 'http://localhost/quranapp/php/maincontent.php?bookid='+$(this).attr('bookid')+'&submenu='+$(this).text();
            location.href = url;          
            //window.location.href = this.src + '.php';
        });
    });

 