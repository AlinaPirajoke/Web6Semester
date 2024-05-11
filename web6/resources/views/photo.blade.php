@extends("default")

@section("content")
    <div class="middleDiv">
        <div class="stdText">
            <h1>Мои картинки</h1>
            <table class="tablePhoto" style="display: flex;
                justify-content: center;">
                <?php
                foreach ($args as $key => $value) {
                    if ($key % 3 == 0)
                        echo "<tr>";
                    echo "
                    <td>
                    <a href=\"".$value["big_image"]."\">
                        <img src=\"".$value["small_image"]."\" alt=\"".$value["descr"]."\" title=\"".$value["descr"]."\">
                    </a>
                    <p>".$value["descr"]."</p>
                </td>
                ";
                    if ($key % 3 == 2)
                        echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
@endsection

