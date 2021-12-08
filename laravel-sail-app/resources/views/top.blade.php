<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>API講座</title>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <style>
            thead th {
                text-align: left;
            }
        </style>
	</head>

	<body>
		<header>API講座</header>

		<main>
            <div>
                <label for="id">user id 入力欄</label>&emsp;
                <input id="id" name="id" type="text" value="" style="width:50px">
            </div>
            <br>
            <table style="display: flex;">
                <thead>
                        <tr><th>ユーザーID</th></tr>
                        <tr><th>氏名</th></tr>
                        <tr><th>年齢</th></tr>
                        <tr><th>生年月日</th></tr>
                        <tr><th>連絡先</th></tr>
                        <tr><th>住所</th></tr>
                </thead>
                <tbody class="input-table">
                    <tr>
                        <td><input class="id" name="id" type="text"></td>
                    </tr>
                    <tr>
                        <td><input class="name" name="name" type="text"></td>
                    </tr>
                    <tr>
                        <td><input class="age" name="age" type="text"></td>
                    </tr>
                    <tr>
                        <td><input class="birth" name="birth" type="text"></td>
                    </tr>
                    <tr>
                        <td><input class="contact" name="contact" type="text"></td>
                    </tr>
                    <tr>
                        <td><input class="address" name="address" type="text"></td>
                    </tr>
                </tbody>
            </table>
            <div><button class="ajax">Ajax</button></div>
            <div class="error"></div>
        </main>

		<footer></footer>

        <script>
            const v1Url = `${location.href}users/v1/userInfo/`;
            const v2Url = `${location.href}users/v2/getUserInfo/`;
            let url;
            let userId;
            // let data = {};

            $('#id').blur( () => {
                userId = $('#id').val();
                url = `${v2Url}${userId}`;
            });

            $('.ajax').click( () => Ajax(setTable, url, 'GET'));

            const Ajax = (func, url, type) => {
                $.ajax({
                    url      : url,
                    type     : 'GET',
                    // data     : data,
                    dataType : 'json',
                }).done( res => {
                    func(res);
                }).fail( err => {
                    console.log(err);
                });
            }
            const tableClear = () => {
                $('.input-table').find('input').each( (index, elem) => {
                    $(elem).val('');
                });
            }
            const clearMessage = () => {
                $('.message').remove();
            }
            const setTable = res => {
                tableClear();
                clearMessage();
                if (res.result === 'false') {
                    $("<p>", {
                        class: 'message',
                        text : res.errMsg,
                    }).appendTo('.error');
                    return true;
                };
                $('.input-table').find('input').each( (num, elem) => {
                    Object.keys(res.response).forEach( (key, index) => {
                        if ($(elem).hasClass(key)) $(elem).val(res.response[key]);
                    });
                });
            }
        </script>
	</body>
</html>