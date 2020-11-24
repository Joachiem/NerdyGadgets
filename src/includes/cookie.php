<?php if (isset($_COOKIE['cookie'])) return ?>
<script>
    setTimeout(() => new Alert({
        title: '<?php print $GLOBALS['t']['cookie-alert-title'] ?>',
        message: '<?php print $GLOBALS['t']['cookie-alert-message'] ?>',
    }).then(() => {
        let request = new XMLHttpRequest()
        request.open('PUT', '/cookie')
        request.send()
    }), 0);
</script>