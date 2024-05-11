@extends("default")

@section("content")
    <script src="app/js/my_interests.js"></script>
    <div class="stdText" , id="page">
        <h1>Мои хобби и увлечения</h1>
        <h3>Навигация:</h3>
        <div class="stdTextList" , id="content">
            <?php
            foreach ($args as $value) {
                echo "<li><a href=\"#" . $value['label'] . "\">" . $value['label'] . "</a></li>";
            };
            ?>
        </div>
    </div>
    <?php
    foreach ($args as $value) {
        echo
            "<div class=\"piece\" id=\"" . $value['label'] . "\">
        <h3>" . $value['label'] . "</h3>";
        foreach ($value["text"] as $text) {
            echo "<p>$text</p>";
        }
        echo "</div>";
    }
    ?>
@endsection
