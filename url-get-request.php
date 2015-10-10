<?php $title = "AJAX TEST";

?>
<?php require "encabezado.php" ?>
<body style="text-align: center">
    <h1>Loading web page into a div</h1>
    <div id="info">This sentence will be replaced</div>

    <script>
        request = ajaxRequest();
        request.open("GET", "url-get-process.php?url=www.fi.uba.ar", true);

        request.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    if (this.responseText != null) {
                        document.getElementById('info').innerHTML = this.responseText;
                    }
                    else alert("Ajax error: No data received");
                }
                else alert("Ajax error: " + this.statusText);
            }
        };

        request.send(null);
    </script>

</body>
</html>