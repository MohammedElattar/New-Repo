<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/style.css">
    <title>Page Title</title>
</head>

<body>
    <div class="form">
        <div class="heeder">
            <h1>Complaints</h1>
            <p>Help us improve our service.</p>
        </div>
        <div class="hr">
            <hr>
        </div>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="complaint">
            <div class="name">
                <label for="name">Full name <span>*</span></label>
                <input type="text" id="name" name="user" placeholder=" First" required>
                <input type="text" id="name" name="user" placeholder=" Last" required>
            </div>
            <br>
            <div class="email">
                <label for="email">Email <span>*</span></label>
                <input type="email" name="email" id="email" placeholder=" e@email.com" required>
            </div>
            <br>
            <div class="phone">
                <label for="phone">phone</label>
                <input type="tel" name="phone" id="phone" placeholder=" +20 1222222222">
            </div>
            <br>
            <div class="text">
                <label for="textarea">Leave us a few words <span>*</span></label>
                <textarea name="textarea" id="textarea" cols="50" rows="5" placeholder=" Leave us a few words..." required></textarea>
            </div>
            <br>
            <div class="submit">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>
<script>
    let form = document.querySelector(".complaint")
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let formdata = new FormData(form)
            formdata = JSON.stringify(Object.fromEntries(formdata.entries()))
            let xhr = new XMLHttpRequest()
            xhr.open("POST", "api/auth.php");
            xhr.onload = function() {
                if (xhr.readystatus === 4 && xhr.status == 200) {
                    console.log(xhr.responseText)
                    alert("Thank U we have recieved your issue")
                    function reload(){location.reload()}
                    setTimeout(reload , 1000)
                }
            }
            xhr.send(formdata);
        })
    }
</script>