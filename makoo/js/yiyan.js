/*一言*/
 function hitokoto() {
        $.ajax({
            url: 'https://tool.qqdie.com/hitokoto/json.php',
            type: 'get',
            beforeSend: function(xhr) {
                $('#hitokoto').html('『少女祈祷中...』');
            },
            success: function(data) {
                if (data.status == 'success') {
                    $('#hitokoto').html(data.result.hitokoto);
                } else {
                    $('#hitokoto').html('失败是成功之母 - 菲利普斯');
                }

            },
            error: function(xhr, textStatus, errorThrown) {
                $('#hitokoto').html('失败是成功之母 - 菲利普斯');
            }
        });

    }
        hitokoto();